<?php
/**
 * 資料請求フォーム
 *
 * 使用方法:
 * <?php get_template_part('form-parts/request-form'); ?>
 */
?>

<form class="ivr-form request-form" data-form-type="request" method="post">

  <!-- エラー表示エリア -->
  <div class="form-error" style="display: none;" role="alert"></div>

  <!-- 成功表示エリア -->
  <div class="form-success" style="display: none;"></div>

  <!-- Honeypot（スパム対策） -->
  <div class="hp-field" aria-hidden="true">
    <label for="website_url">Website</label>
    <input type="text" id="website_url" name="website_url" autocomplete="off" tabindex="-1">
  </div>

  <!-- Nonce -->
  <?php ivr_form_nonce_field(); ?>

  <!-- 貴社名 -->
  <div class="form-group">
    <label for="company" class="form-label">
      貴社名<span class="required">*</span>
    </label>
    <input
      type="text"
      id="company"
      name="company"
      class="form-input"
      required
      placeholder="例）株式会社RECEPTIONIST"
    >
  </div>

  <!-- 部署 -->
  <div class="form-group">
    <label for="department" class="form-label">
      部署
    </label>
    <input
      type="text"
      id="department"
      name="department"
      class="form-input"
      placeholder="例）総務部"
    >
  </div>

  <!-- 姓・名 -->
  <div class="form-group form-group--name">
    <div class="form-group__item">
      <label for="last_name" class="form-label">
        姓<span class="required">*</span>
      </label>
      <input
        type="text"
        id="last_name"
        name="last_name"
        class="form-input"
        required
        placeholder="例）山田"
      >
    </div>
    <div class="form-group__item">
      <label for="first_name" class="form-label">
        名<span class="required">*</span>
      </label>
      <input
        type="text"
        id="first_name"
        name="first_name"
        class="form-input"
        required
        placeholder="例）太郎"
      >
    </div>
  </div>

  <!-- メールアドレス -->
  <div class="form-group">
    <label for="email" class="form-label">
      メールアドレス<span class="required">*</span>
    </label>
    <input
      type="email"
      id="email"
      name="email"
      class="form-input"
      required
      placeholder="例）example@company.co.jp"
    >
  </div>

  <!-- 電話番号 -->
  <div class="form-group">
    <label for="phone" class="form-label">
      電話番号<span class="required">*</span>
    </label>
    <input
      type="tel"
      id="phone"
      name="phone"
      class="form-input"
      required
      placeholder="例）03-1234-5678"
    >
  </div>

  <!-- 現在お使いの電話回線 -->
  <div class="form-group">
    <fieldset class="form-fieldset">
      <legend class="form-label">現在お使いの電話回線</legend>
      <div class="form-radio-group">
        <label class="form-radio">
          <input type="radio" name="phone_line" value="アナログ回線">
          <span>アナログ回線</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="phone_line" value="ひかり回線">
          <span>ひかり回線</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="phone_line" value="その他">
          <span>その他</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="phone_line" value="不明" checked>
          <span>不明</span>
        </label>
      </div>
    </fieldset>
  </div>

  <!-- 1日の受電数 -->
  <div class="form-group">
    <fieldset class="form-fieldset">
      <legend class="form-label">1日の受電数</legend>
      <div class="form-radio-group">
        <label class="form-radio">
          <input type="radio" name="daily_calls" value="0〜5件">
          <span>0〜5件</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="daily_calls" value="6〜10件">
          <span>6〜10件</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="daily_calls" value="11〜20件">
          <span>11〜20件</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="daily_calls" value="21〜50件">
          <span>21〜50件</span>
        </label>
        <label class="form-radio">
          <input type="radio" name="daily_calls" value="50件以上">
          <span>50件以上</span>
        </label>
      </div>
    </fieldset>
  </div>

  <!-- 個人情報の取り扱いについての同意 -->
  <div class="form-group form-group--privacy">
    <label class="form-checkbox">
      <input type="checkbox" name="privacy_agree" value="1" required>
      <span>
        <a href="https://help.receptionist.jp/?help=402" target="_blank" rel="noopener noreferrer">
          （株）RECEPTIONISTの個人情報の取り扱い
        </a>に同意します。<span class="required">*</span>
      </span>
    </label>
  </div>

  <!-- 送信ボタン -->
  <div class="form-group form-group--submit">
    <button type="submit" class="btn btn--primary form-submit-btn">
      資料を請求する
    </button>
  </div>

</form>
