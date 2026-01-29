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

<?php get_footer('simple'); ?>
