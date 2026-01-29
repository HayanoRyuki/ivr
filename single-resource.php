<?php
/**
 * Single Template: Resource（資料詳細）
 */
get_header('resource');
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
          <h1 class="single-title"><?php the_title(); ?></h1>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
          <div class="single-thumbnail">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <?php
        // メタボックスデータを取得
        $resource_meta = ivr_get_resource_meta();
        ?>

        <?php if ($resource_meta['page_count'] || $resource_meta['last_updated']) : ?>
        <div class="resource-info">
          <div class="resource-info__row resource-info__row--summary">
            <?php if ($resource_meta['page_count']) : ?>
              <div class="resource-info__item">
                <span class="resource-info__label">ページ数</span>
                <span class="resource-info__value"><?php echo esc_html($resource_meta['page_count']); ?></span>
              </div>
            <?php endif; ?>
            <?php if ($resource_meta['last_updated']) : ?>
              <div class="resource-info__item">
                <span class="resource-info__label">最終更新日</span>
                <span class="resource-info__value"><?php echo esc_html(ivr_format_resource_date($resource_meta['last_updated'])); ?></span>
              </div>
            <?php endif; ?>
          </div>

          <?php if ($resource_meta['target']) : ?>
          <div class="resource-info__row">
            <span class="resource-info__label resource-info__label--block">対象者</span>
            <p class="resource-info__text"><?php echo nl2br(esc_html($resource_meta['target'])); ?></p>
          </div>
          <?php endif; ?>

          <?php if ($resource_meta['main_content']) : ?>
          <div class="resource-info__row">
            <span class="resource-info__label resource-info__label--block">資料の主な内容</span>
            <p class="resource-info__text"><?php echo nl2br(esc_html($resource_meta['main_content'])); ?></p>
          </div>
          <?php endif; ?>

          <?php if ($resource_meta['points']) : ?>
          <div class="resource-info__row">
            <span class="resource-info__label resource-info__label--block">おすすめポイント</span>
            <p class="resource-info__text"><?php echo nl2br(esc_html($resource_meta['points'])); ?></p>
          </div>
          <?php endif; ?>
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

        <?php get_template_part('form-parts/request-form'); ?>
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

<?php get_footer('resource'); ?>
