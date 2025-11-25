<?php

// テーマの基本設定
function ivr_theme_setup() {

    // title タグ
    add_theme_support('title-tag');

    // アイキャッチ画像
    add_theme_support('post-thumbnails');

    // メニュー
    register_nav_menus([
        'header_nav' => 'ヘッダーメニュー',
        'footer_nav' => 'フッターメニュー',
    ]);
}

add_action('after_setup_theme', 'ivr_theme_setup');

