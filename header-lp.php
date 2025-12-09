<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- lp-connect wrapper -->
<div class="lp-connect">

<header class="lp-connect__header">
  <div class="lp-connect__header-inner">

    <!-- ロゴ -->
    <a href="<?php echo home_url('/'); ?>" class="lp-connect__header-logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.webp"
           alt="代表電話コネクト" width="426" height="112">
    </a>

    <!-- ナビ -->
    <nav class="lp-connect__header-nav">
      <ul class="lp-connect__header-nav-list">
        <li><a href="#problem">よくある課題</a></li>
        <li><a href="#function">機能について</a></li>
        <li><a href="#recommend">活用シーン</a></li>
        <li><a href="#price">料金プラン</a></li>
        <li><a href="#faq">よくあるご質問</a></li>

        <!-- ▼ 非表示：ログイン -->
        <!-- <li><a href="#">ログイン</a></li> -->
      </ul>

      <div class="lp-connect__header-nav-cta">

        <!-- ▼ 非表示：無料トライアル -->
        <!-- <a class="lp-connect__header-button lp-connect__header-button--trial" href="#">無料トライアル</a> -->

        <a class="lp-connect__header-button" href="#">資料請求はこちら</a>

        <!-- ▼ 非表示：ログイン -->
        <!-- <a class="lp-connect__header-button lp-connect__header-button--login" href="#">ログイン</a> -->
      </div>
    </nav>

  </div>
</header>
