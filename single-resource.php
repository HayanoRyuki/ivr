<?php
/**
 * Single Template: Resource（資料詳細）
 */
get_header();
?>

<main class="single single-resource">
  <div class="single-container single-container--two-col">

    <?php
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
    ?>

    <!-- 左カラム：資料内容 -->
    <div class="single-main">
      <article <?php post_class(); ?>>

        <header class="single-header">
          <div class="single-meta">
            <time class="single-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
              <?php echo get_the_date('Y年m月d日'); ?>
            </time>
          </div>
          <h1 class="single-title"><?php the_title(); ?></h1>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
          <div class="single-thumbnail">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <div class="single-content">
          <?php the_content(); ?>
        </div>

      </article>
    </div>

    <!-- 右カラム：資料請求フォーム -->
    <aside class="single-sidebar">
      <div class="resource-form">
        <h2 class="resource-form__title">資料請求フォーム</h2>
        <p class="resource-form__desc">フォームにご入力いただくと、資料をダウンロードいただけます。</p>

        <form class="resource-form__form" action="" method="post">

          <div class="resource-form__group">
            <label class="resource-form__label" for="company">貴社名 <span class="resource-form__required">*</span></label>
            <input type="text" id="company" name="company" class="resource-form__input" required>
          </div>

          <div class="resource-form__group">
            <label class="resource-form__label" for="department">部署</label>
            <input type="text" id="department" name="department" class="resource-form__input">
          </div>

          <div class="resource-form__row">
            <div class="resource-form__group resource-form__group--half">
              <label class="resource-form__label" for="last_name">姓 <span class="resource-form__required">*</span></label>
              <input type="text" id="last_name" name="last_name" class="resource-form__input" required>
            </div>
            <div class="resource-form__group resource-form__group--half">
              <label class="resource-form__label" for="first_name">名 <span class="resource-form__required">*</span></label>
              <input type="text" id="first_name" name="first_name" class="resource-form__input" required>
            </div>
          </div>

          <div class="resource-form__group">
            <label class="resource-form__label" for="email">メールアドレス <span class="resource-form__required">*</span></label>
            <input type="email" id="email" name="email" class="resource-form__input" required>
          </div>

          <div class="resource-form__group">
            <label class="resource-form__label" for="phone">電話番号 <span class="resource-form__required">*</span></label>
            <input type="tel" id="phone" name="phone" class="resource-form__input" required>
          </div>

          <div class="resource-form__group">
            <label class="resource-form__label">現在お使いの電話回線 <span class="resource-form__required">*</span></label>
            <div class="resource-form__radio-group">
              <label class="resource-form__radio">
                <input type="radio" name="phone_line" value="アナログ回線" required>
                <span>アナログ回線</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="phone_line" value="ひかり回線">
                <span>ひかり回線</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="phone_line" value="その他">
                <span>その他</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="phone_line" value="不明">
                <span>不明</span>
              </label>
            </div>
          </div>

          <div class="resource-form__group">
            <label class="resource-form__label">1日の受電数 <span class="resource-form__required">*</span></label>
            <div class="resource-form__radio-group">
              <label class="resource-form__radio">
                <input type="radio" name="calls_per_day" value="0〜5件" required>
                <span>0〜5件</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="calls_per_day" value="6〜10件">
                <span>6〜10件</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="calls_per_day" value="11〜20件">
                <span>11〜20件</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="calls_per_day" value="21〜50件">
                <span>21〜50件</span>
              </label>
              <label class="resource-form__radio">
                <input type="radio" name="calls_per_day" value="50件以上">
                <span>50件以上</span>
              </label>
            </div>
          </div>

          <div class="resource-form__group">
            <label class="resource-form__checkbox">
              <input type="checkbox" name="privacy_agreement" required>
              <span><a href="https://receptionist.co.jp/privacy/" target="_blank" rel="noopener">（株）RECEPTIONISTの個人情報の取り扱い</a>に同意します。<span class="resource-form__required">*</span></span>
            </label>
          </div>

          <div class="resource-form__submit">
            <button type="submit" class="resource-form__button">資料をダウンロード</button>
          </div>

        </form>
      </div>
    </aside>

    <?php
      endwhile;
    endif;
    ?>

  </div>

  <nav class="single-nav">
    <div class="single-nav-inner">
      <div class="single-nav-prev">
        <?php previous_post_link('%link', '&laquo; 前の資料'); ?>
      </div>
      <div class="single-nav-back">
        <a href="<?php echo get_post_type_archive_link('resource'); ?>">資料一覧へ戻る</a>
      </div>
      <div class="single-nav-next">
        <?php next_post_link('%link', '次の資料 &raquo;'); ?>
      </div>
    </div>
  </nav>

</main>

<?php get_footer(); ?>
