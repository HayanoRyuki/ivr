<?php
/**
 * Template Name: お問い合わせページ
 * Description: お問い合わせフォームを表示するページ
 */

get_header();
?>

<main class="form-page">
  <div class="form-page__header">
    <div class="container">
      <h1 class="form-page__title">お問い合わせ</h1>
      <p class="form-page__lead">
        サービスに関するご質問・ご相談など、お気軽にお問い合わせください。<br>
        担当者より折り返しご連絡いたします。
      </p>
    </div>
  </div>

  <div class="form-page__body">
    <div class="container">
      <?php get_template_part('form-parts/contact-form'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
