<?php

// inc ディレクトリ内のファイルを読み込み
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
// カスタム投稿タイプ
require_once get_template_directory() . '/inc/post-types.php';
// 資料（resource）メタボックス
require_once get_template_directory() . '/inc/resource-meta.php';
// 導入事例（case）外部確認機能
require_once get_template_directory() . '/inc/case-functions.php';
// reCAPTCHA v3 設定
require_once get_template_directory() . '/inc/recaptcha.php';
// Pardot 連携
require_once get_template_directory() . '/inc/pardot.php';
// フォーム送信処理
require_once get_template_directory() . '/inc/form-handler.php';

// ============================================
// 外部確認URLの閲覧制御（Public Post Preview方式）
// ============================================

/**
 * pre_get_posts: external_previewトークンがある場合、posts_resultsフィルターを登録
 */
add_action('pre_get_posts', function ($query) {
    if (!$query->is_main_query()) {
        return;
    }

    // external_previewとpreviewパラメータをチェック
    $token = $_GET['external_preview'] ?? '';
    $preview = $_GET['preview'] ?? '';
    if (empty($token) || $preview !== 'true') {
        return;
    }

    $post_type = $query->get('post_type');
    if ($post_type !== 'case') {
        return;
    }

    // キャッシュ無効化とnoindex設定
    if (!headers_sent()) {
        nocache_headers();
        header('X-Robots-Tag: noindex');
    }

    // posts_resultsフィルターを登録
    add_filter('posts_results', 'case_external_preview_set_publish', 10, 2);
});

/**
 * posts_results: トークン検証してOKなら記事のステータスを一時的にpublishに変更
 */
function case_external_preview_set_publish($posts, $query) {
    // フィルターを削除（他のクエリに影響させない）
    remove_filter('posts_results', 'case_external_preview_set_publish', 10);

    if (empty($posts)) {
        return $posts;
    }

    $post = $posts[0];
    $post_id = (int) $post->ID;

    // 公開済みなら正規URLにリダイレクト
    if ($post->post_status === 'publish') {
        wp_safe_redirect(get_permalink($post_id), 301);
        exit;
    }

    // トークン検証
    $token   = $_GET['external_preview'] ?? '';
    $saved   = get_post_meta($post_id, '_external_preview_token', true);
    $expires = intval(get_post_meta($post_id, '_external_preview_expires', true));

    if (empty($token) || empty($saved)) {
        wp_die('プレビューリンクが無効です。', '閲覧不可', ['response' => 404]);
    }

    if (!hash_equals($saved, $token)) {
        wp_die('プレビューリンクが無効です。', '閲覧不可', ['response' => 403]);
    }

    if (time() >= $expires) {
        wp_die('このリンクは有効期限が切れています。', '閲覧不可', ['response' => 403]);
    }

    // ★ 重要：記事のステータスを一時的にpublishに変更
    $posts[0]->post_status = 'publish';

    // コメントとピンバックを無効化
    add_filter('comments_open', '__return_false');
    add_filter('pings_open', '__return_false');

    return $posts;
}