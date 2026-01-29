<?php
/**
 * CSS・JS の読み込み
 *
 * 構成:
 * 1. reset.css     - リセットCSS（全ページ共通・最優先）
 * 2. common.css    - サイト全体の基本スタイル（全ページ共通）
 * 3. front-page.css - TOPページ（LP）専用スタイル ※front-pageのみ
 * 4. single.css    - 投稿詳細ページ共通スタイル
 * 5. archive.css   - アーカイブページ共通スタイル
 * 6. page.css      - 固定ページ共通スタイル
 * 7. 各投稿タイプ別CSS - 自動読み込み
 */

function ivr_enqueue_assets() {

    $dir_uri  = get_template_directory_uri();
    $dir_path = get_template_directory();

    /* -----------------------------------------
     * 1. リセットCSS（最優先）
     * ----------------------------------------- */
    wp_enqueue_style(
        'ivr-reset',
        $dir_uri . '/assets/css/reset.css',
        [],
        filemtime($dir_path . '/assets/css/reset.css')
    );

    /* -----------------------------------------
     * 2. 共通CSS（サイト全体の基本スタイル）
     * ----------------------------------------- */
    wp_enqueue_style(
        'ivr-common',
        $dir_uri . '/assets/css/common.css',
        ['ivr-reset'],
        filemtime($dir_path . '/assets/css/common.css')
    );

    /* -----------------------------------------
     * 3. TOPページ専用CSS（front-page.phpのみ）
     * ----------------------------------------- */
    if ( is_front_page() ) {
        wp_enqueue_style(
            'ivr-front-page',
            $dir_uri . '/assets/css/front-page.css',
            ['ivr-common'],
            filemtime($dir_path . '/assets/css/front-page.css')
        );

        // LP専用JS
        wp_enqueue_script(
            'ivr-lp-connect-js',
            $dir_uri . '/assets/js/lp-connect.js',
            [],
            filemtime($dir_path . '/assets/js/lp-connect.js'),
            true
        );
    }

    /* -----------------------------------------
     * 4. 投稿詳細ページ共通CSS
     * ----------------------------------------- */
    if ( is_singular() && !is_front_page() ) {
        $single_css_path = $dir_path . '/assets/css/single.css';
        if ( file_exists($single_css_path) ) {
            wp_enqueue_style(
                'ivr-single',
                $dir_uri . '/assets/css/single.css',
                ['ivr-common'],
                filemtime($single_css_path)
            );
        }
    }

    /* -----------------------------------------
     * 5. アーカイブページ共通CSS
     * ----------------------------------------- */
    if ( is_archive() || is_home() ) {
        $archive_css_path = $dir_path . '/assets/css/archive.css';
        if ( file_exists($archive_css_path) ) {
            wp_enqueue_style(
                'ivr-archive',
                $dir_uri . '/assets/css/archive.css',
                ['ivr-common'],
                filemtime($archive_css_path)
            );
        }
    }

    /* -----------------------------------------
     * 6. 固定ページ共通CSS
     * ----------------------------------------- */
    if ( is_page() && !is_front_page() ) {
        $page_css_path = $dir_path . '/assets/css/page.css';
        if ( file_exists($page_css_path) ) {
            wp_enqueue_style(
                'ivr-page',
                $dir_uri . '/assets/css/page.css',
                ['ivr-common'],
                filemtime($page_css_path)
            );
        }
    }

    /* -----------------------------------------
     * 7. 投稿タイプ別 CSS（自動読み込み）
     * ----------------------------------------- */
    if ( is_singular() || is_post_type_archive() ) {

        $post_type = get_post_type();

        // ============================
        // ① 固定ページ（page）個別CSS
        // ============================
        if ( is_page() && !is_front_page() ) {
            $page_single_css  = "/assets/css/single-page.css";
            $page_single_path = $dir_path . $page_single_css;

            if ( file_exists($page_single_path) ) {
                wp_enqueue_style(
                    "ivr-single-page",
                    $dir_uri . $page_single_css,
                    ['ivr-page'],
                    filemtime($page_single_path)
                );
            }
        }

        // ============================
        // ② 通常投稿（post）
        // ============================
        if ( $post_type === 'post' ) {

            // --- single-post.css ---
            if ( is_single() ) {
                $post_single_css  = "/assets/css/single-post.css";
                $post_single_path = $dir_path . $post_single_css;

                if ( file_exists($post_single_path) ) {
                    wp_enqueue_style(
                        "ivr-single-post",
                        $dir_uri . $post_single_css,
                        ['ivr-single'],
                        filemtime($post_single_path)
                    );
                }
            }

            // --- archive-post.css（ブログ一覧）---
            if ( is_home() || is_archive() ) {
                $post_archive_css  = "/assets/css/archive-post.css";
                $post_archive_path = $dir_path . $post_archive_css;

                if ( file_exists($post_archive_path) ) {
                    wp_enqueue_style(
                        "ivr-archive-post",
                        $dir_uri . $post_archive_css,
                        ['ivr-archive'],
                        filemtime($post_archive_path)
                    );
                }
            }
        }

        // ============================
        // ③ カスタム投稿タイプ
        // ============================
        if ( $post_type && !in_array($post_type, ['post', 'page']) ) {

            // ---- single-POSTTYPE.css ----
            if ( is_singular($post_type) ) {
                $single_css  = "/assets/css/single-{$post_type}.css";
                $single_path = $dir_path . $single_css;

                if ( file_exists($single_path) ) {
                    wp_enqueue_style(
                        "ivr-single-{$post_type}",
                        $dir_uri . $single_css,
                        ['ivr-single'],
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
                        "ivr-archive-{$post_type}",
                        $dir_uri . $archive_css,
                        ['ivr-archive'],
                        filemtime($archive_path)
                    );
                }
            }
        }
    }

    /* -----------------------------------------
     * 8. テーマ共通 JS
     * ----------------------------------------- */
    $main_js_path = $dir_path . '/assets/js/main.js';
    if ( file_exists($main_js_path) ) {
        wp_enqueue_script(
            'ivr-main',
            $dir_uri . '/assets/js/main.js',
            [],
            filemtime($main_js_path),
            true
        );
    }

    /* -----------------------------------------
     * 9. フォームハンドラー JS
     * ----------------------------------------- */
    $form_handler_path = $dir_path . '/assets/js/form-handler.js';
    if ( file_exists($form_handler_path) ) {
        wp_enqueue_script(
            'ivr-form-handler',
            $dir_uri . '/assets/js/form-handler.js',
            [],
            filemtime($form_handler_path),
            true
        );

        // AJAX URL をJSに渡す
        wp_localize_script('ivr-form-handler', 'ivrFormConfig', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ]);
    }
}

add_action('wp_enqueue_scripts', 'ivr_enqueue_assets');
