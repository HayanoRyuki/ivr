/**
 * フォーム送信処理
 *
 * reCAPTCHA v3 + AJAX送信
 */
(function() {
  'use strict';

  // reCAPTCHA設定確認
  var recaptchaEnabled = typeof recaptchaConfig !== 'undefined' && recaptchaConfig.enabled;
  if (recaptchaEnabled) {
    console.log('reCAPTCHA v3 enabled');
  }

  /**
   * reCAPTCHA トークンを取得
   */
  function getRecaptchaToken(action) {
    return new Promise(function(resolve) {
      if (!recaptchaEnabled || typeof grecaptcha === 'undefined') {
        resolve('');
        return;
      }

      grecaptcha.ready(function() {
        grecaptcha.execute(recaptchaConfig.siteKey, { action: action })
          .then(function(token) {
            resolve(token);
          })
          .catch(function(err) {
            console.error('reCAPTCHA error:', err);
            resolve('');
          });
      });
    });
  }

  /**
   * フォームの初期化
   */
  function initForms() {
    var forms = document.querySelectorAll('.ivr-form');

    forms.forEach(function(form) {
      form.addEventListener('submit', handleFormSubmit);
    });
  }

  /**
   * フォーム送信ハンドラー
   */
  async function handleFormSubmit(e) {
    e.preventDefault();

    var form = e.target;
    var submitBtn = form.querySelector('button[type="submit"]');
    var errorContainer = form.querySelector('.form-error');
    var formType = form.dataset.formType || 'request';

    // 送信中の状態
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.dataset.originalText = submitBtn.textContent;
      submitBtn.textContent = '送信中...';
    }

    // エラー表示をクリア
    if (errorContainer) {
      errorContainer.style.display = 'none';
      errorContainer.textContent = '';
    }

    try {
      // reCAPTCHAトークンを取得
      var recaptchaToken = await getRecaptchaToken('submit_form');

      // FormDataを作成
      var formData = new FormData(form);
      formData.append('action', 'submit_form');
      formData.append('form_type', formType);
      formData.append('recaptcha_token', recaptchaToken);

      // AJAX送信
      var response = await fetch(ivrFormConfig.ajaxUrl, {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
      });

      var result = await response.json();

      if (result.success) {
        // 成功時：リダイレクト
        if (result.data && result.data.redirect) {
          window.location.href = result.data.redirect;
        } else {
          // リダイレクト先がない場合は成功メッセージ表示
          showSuccess(form, result.data.message || '送信が完了しました。');
        }
      } else {
        // エラー時
        showError(form, result.data.message || '送信に失敗しました。');
      }
    } catch (error) {
      console.error('Form submission error:', error);
      showError(form, 'ネットワークエラーが発生しました。時間をおいて再度お試しください。');
    } finally {
      // ボタンを元に戻す
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.textContent = submitBtn.dataset.originalText || '送信する';
      }
    }
  }

  /**
   * エラー表示
   */
  function showError(form, message) {
    var errorContainer = form.querySelector('.form-error');
    if (errorContainer) {
      errorContainer.textContent = message;
      errorContainer.style.display = 'block';
      // エラー箇所にスクロール
      errorContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
    } else {
      alert(message);
    }
  }

  /**
   * 成功表示
   */
  function showSuccess(form, message) {
    var successContainer = form.querySelector('.form-success');
    if (successContainer) {
      successContainer.textContent = message;
      successContainer.style.display = 'block';
      form.style.display = 'none';
    } else {
      alert(message);
    }
  }

  // DOM読み込み完了後に初期化
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initForms);
  } else {
    initForms();
  }
})();
