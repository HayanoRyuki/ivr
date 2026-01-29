<?php
/**
 * Pardot フォーム連携
 *
 * エンドポイントURLは wp-config.php に定義:
 * define('PARDOT_ENDPOINT_CONTACT', 'https://...');   // お問い合わせ
 * define('PARDOT_ENDPOINT_REQUEST', 'https://...');   // 資料請求
 */

/**
 * Pardot にフォームデータを送信
 *
 * @param string $form_type フォーム種別 ('contact' or 'request')
 * @param array  $form_data フォームデータ
 * @return array ['success' => bool, 'error' => string|null]
 */
function submit_to_pardot($form_type, $form_data) {
    // エンドポイント取得
    $endpoint = get_pardot_endpoint($form_type);

    if (empty($endpoint)) {
        error_log('[IVR Pardot] Endpoint not configured for: ' . $form_type);
        return [
            'success' => false,
            'error'   => 'Endpoint not configured',
        ];
    }

    // Pardot用にフィールド名をマッピング
    $pardot_data = map_to_pardot_fields($form_type, $form_data);

    // Pardot に POST送信
    $response = wp_remote_post($endpoint, [
        'body'      => $pardot_data,
        'timeout'   => 15,
        'sslverify' => true,
    ]);

    if (is_wp_error($response)) {
        error_log('[IVR Pardot] API error: ' . $response->get_error_message());
        return [
            'success' => false,
            'error'   => $response->get_error_message(),
        ];
    }

    $status_code = wp_remote_retrieve_response_code($response);

    // Pardotは通常200または302を返す
    if ($status_code >= 200 && $status_code < 400) {
        return ['success' => true];
    }

    error_log('[IVR Pardot] HTTP error: ' . $status_code);
    return [
        'success' => false,
        'error'   => 'HTTP ' . $status_code,
    ];
}

/**
 * フォーム種別に応じたエンドポイントを取得
 */
function get_pardot_endpoint($form_type) {
    switch ($form_type) {
        case 'contact':
            return defined('PARDOT_ENDPOINT_CONTACT') ? PARDOT_ENDPOINT_CONTACT : '';
        case 'request':
            return defined('PARDOT_ENDPOINT_REQUEST') ? PARDOT_ENDPOINT_REQUEST : '';
        default:
            return '';
    }
}

/**
 * フォームデータを Pardot の外部項目名にマッピング
 */
function map_to_pardot_fields($form_type, $form_data) {
    // 共通フィールドのマッピング
    $mapped = [
        'email'              => $form_data['email'] ?? '',
        '貴社名'              => $form_data['company'] ?? '',
        '部署'               => $form_data['department'] ?? '',
        '姓'                 => $form_data['last_name'] ?? '',
        '名'                 => $form_data['first_name'] ?? '',
        '電話番号'            => $form_data['phone'] ?? '',
        '現在お使いの電話回線'  => $form_data['phone_line'] ?? '',
        '1日の受電数'         => $form_data['daily_calls'] ?? '',
    ];

    // お問い合わせフォームの場合は内容を追加
    if ($form_type === 'contact' && !empty($form_data['message'])) {
        $mapped['お問い合わせ内容'] = $form_data['message'];
    }

    return $mapped;
}

/**
 * フォーム送信時のフック
 */
add_action('ivr_form_pardot_submit', 'handle_pardot_submit', 10, 2);

function handle_pardot_submit($form_type, $form_data) {
    $result = submit_to_pardot($form_type, $form_data);

    if (!$result['success']) {
        error_log('[IVR Pardot] Failed to submit: ' . ($result['error'] ?? 'unknown'));
    }
}
