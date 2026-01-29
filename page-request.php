<?php
/**
 * Template Name: 資料請求ページ
 * Description: 資料請求フォームを表示するページ
 */

get_header();
?>

<main class="form-page">
  <div class="form-page__header">
    <div class="container">
      <h1 class="form-page__title">資料請求</h1>
      <p class="form-page__lead">
        代表電話コネクトの詳しい資料をお送りいたします。<br>
        以下のフォームに必要事項をご入力ください。
      </p>
    </div>
  </div>

  <div class="form-page__body">
    <div class="container">
      <?php get_template_part('form-parts/request-form'); ?>
    </div>
  </div>
</main>

<?php get_footer('simple'); ?>
