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
     * ----------------------------------------- */
    if ( is_singular() || is_post_type_archive() ) {

        $post_type = get_post_type();

        /* ---- single-POSTTYPE.css ---- */
        if ( is_singular($post_type) ) {
            $single_css  = "/assets/css/single-{$post_type}.css";
            $single_path = $dir_path . $single_css;

            if ( file_exists($single_path) ) {
                wp_enqueue_style(
                    "single-{$post_type}",
                    $dir_uri . $single_css,
                    ['common-single'], // ← 共通 single.css の後に読み込む
                    filemtime($single_path)
                );
            }
        }

        /* ---- archive-POSTTYPE.css ---- */
        if ( is_post_type_archive($post_type) ) {
            $archive_css  = "/assets/css/archive-{$post_type}.css";
            $archive_path = $dir_path . $archive_css;

            if ( file_exists($archive_path) ) {
                wp_enqueue_style(
                    "archive-{$post_type}",
                    $dir_uri . $archive_css,
                    ['common-archive'], // ← 共通 archive.css の後に読み込む
                    filemtime($archive_path)
                );
            }
        }
    }
}

add_action('wp_enqueue_scripts', 'ivr_enqueue_assets');
