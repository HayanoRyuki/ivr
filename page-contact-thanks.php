<?php
/**
 * Template Name: お問い合わせ サンクスページ
 * Description: お問い合わせフォーム送信後のサンクスページ
 */

get_header();
?>

<main class="thanks-page">
  <div class="thanks-container">
    <div class="thanks-icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
    </div>

    <h1 class="thanks-title">お問い合わせを受け付けました</h1>

    <p class="thanks-message">
      この度はお問い合わせいただき、誠にありがとうございます。<br>
      内容を確認の上、担当者より折り返しご連絡いたします。
    </p>

    <div class="thanks-note">
      <p>
        ※ 通常2〜3営業日以内にご連絡いたします。<br>
        ※ お急ぎの場合は、お電話にてお問い合わせください。
      </p>
    </div>

    <div class="thanks-actions">
      <a href="<?php echo home_url('/'); ?>" class="btn btn--primary">
        トップページへ戻る
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>
