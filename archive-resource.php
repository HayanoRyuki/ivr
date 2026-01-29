<?php
/**
 * Archive Template: Resource（資料一覧）
 */
get_header();
?>

<main class="archive archive-resource">
  <div class="archive-container">

    <header class="archive-header">
      <h1 class="archive-title">資料一覧</h1>
      <p class="archive-description">代表電話コネクトに関する資料をご覧いただけます。</p>
    </header>

    <?php if ( have_posts() ) : ?>

      <div class="archive-list">
        <?php
        while ( have_posts() ) :
          the_post();
        ?>
          <article class="archive-card">
            <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="archive-card-thumbnail">
                  <?php the_post_thumbnail('medium_large'); ?>
                </div>
              <?php else : ?>
                <div class="archive-card-thumbnail archive-card-thumbnail--noimage">
                  <span>No Image</span>
                </div>
              <?php endif; ?>

              <div class="archive-card-body">
                <div class="archive-card-meta">
                  <time class="archive-card-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    <?php echo get_the_date('Y.m.d'); ?>
                  </time>
                </div>
                <h2 class="archive-card-title"><?php the_title(); ?></h2>
                <?php if ( has_excerpt() ) : ?>
                  <p class="archive-card-excerpt"><?php echo get_the_excerpt(); ?></p>
                <?php endif; ?>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>

      <nav class="archive-pagination">
        <?php
        the_posts_pagination([
          'mid_size'  => 2,
          'prev_text' => '&laquo; 前へ',
          'next_text' => '次へ &raquo;',
        ]);
        ?>
      </nav>

    <?php else : ?>

      <div class="archive-no-posts">
        <p class="archive-no-posts-text">まだ資料がありません。</p>
        <a href="<?php echo home_url('/'); ?>" class="archive-no-posts-link">
          トップページへ戻る
        </a>
      </div>

    <?php endif; ?>

  </div>
</main>

<?php get_footer('simple'); ?>
