<?php get_header(); ?>

<!-- lp-connect only -->
<div class="lp-connect">

  <!--header-->
  <header class="lp-connect__header">
    <div class="lp-connect__header-inner">
      <a href="<?php echo home_url('/'); ?>" class="lp-connect__header-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.webp" alt="代表電話コネクト" width="426" height="112">
      </a>
      <nav class="lp-connect__header-nav">
        <ul class="lp-connect__header-nav-list">
          <li><a href="#problem">よくある課題</a></li>
          <li><a href="#function">機能について</a></li>
          <li><a href="#recommend">活用シーン</a></li>
          <li><a href="#price">料金プラン</a></li>
          <li><a href="#faq">よくあるご質問</a></li>
          <li><a href="#">ログイン</a></li>
        </ul>
        <div class="lp-connect__header-nav-cta">
          <a class="lp-connect__header-button lp-connect__header-button--trial" href="#">無料トライアル</a>
          <a class="lp-connect__header-button" href="#">資料請求はこちら</a>
          <a class="lp-connect__header-button lp-connect__header-button--login" href="#">ログイン</a>
        </div>
      </nav>
    </div>
  </header>
  <!--/ end header-->

  <!--main-->
  <main class="lp-connect__main">

    <!-- fv -->
    <section class="lp-connect__fv js-in-view fade-in-up">
      <div class="lp-connect__fv-inner">
        <h2 class="lp-connect__fv-title">
          代表電話は<br>
          システム対応で<span class="lp-connect__fv-title--large">文字起こし、<br>
          必要な電話</span>だけ折り返す。
        </h2>
        <p class="lp-connect__fv-text">
          オフィス向けクラウド受付システム国内シェアNo1の<br class="lp-connect__pc-only">
          「RECEPTIONIST」の会社が提供します。
        </p>

        <div class="lp-connect__fv-cta">
          <a class="lp-connect__button" href="#">
            資料を見てみる
            <span class="lp-connect__button-icon">
              <svg width="9" height="16" ...>...</svg>
            </span>
          </a>
        </div>

        <div class="lp-connect__fv-cta lp-connect__fv-cta--sp">
          <a class="lp-connect__button lp-connect__button--blue" href="#">無料トライアル</a>
          <a class="lp-connect__button" href="#">資料請求はこちら</a>
        </div>
      </div>

      <div class="lp-connect__fv-img">
        <picture>
          <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/img_fv--pc.webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_fv--sp.webp" alt="..." width="738" height="712">
        </picture>
      </div>
    </section>
    <!--/ end fv -->

    <!-- about -->
    <section class="lp-connect__about js-in-view fade-in-up" id="about">
      <div class="lp-connect__about-inner">
        <h2 class="lp-connect__about-title">代表電話コネクト<span class="lp-connect__about-title--small">とは？</span></h2>

        <h3 class="lp-connect__about-concept">
          不要な電話対応をなくす、<br class="lp-connect__sp-only">
          <span class="lp-connect__about-concept--blue">月額固定のサービス</span>です。
        </h3>

        <div class="lp-connect__about-contents js-in-view fade-in-up">

          <div class="lp-connect__about-card">
            <div class="lp-connect__about-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_about01.webp" loading="lazy" alt="" width="560" height="560">
            </div>
            <p class="lp-connect__about-card-text">代表電話をシステム自動応答で<br>用件を文字起こし</p>
          </div>

          <div class="lp-connect__about-card">
            <div class="lp-connect__about-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_about02.webp" loading="lazy" alt="" width="560" height="560">
            </div>
            <p class="lp-connect__about-card-text">チャットに<br class="lp-connect__pc-only">内容を通知</p>
          </div>

          <div class="lp-connect__about-card">
            <div class="lp-connect__about-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_about03.webp" loading="lazy" alt="" width="560" height="560">
            </div>
            <p class="lp-connect__about-card-text">必要に応じて<br class="lp-connect__pc-only">折り返して対応</p>
          </div>

        </div>
      </div>

      <div class="lp-connect__about-cta js-in-view fade-in-up">
        <a class="lp-connect__button" href="#">
          資料を見てみる
          <span class="lp-connect__button-icon">...</span>
        </a>
      </div>
    </section>
    <!-- / end about -->

     <!-- / end about -->

    <!--problem-->
    <section class="lp-connect__problem" id="problem">
      <div class="lp-connect__inner">
        <h2 class="lp-connect__problem-title js-in-view fade-in-up">
          こんな<span class="lp-connect__problem-title--large">お悩み</span>、ありませんか？
        </h2>

        <div class="lp-connect__problem-contents js-in-view fade-in-up">

          <div class="lp-connect__problem-card">
            <h3 class="lp-connect__problem-card-comment">
              電話が鳴るたびに<br>スタッフの時間が取られる
            </h3>
            <div class="lp-connect__problem-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_problem01.webp"
                   loading="lazy" alt="" width="496" height="354">
            </div>
            <p class="lp-connect__problem-card-text">
              <span class="lp-connect__problem-card-text--large">自動応答</span>で<br>無駄な電話に邪魔されない
            </p>
          </div>

          <div class="lp-connect__problem-card">
            <h3 class="lp-connect__problem-card-comment">
              営業電話は出たくないが<br>出ないとわからない
            </h3>
            <div class="lp-connect__problem-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_problem02.webp"
                   loading="lazy" alt="" width="496" height="354">
            </div>
            <p class="lp-connect__problem-card-text">
              <span class="lp-connect__problem-card-text--large">記録された通話内容</span>から<br>必要な用件だけ折り返し
            </p>
          </div>

          <div class="lp-connect__problem-card">
            <h3 class="lp-connect__problem-card-comment">
              電話代行サービスは<br>月額料＋受信通話料が高い
            </h3>
            <div class="lp-connect__problem-card-img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_problem03.webp"
                   loading="lazy" alt="" width="496" height="354">
            </div>
            <p class="lp-connect__problem-card-text">
              受信通話料の従量課金がない<br>
              <span class="lp-connect__problem-card-text--large">完全固定月額料金</span>
            </p>
          </div>

        </div>

        <div class="lp-connect__problem-cta">
          <a class="lp-connect__button lp-connect__button--outline" href="#">
            資料を見てみる
            <span class="lp-connect__button-icon">…</span>
          </a>
        </div>
      </div>
    </section>
    <!--/ end problem-->


    <!--function-->
    <section class="lp-connect__function" id="function">
      <div class="lp-connect__inner">

        <div class="lp-connect__section-head js-in-view fade-in-up">
          <div class="lp-connect__section-head-deco">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/deco_function-title.webp"
                 alt="Function" width="366" height="72" loading="lazy">
          </div>
          <h2 class="lp-connect__section-head-title">機能について</h2>
        </div>

        <p class="lp-connect__function-intro js-in-view fade-in-up">
          代表番号宛の電話に自動で応答・記録し、すぐに通話内容を確認できます。
        </p>

        <div class="lp-connect__function-contents js-in-view fade-in-up">

          <?php
          // 6機能カードの画像ファイル名
          $function_imgs = [
            'img_function01.webp',
            'img_function02.webp',
            'img_function03.webp',
            'img_function04.webp',
            'img_function05.webp',
            'img_function06.webp'
          ];

          $function_titles = [
            '自動応答',
            '音声録音',
            '音声文字起こし',
            '着信ログをWEBから確認',
            '着信ログのステータス管理',
            'チャット連携'
          ];

          for ($i = 0; $i < 6; $i++) : ?>
            <div class="lp-connect__function-card">
              <div class="lp-connect__function-card-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $function_imgs[$i]; ?>"
                     loading="lazy" width="210" height="200" alt="">
              </div>
              <h3 class="lp-connect__function-card-title"><?php echo $function_titles[$i]; ?></h3>
            </div>
          <?php endfor; ?>

        </div>

        <div class="lp-connect__function-cta">
          <a class="lp-connect__button" href="#">
            資料を見てみる
            <span class="lp-connect__button-icon">…</span>
          </a>
        </div>

      </div>
    </section>
    <!--/ end function-->


    <!--recommend-->
    <section class="lp-connect__recommend" id="recommend">
      <div class="lp-connect__inner">

        <div class="lp-connect__section-head js-in-view fade-in-up">
          <span class="lp-connect__section-head-deco">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/deco_recommend-title.webp"
                 alt="Recommend" width="366" height="72" loading="lazy">
          </span>
          <h2 class="lp-connect__section-head-title">
            こんなシーンで<br class="lp-connect__sp-only">活用できます
          </h2>
        </div>

        <div class="lp-connect__recommend-contents js-in-view fade-in-up">

          <?php
          $recommend_imgs = [
            'img_recommend01.webp',
            'img_recommend02.webp',
            'img_recommend03.webp',
            'img_recommend04.webp',
            'img_recommend05.webp'
          ];

          $recommend_titles = [
            '固定電話をなくしたい',
            'ハイブリッドワーク',
            'オフィス不在時の対応',
            '外線番号の棚卸し',
            '電話が苦手な若手社員が多い'
          ];

          $recommend_texts = [
            '全社員への携帯端末の貸与やフリーアドレス化により、固定電話が不要になった。',
            '出社メンバーにだけ代表電話対応が発生してしまうのを避けたい。',
            '平日の事務所に誰もいない、深夜など営業時間外の電話もリアルタイム確認したい。',
            '外線番号が複数あるが、実際にどのくらい使われているのかわからないのでログを取りたい。',
            '若手社員が電話に出てくれない・慣れていないので用件を正確に伝えられない。'
          ];

          for ($i = 0; $i < 5; $i++) : ?>
            <div class="lp-connect__recommend-card">
              <div class="lp-connect__recommend-card-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $recommend_imgs[$i]; ?>"
                     loading="lazy" width="602" height="404" alt="">
              </div>
              <div class="lp-connect__recommend-card-body">
                <h3 class="lp-connect__recommend-card-title"><?php echo $recommend_titles[$i]; ?></h3>
                <p class="lp-connect__recommend-card-text"><?php echo $recommend_texts[$i]; ?></p>
              </div>
            </div>
          <?php endfor; ?>

        </div>

        <div class="lp-connect__recommend-cta">
          <a class="lp-connect__button" href="#">
            資料を見てみる
            <span class="lp-connect__button-icon">…</span>
          </a>
        </div>

      </div>
    </section>
    <!--/ end recommend-->


    <!--faq-->
    <section class="lp-connect__faq" id="faq">
      <div class="lp-connect__inner">

        <div class="lp-connect__section-head js-in-view fade-in-up">
          <span class="lp-connect__section-head-deco">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/deco_faq-title.webp"
                 alt="FAQ" width="366" height="72" loading="lazy">
          </span>
          <h2 class="lp-connect__section-head-title">よくあるご質問</h2>
        </div>

        <div class="lp-connect__faq-contents js-in-view fade-in-up">

          <div class="lp-connect__faq-item">
            <h3 class="lp-connect__faq-item-question">音声ガイダンスの内容は変更できますか？</h3>
            <p class="lp-connect__faq-item-answer">現時点では変更することはできませんが、今後変更できるようになる予定です。</p>
          </div>

          <div class="lp-connect__faq-item">
            <h3 class="lp-connect__faq-item-question">通話内容の録音データはダウンロードできますか？</h3>
            <p class="lp-connect__faq-item-answer">Web管理画面からダウンロード可能です。Slack連携時はSlack内から再生可能です。</p>
          </div>

          <div class="lp-connect__faq-item">
            <h3 class="lp-connect__faq-item-question">複数外線 → 1つの050番号に転送できますか？</h3>
            <p class="lp-connect__faq-item-answer">可能ですが、どの外線番号からかの識別はできません。識別したい場合は番号を分けてください。</p>
          </div>

          <div class="lp-connect__faq-item">
            <h3 class="lp-connect__faq-item-question">セキュリティは？</h3>
            <p class="lp-connect__faq-item-answer">ISMS / ISO27017 取得済みで安全に配慮した運用です。</p>
          </div>

        </div>

        <div class="lp-connect__faq-cta">
          <a class="lp-connect__button" href="#">
            資料を見てみる
            <span class="lp-connect__button-icon">…</span>
          </a>
        </div>

      </div>
    </section>
    <!--/ end faq-->


    <!--price-->
    <section class="lp-connect__price" id="price">
      <div class="lp-connect__inner">

        <div class="lp-connect__section-head js-in-view fade-in-up">
          <span class="lp-connect__section-head-deco">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/deco_price-title.webp"
                 alt="料金プラン" width="366" height="72" loading="lazy">
          </span>
          <h2 class="lp-connect__section-head-title">料金プラン</h2>
        </div>

        <p class="lp-connect__price-intro js-in-view fade-in-up">
          着信時の通話料・文字起こし・チャット通知など、すべて込みの定額料金です。
        </p>

        <div class="lp-connect__price-contents js-in-view fade-in-up">

          <div class="lp-connect__price-card">
            <div class="lp-connect__price-card-head">
              <h3 class="lp-connect__price-card-title">Receptionist<br>登録社員数</h3>
            </div>
            <div class="lp-connect__price-card-body">
              <div class="lp-connect__price-card-detail">
                <span class="lp-connect__price-card-number">50</span>
                <span class="lp-connect__price-card-unit">人ごと</span>
              </div>
            </div>
          </div>

          <div class="lp-connect__price-card">
            <div class="lp-connect__price-card-head">
              <h3 class="lp-connect__price-card-title">代表電話コネクト<br>月額料金（税抜）</h3>
            </div>
            <div class="lp-connect__price-card-body">
              <div class="lp-connect__price-card-detail">
                <span class="lp-connect__price-card-number">5,000</span>
                <span class="lp-connect__price-card-unit">円</span>
                <span class="lp-connect__price-card-unit--mini">/ 月・番号</span>
              </div>
            </div>
          </div>

        </div>

        <div class="lp-connect__price-babble js-in-view fade-in-up">
          <span class="lp-connect__price-babble-example">例）</span>
          <p class="lp-connect__price-babble-text">
            RECEPTIONIST登録社員数が120名で取得番号1つの場合、<br class="lp-connect__sp-only">
            5,000円 × 3 = 15,000円
          </p>
        </div>

        <div class="lp-connect__price-attention js-in-view fade-in-up">
          <p class="lp-connect__price-attention-text lp-connect__price-attention-text--bold">
            ※ 200名以上はボリュームディスカウントでお見積もりします。
          </p>
          <p class="lp-connect__price-attention-text">
            ※ RECEPTIONISTオプション機能のため、ご利用企業のみ利用可能です。
          </p>
        </div>

      </div>
    </section>
    <!--/ end price-->
  </main>
  <!--/ end main -->

  <!-- fixed cta -->
  <div class="lp-connect__fixed-cta isShow" id="js-fixedCta">
    <div class="lp-connect__fixed-cta-inner">
      <div class="lp-connect__fixed-cta-links">
        <a class="lp-connect__button lp-connect__button--blue" href="#">無料トライアル</a>
        <a class="lp-connect__button" href="#">資料請求はこちら</a>
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer class="lp-connect__footer">
    <div class="lp-connect__inner">

      <!-- CTA box -->
      <div class="lp-connect__footer-cta js-in-view fade-in-up">
        <h2 class="lp-connect__footer-title">詳しくは、資料を<br class="lp-connect__sp-only">お受け取りください。</h2>

        <div class="lp-connect__footer-cta-banner">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_cta-banner.webp" loading="lazy" alt="" width="804" height="452">
        </div>

        <div class="lp-connect__footer-cta-links">
          <a href="#" class="lp-connect__button">資料を見てみる</a>
          <a href="#" class="lp-connect__button lp-connect__button--blue">お問い合わせ</a>
        </div>
      </div>

      <!-- bottom -->
      <div class="lp-connect__footer-bottom">

        <div class="lp-connect__footer-marks">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_isms.webp" loading="lazy" alt="" width="236" height="210">
        </div>

        <div class="lp-connect__footer-logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_company.webp" loading="lazy" alt="" width="264" height="64">
        </div>

        <ul class="lp-connect__footer-nav">
          <li><a href="https://receptionist.co.jp/about" target="_blank">運営会社情報</a></li>
          <li><a href="https://help.receptionist.jp/?help=402" target="_blank">個人情報保護方針</a></li>
          <li><a href="https://help.receptionist.jp/" target="_blank">ヘルプセンター</a></li>
          <li><a href="https://staging.ivr.receptionist.jp/" target="_blank">利用規約</a></li>
        </ul>

        <div class="lp-connect__footer-copyright">
          <span>© RECEPTIONIST, Inc</span>
          <span>All Rights Reserved.</span>
        </div>

      </div>
    </div>
  </footer>
</div>

<!-- js -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lp-connect.js"></script>

<?php get_footer(); ?>

