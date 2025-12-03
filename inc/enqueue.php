<?php
/**
 * CSS・JS の読み込み（LP + 通常ページ + 投稿タイプ別CSS）
 */

function ivr_enqueue_assets() {

    $dir_uri  = get_template_directory_uri();
    $dir_path = get_template_directory();

    /* -----------------------------------------
     * 1. リセットCSS（最優先）
     * ----------------------------------------- */
    wp_enqueue_style(
        'reset',
        $dir_uri . '/assets/css/reset.css',
        [],
        filemtime($dir_path . '/assets/css/reset.css')
    );

    /* -----------------------------------------
     * 2. デザイナー共通CSS
     * ----------------------------------------- */
    wp_enqueue_style(
        'design-style',
        $dir_uri . '/assets/css/style.css',
        ['reset'],
        filemtime($dir_path . '/assets/css/style.css')
    );

    /* -----------------------------------------
     * 3. 共通 single.css / archive.css
     * ----------------------------------------- */
    wp_enqueue_style(
        'common-single',
        $dir_uri . '/assets/css/single.css',
        ['design-style'],
        filemtime($dir_path . '/assets/css/single.css')
    );

    wp_enqueue_style(
        'common-archive',
        $dir_uri . '/assets/css/archive.css',
        ['design-style'],
        filemtime($dir_path . '/assets/css/archive.css')
    );

    /* -----------------------------------------
     * 4. LP専用（lp-connect.css）
     *    ※ 必要なら条件分岐へ変更可能
     * ----------------------------------------- */
    wp_enqueue_style(
        'lp-connect',
        $dir_uri . '/assets/css/lp-connect.css',
        ['reset', 'design-style'],
        filemtime($dir_path . '/assets/css/lp-connect.css')
    );

    wp_enqueue_script(
        'lp-connect-js',
        $dir_uri . '/assets/js/lp-connect.js',
        [],
        filemtime($dir_path . '/assets/js/lp-connect.js'),
        true
    );

    /* -----------------------------------------
     * 5. テーマ共通 JS
     * ----------------------------------------- */
    wp_enqueue_script(
        'mc-main',
        $dir_uri . '/assets/js/main.js',
        [],
        filemtime($dir_path . '/assets/js/main.js'),
        true
    );

    /* -----------------------------------------
 * 6. 投稿タイプ別 CSS（自動読み込み）
 * （page/post も含めて完全対応）
 * ----------------------------------------- */
if ( is_singular() || is_post_type_archive() ) {

    $post_type = get_post_type();

    // ============================
    // ① 固定ページ（page）
    // ============================
    if ( is_page() ) {
        $page_css  = "/assets/css/single-page.css";
        $page_path = $dir_path . $page_css;

        if ( file_exists($page_path) ) {
            wp_enqueue_style(
                "single-page",
                $dir_uri . $page_css,
                ['common-single'],
                filemtime($page_path)
            );
        }
    }

    // ============================
    // ② 通常投稿（post）
    // ============================
    if ( $post_type === 'post' ) {

        // --- single-post.css ---
        $post_single_css  = "/assets/css/single-post.css";
        $post_single_path = $dir_path . $post_single_css;

        if ( file_exists($post_single_path) ) {
            wp_enqueue_style(
                "single-post",
                $dir_uri . $post_single_css,
                ['common-single'],
                filemtime($post_single_path)
            );
        }

        // --- archive-post.css（ブログ一覧）---
        if ( is_home() || is_archive() ) {
            $post_archive_css  = "/assets/css/archive-post.css";
            $post_archive_path = $dir_path . $post_archive_css;

            if ( file_exists($post_archive_path) ) {
                wp_enqueue_style(
                    "archive-post",
                    $dir_uri . $post_archive_css,
                    ['common-archive'],
                    filemtime($post_archive_path)
                );
            }
        }
    }

    // ============================
    // ③ カスタム投稿タイプ（既存処理）
    // ============================
    if ( $post_type && !in_array($post_type, ['post', 'page']) ) {

        // ---- single-POSTTYPE.css ----
        if ( is_singular($post_type) ) {
            $single_css  = "/assets/css/single-{$post_type}.css";
            $single_path = $dir_path . $single_css;

            if ( file_exists($single_path) ) {
                wp_enqueue_style(
                    "single-{$post_type}",
                    $dir_uri . $single_css,
                    ['common-single'],
                    filemtime($single_path)
                );
            }
        }

        // ---- archive-POSTTYPE.css ----
        if ( is_post_type_archive($post_type) ) {
            $archive_css  = "/assets/css/archive-{$post_type}.css";
            $archive_path = $dir_path . $archive_css;

            if ( file_exists($archive_path) ) {
                wp_enqueue_style(
                    "archive-{$post_type}",
                    $dir_uri . $archive_css,
                    ['common-archive'],
                    filemtime($archive_path)
                );
            }
        }
    }
}

}

add_action('wp_enqueue_scripts', 'ivr_enqueue_assets');
