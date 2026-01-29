<?php
/**
 * reCAPTCHA v3 設定・検証ロジック
 *
 * 使用方法:
 * 1. wp-config.php に以下を追加:
 *    define('RECAPTCHA_SITE_KEY', 'サイトキー');
 *    define('RECAPTCHA_SECRET_KEY', 'シークレットキー');
 *
 * 2. フォームでトークンを取得し、サーバー側で verify_recaptcha_token() を呼び出す
 */

/**
 * reCAPTCHAが設定済みかチェック
 */
function recaptcha_is_configured() {
    return defined('RECAPTCHA_SITE_KEY') && defined('RECAPTCHA_SECRET_KEY')
        && !empty(RECAPTCHA_SITE_KEY) && !empty(RECAPTCHA_SECRET_KEY);
}

/**
 * reCAPTCHA スクリプトの読み込み
 */
add_action('wp_enqueue_scripts', 'enqueue_recaptcha_scripts', 20);

function enqueue_recaptcha_scripts() {
    if (!recaptcha_is_configured()) {
        return;
    }

    // Google reCAPTCHA v3 API
    wp_enqueue_script(
        'google-recaptcha',
        'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY,
        [],
        null,
        true
    );

    // form-handler.js に設定を渡す
    wp_localize_script('ivr-form-handler', 'recaptchaConfig', [
        'siteKey' => RECAPTCHA_SITE_KEY,
        'enabled' => true,
    ]);
}

/**
 * reCAPTCHA トークンを検証
 *
 * @param string $token   フロントエンドから送信されたトークン
 * @param string $action  アクション名（トークン取得時と一致させる）
 * @return array          ['success' => bool, 'score' => float, ...]
 */
function verify_recaptcha_token($token, $action = 'submit_form') {
    // reCAPTCHAが未設定の場合はスキップ（開発環境用）
    if (!recaptcha_is_configured()) {
        return [
            'success' => true,
            'score'   => 1.0,
            'skipped' => true,
        ];
    }

    // トークンが空の場合
    if (empty($token)) {
        return [
            'success' => false,
            'error'   => 'Token is empty',
        ];
    }

    // Google API にトークンを送信して検証
    $response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret'   => RECAPTCHA_SECRET_KEY,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ],
        'timeout' => 10,
    ]);

    // API通信エラーの場合は通過させる（ユーザー体験優先）
    if (is_wp_error($response)) {
        error_log('reCAPTCHA API error: ' . $response->get_error_message());
        return [
            'success'   => true,
            'score'     => 0.5,
            'api_error' => true,
        ];
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);

    // スコア判定（0.5未満をブロック）
    $score     = $body['score'] ?? 0;
    $threshold = 0.5;

    // アクション名の検証（オプション）
    $action_valid = empty($action) || ($body['action'] ?? '') === $action;

    return [
        'success'      => ($body['success'] ?? false) && $score >= $threshold && $action_valid,
        'score'        => $score,
        'action'       => $body['action'] ?? '',
        'hostname'     => $body['hostname'] ?? '',
        'error_codes'  => $body['error-codes'] ?? [],
    ];
}
