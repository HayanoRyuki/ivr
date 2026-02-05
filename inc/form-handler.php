<?php
/**
 * フォーム送信処理
 *
 * 対応フォーム:
 * - 資料請求フォーム (request)
 * - お問い合わせフォーム (contact)
 *
 * スパム対策:
 * 1. Honeypot（隠しフィールド）
 * 2. reCAPTCHA v3
 */

// AJAX ハンドラーを登録
add_action('wp_ajax_submit_form', 'handle_form_submission');
add_action('wp_ajax_nopriv_submit_form', 'handle_form_submission');

/**
 * フォーム送信処理
 */
function handle_form_submission() {
    // Nonceチェック
    if (!isset($_POST['form_nonce']) || !wp_verify_nonce($_POST['form_nonce'], 'ivr_form_nonce')) {
        wp_send_json_error([
            'message' => '不正なリクエストです。ページを再読み込みしてお試しください。',
        ]);
        return;
    }

    // ============================================
    // スパム対策① Honeypot チェック
    // ============================================
    $honeypot = sanitize_text_field($_POST['website_url'] ?? '');
    if (!empty($honeypot)) {
        // スパム検知をログに記録
        error_log('[IVR Form] Honeypot triggered: ' . $honeypot . ' | IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));

        // ボットには成功レスポンスを返す（再試行防止）
        wp_send_json_success([
            'message'  => '送信が完了しました。',
            'redirect' => home_url('/resource-thanks/'),
        ]);
        return;
    }

    // ============================================
    // スパム対策② reCAPTCHA v3 検証
    // ============================================
    if (function_exists('verify_recaptcha_token') && function_exists('recaptcha_is_configured') && recaptcha_is_configured()) {
        $recaptcha_token = sanitize_text_field($_POST['recaptcha_token'] ?? '');
        $recaptcha_result = verify_recaptcha_token($recaptcha_token, 'submit_form');

        if (!$recaptcha_result['success']) {
            $score = $recaptcha_result['score'] ?? 0;
            error_log('[IVR Form] reCAPTCHA blocked: score=' . $score . ' | IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));

            wp_send_json_error([
                'message' => 'スパム判定されました。時間をおいて再度お試しください。',
            ]);
            return;
        }
    }

    // ============================================
    // フォームデータの取得・サニタイズ
    // ============================================
    $form_type = sanitize_text_field($_POST['form_type'] ?? 'request');

    $form_data = [
        'company'      => sanitize_text_field($_POST['company'] ?? ''),
        'department'   => sanitize_text_field($_POST['department'] ?? ''),
        'last_name'    => sanitize_text_field($_POST['last_name'] ?? ''),
        'first_name'   => sanitize_text_field($_POST['first_name'] ?? ''),
        'email'        => sanitize_email($_POST['email'] ?? ''),
        'phone'        => sanitize_text_field($_POST['phone'] ?? ''),
        'phone_line'   => sanitize_text_field($_POST['phone_line'] ?? ''),
        'daily_calls'  => sanitize_text_field($_POST['daily_calls'] ?? ''),
        'privacy_agree' => isset($_POST['privacy_agree']) ? 'yes' : 'no',
    ];

    // お問い合わせフォームの場合は内容を追加
    if ($form_type === 'contact') {
        $form_data['message'] = sanitize_textarea_field($_POST['message'] ?? '');
    }

    // ============================================
    // バリデーション
    // ============================================
    $errors = [];

    if (empty($form_data['company'])) {
        $errors[] = '貴社名を入力してください。';
    }
    if (empty($form_data['last_name'])) {
        $errors[] = '姓を入力してください。';
    }
    if (empty($form_data['first_name'])) {
        $errors[] = '名を入力してください。';
    }
    if (empty($form_data['email']) || !is_email($form_data['email'])) {
        $errors[] = '正しいメールアドレスを入力してください。';
    }
    if (empty($form_data['phone'])) {
        $errors[] = '電話番号を入力してください。';
    }
    if ($form_data['privacy_agree'] !== 'yes') {
        $errors[] = '個人情報の取り扱いに同意してください。';
    }

    // 資料請求フォームの場合：追加の必須項目チェック
    if ($form_type === 'request') {
        if (empty($form_data['department'])) {
            $errors[] = '部署を入力してください。';
        }
        if (empty($form_data['phone_line'])) {
            $errors[] = '電話回線を選択してください。';
        }
        if (empty($form_data['daily_calls'])) {
            $errors[] = '1日の受電数を選択してください。';
        }
    }

    if (!empty($errors)) {
        wp_send_json_error([
            'message' => implode("\n", $errors),
            'errors'  => $errors,
        ]);
        return;
    }

    // ============================================
    // 処理の実行
    // ============================================

    // Slack通知
    ivr_send_slack_notification($form_type, $form_data);

    // Pardot送信
    do_action('ivr_form_pardot_submit', $form_type, $form_data);

    // 管理者へメール送信
    $admin_email = get_option('admin_email');
    $form_label  = ($form_type === 'contact') ? 'お問い合わせ' : '資料請求';

    $subject = "[{$form_label}] {$form_data['company']} {$form_data['last_name']}様";

    $body = "【{$form_label}フォームから送信がありました】\n\n";
    $body .= "貴社名: {$form_data['company']}\n";
    $body .= "部署: {$form_data['department']}\n";
    $body .= "お名前: {$form_data['last_name']} {$form_data['first_name']}\n";
    $body .= "メールアドレス: {$form_data['email']}\n";
    $body .= "電話番号: {$form_data['phone']}\n";
    $body .= "電話回線: {$form_data['phone_line']}\n";
    $body .= "1日の受電数: {$form_data['daily_calls']}\n";

    if ($form_type === 'contact' && !empty($form_data['message'])) {
        $body .= "\nお問い合わせ内容:\n{$form_data['message']}\n";
    }

    $body .= "\n---\n";
    $body .= "送信日時: " . date_i18n('Y年n月j日 H:i:s') . "\n";
    $body .= "IPアドレス: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

    wp_mail($admin_email, $subject, $body);

    // ============================================
    // レスポンス
    // ============================================
    $thanks_page = ($form_type === 'contact') ? '/contact-thanks/' : '/resource-thanks/';

    wp_send_json_success([
        'message'  => '送信が完了しました。',
        'redirect' => home_url($thanks_page),
    ]);
}

/**
 * Nonceフィールドを出力
 */
function ivr_form_nonce_field() {
    wp_nonce_field('ivr_form_nonce', 'form_nonce');
}

/**
 * AJAX URL を出力
 */
function ivr_form_ajax_url() {
    return admin_url('admin-ajax.php');
}

/**
 * Slack通知を送信
 *
 * @param string $form_type フォームタイプ (request / contact)
 * @param array  $form_data フォームデータ
 * @return bool 送信成功したかどうか
 */
function ivr_send_slack_notification($form_type, $form_data) {
    // Webhook URLが設定されていない場合はスキップ
    if (!defined('IVR_SLACK_WEBHOOK_URL') || empty(IVR_SLACK_WEBHOOK_URL)) {
        return false;
    }

    $form_label = ($form_type === 'contact') ? 'お問い合わせ' : '資料請求';
    $emoji = ($form_type === 'contact') ? ':email:' : ':page_facing_up:';

    // Slackメッセージを構築
    $fields = [
        [
            'title' => '貴社名',
            'value' => $form_data['company'],
            'short' => true,
        ],
        [
            'title' => '部署',
            'value' => $form_data['department'] ?: '（未入力）',
            'short' => true,
        ],
        [
            'title' => 'お名前',
            'value' => $form_data['last_name'] . ' ' . $form_data['first_name'],
            'short' => true,
        ],
        [
            'title' => 'メールアドレス',
            'value' => $form_data['email'],
            'short' => true,
        ],
        [
            'title' => '電話番号',
            'value' => $form_data['phone'],
            'short' => true,
        ],
        [
            'title' => '電話回線',
            'value' => $form_data['phone_line'] ?: '（未入力）',
            'short' => true,
        ],
        [
            'title' => '1日の受電数',
            'value' => $form_data['daily_calls'] ?: '（未入力）',
            'short' => true,
        ],
    ];

    // お問い合わせの場合はメッセージを追加
    if ($form_type === 'contact' && !empty($form_data['message'])) {
        $fields[] = [
            'title' => 'お問い合わせ内容',
            'value' => $form_data['message'],
            'short' => false,
        ];
    }

    $payload = [
        'username'    => '代表電話コネクト',
        'icon_emoji'  => $emoji,
        'attachments' => [
            [
                'fallback'   => "[{$form_label}] {$form_data['company']} {$form_data['last_name']}様",
                'color'      => ($form_type === 'contact') ? '#0098BB' : '#36a64f',
                'pretext'    => "{$emoji} *【{$form_label}】新しい送信がありました*",
                'title'      => "{$form_data['company']} {$form_data['last_name']}様",
                'fields'     => $fields,
                'footer'     => '代表電話コネクト フォーム',
                'ts'         => time(),
            ],
        ],
    ];

    // Slack APIに送信
    $response = wp_remote_post(IVR_SLACK_WEBHOOK_URL, [
        'headers' => ['Content-Type' => 'application/json'],
        'body'    => json_encode($payload),
        'timeout' => 10,
    ]);

    if (is_wp_error($response)) {
        error_log('[IVR Form] Slack notification failed: ' . $response->get_error_message());
        return false;
    }

    return true;
}
