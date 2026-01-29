<?php
/**
 * Template Name: 資料請求 サンクスページ
 * Description: 資料請求フォーム送信後のサンクスページ
 */

get_header('resource');
?>

<main class="thanks-page">
  <div class="thanks-container">
    <div class="thanks-icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
    </div>

    <h1 class="thanks-title">資料請求を受け付けました</h1>

    <p class="thanks-message">
      この度は資料請求いただき、誠にありがとうございます。<br>
      ご入力いただいたメールアドレス宛に、資料をお送りいたします。
    </p>

    <div class="thanks-note">
      <p>
        ※ 数分経ってもメールが届かない場合は、迷惑メールフォルダをご確認ください。<br>
        ※ ご不明な点がございましたら、お気軽にお問い合わせください。
      </p>
    </div>

    <div class="thanks-actions">
      <a href="<?php echo home_url('/'); ?>" class="btn btn--primary">
        トップページへ戻る
      </a>
    </div>
  </div>
</main>

<?php get_footer('simple'); ?>
