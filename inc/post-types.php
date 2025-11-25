<?php
/**
 * カスタム投稿タイプ登録
 * resource / case / help
 */

function mc_register_custom_post_types() {

    // ====================================================================
    // 1. 資料（resource）
    // ====================================================================
    register_post_type('resource', [
        'labels' => [
            'name'          => '資料',
            'singular_name' => '資料',
            'add_new'       => '新規追加',
            'add_new_item'  => '資料を追加',
            'edit_item'     => '資料を編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-media-document',
        'supports'      => ['title', 'editor', 'thumbnail', 'revisions'],
        'rewrite'       => ['slug' => 'resource'],
        'show_in_rest'  => true, // Gutenberg 対応
    ]);

    // ====================================================================
    // 2. 導入事例（case）
    // ====================================================================
    register_post_type('case', [
        'labels' => [
            'name'          => '導入事例',
            'singular_name' => '導入事例',
            'add_new'       => '新規追加',
            'add_new_item'  => '導入事例を追加',
            'edit_item'     => '導入事例を編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 6,
        'menu_icon'     => 'dashicons-format-gallery',
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'rewrite'       => ['slug' => 'case'],
        'show_in_rest'  => true,
    ]);

    // ====================================================================
    // 3. ヘルプ（help）
    // ====================================================================
    register_post_type('help', [
        'labels' => [
            'name'          => 'ヘルプ',
            'singular_name' => 'ヘルプ記事',
            'add_new'       => '新規追加',
            'add_new_item'  => 'ヘルプ記事を追加',
            'edit_item'     => 'ヘルプ記事を編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 7,
        'menu_icon'     => 'dashicons-sos',
        'supports'      => ['title', 'editor', 'thumbnail', 'revisions'],
        'rewrite'       => ['slug' => 'help'],
        'show_in_rest'  => true,
    ]);
}
add_action('init', 'mc_register_custom_post_types');
