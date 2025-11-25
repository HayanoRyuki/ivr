<?php
get_header();
?>

<main class="archive archive-help">

  <h1 class="archive-title">ヘルプ記事一覧</h1>

  <div class="archive-loop">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part('template-parts/loop', 'help');
        endwhile;

        the_posts_pagination();
    else :
        echo '<p>まだヘルプ記事がありません。</p>';
    endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>
