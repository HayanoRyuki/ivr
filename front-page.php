<?php get_header('lp'); ?>

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
  営業電話やクレーム電話から、社員の時間を守る。<br class="lp-connect__pc-only">
  しかも月額固定料金で。
</p>

        <!-- PC CTA -->
<div class="lp-connect__fv-cta">
  <a class="lp-connect__button"
     href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
     target="_blank" rel="noopener">
    資料を見てみる
    <span class="lp-connect__button-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_button-arrow.svg"
           alt="" width="9" height="16">
    </span>
  </a>
</div>

        <!-- SP CTA -->
        <div class="lp-connect__fv-cta lp-connect__fv-cta--sp">

          <!-- ▼ 無料トライアル → 非表示 -->
          <!--
          <a class="lp-connect__button lp-connect__button--blue" href="#">無料トライアル</a>
          -->

          <a class="lp-connect__button"
             href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
             target="_blank" rel="noopener">
            資料請求はこちら
          </a>
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
  <a class="lp-connect__button"
     href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
     target="_blank" rel="noopener">
    資料を見てみる
    <span class="lp-connect__button-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_button-arrow.svg"
           alt="" width="9" height="16">
    </span>
  </a>
</div>
</section>
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
  <a class="lp-connect__button lp-connect__button--outline"
     href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
     target="_blank" rel="noopener">
    資料を見てみる
    <span class="lp-connect__button-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_button-arrow.svg"
           alt="" width="9" height="16">
    </span>
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
          // 8機能カードの設定（画像、タイトル、オプション機能かどうか）
          $functions = [
            ['img' => 'img_function01.webp', 'title' => '自動応答', 'option' => false],
            ['img' => 'img_function01.webp', 'title' => '用件振り分け', 'option' => true],  // TODO: 画像差し替え
            ['img' => 'img_function02.webp', 'title' => '音声録音', 'option' => false],
            ['img' => 'img_function03.webp', 'title' => '音声文字起こし', 'option' => false],
            ['img' => 'img_function01.webp', 'title' => '指定番号に転送', 'option' => true],  // TODO: 画像差し替え
            ['img' => 'img_function04.webp', 'title' => '着信ログをWEBから確認', 'option' => false],
            ['img' => 'img_function05.webp', 'title' => '着信ログのステータス管理', 'option' => false],
            ['img' => 'img_function06.webp', 'title' => 'チャット連携', 'option' => false],
          ];

          foreach ($functions as $func) : ?>
            <div class="lp-connect__function-card">
              <div class="lp-connect__function-card-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $func['img']; ?>"
                     loading="lazy" width="210" height="200" alt="">
              </div>
              <h3 class="lp-connect__function-card-title">
                <?php echo $func['title']; ?><?php if ($func['option']) echo ' <span class="lp-connect__function-option">*</span>'; ?>
              </h3>
            </div>
          <?php endforeach; ?>

        </div>

        <p class="lp-connect__function-note">* オプション機能です</p>

        <div class="lp-connect__function-cta">
  <a class="lp-connect__button"
     href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
     target="_blank" rel="noopener">
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
          // 6つの活用シーン
          $recommends = [
            [
              'img'   => 'img_recommend01.webp',
              'title' => '固定電話をなくしたい',
              'text'  => '全社員への携帯端末の貸与やフリーアドレス化により、固定電話が不要になった。'
            ],
            [
              'img'   => 'img_recommend02.webp',
              'title' => 'ハイブリッドワーク',
              'text'  => '出社メンバーにだけ代表電話対応が発生してしまうのを避けたい。'
            ],
            [
              'img'   => 'img_recommend01.webp',  // TODO: 画像差し替え
              'title' => '各部門あての電話',
              'text'  => '各部門あての電話の取次をなくし、それぞれの部門で電話対応を完結してほしい。'
            ],
            [
              'img'   => 'img_recommend03.webp',
              'title' => 'オフィス不在時の対応',
              'text'  => '平日の事務所に誰もいない、深夜など営業時間外の電話もリアルタイム確認したい。'
            ],
            [
              'img'   => 'img_recommend04.webp',
              'title' => '外線番号の棚卸し',
              'text'  => '外線番号が複数あるが、実際にどのくらい使われているのかわからないのでログを取りたい。'
            ],
            [
              'img'   => 'img_recommend05.webp',
              'title' => '電話が苦手な若手社員が多い',
              'text'  => '若手社員が電話に出てくれない・慣れていないので用件を正確に伝えられない。'
            ],
          ];

          foreach ($recommends as $item) : ?>
            <div class="lp-connect__recommend-card">
              <div class="lp-connect__recommend-card-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $item['img']; ?>"
                     loading="lazy" width="602" height="404" alt="">
              </div>
              <div class="lp-connect__recommend-card-body">
                <h3 class="lp-connect__recommend-card-title"><?php echo $item['title']; ?></h3>
                <p class="lp-connect__recommend-card-text"><?php echo $item['text']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

        <div class="lp-connect__recommend-cta">
  <a class="lp-connect__button"
     href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
     target="_blank" rel="noopener">
    資料を見てみる
    <span class="lp-connect__button-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_button-arrow.svg"
           alt="" width="9" height="16">
    </span>
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
            <p class="lp-connect__faq-item-answer">Web管理画面からダウンロード可能です。</p>
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
  <a class="lp-connect__button"
     href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
     target="_blank" rel="noopener">
    資料を見てみる
    <span class="lp-connect__button-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_button-arrow.svg"
           alt="" width="9" height="16">
    </span>
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

      <!-- ▼ 無料トライアルは公開時非表示 -->
      <!--
      <a class="lp-connect__button lp-connect__button--blue" href="#">無料トライアル</a>
      -->

      <a class="lp-connect__button"
         href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform?usp=dialog"
         target="_blank" rel="noopener">
        資料請求はこちら
      </a>

    </div>
  </div>
</div>

<!-- js -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lp-connect.js"></script>

<?php get_footer(); ?>


