<?php
/**
 * Single Template: Resource（資料詳細）
 */
get_header();
?>

<main class="single single-resource">
  <div class="single-container">

    <?php
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
    ?>

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

      <!-- 資料ダウンロードCTA -->
      <div class="single-cta">
        <div class="single-cta-inner">
          <h3 class="single-cta-title">この資料をダウンロード</h3>
          <p class="single-cta-text">フォームにご入力いただくと、資料をダウンロードいただけます。</p>
          <a href="https://docs.google.com/forms/d/e/1FAIpQLSf7C_WQbr78WcWEmtFfG7kFM73ue88dxclcUAarY8EZGGSNGw/viewform" class="btn btn--primary" target="_blank" rel="noopener">
            資料をダウンロード
          </a>
        </div>
      </div>

    </article>

    <nav class="single-nav">
      <div class="single-nav-prev">
        <?php previous_post_link('%link', '&laquo; 前の資料'); ?>
      </div>
      <div class="single-nav-back">
        <a href="<?php echo get_post_type_archive_link('resource'); ?>">資料一覧へ戻る</a>
      </div>
      <div class="single-nav-next">
        <?php next_post_link('%link', '次の資料 &raquo;'); ?>
      </div>
    </nav>

    <?php
      endwhile;
    endif;
    ?>

  </div>
</main>

<?php get_footer(); ?>
