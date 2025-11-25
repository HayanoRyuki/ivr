<?php
get_header();
?>

<main class="archive archive-resource">

  <h1 class="archive-title">資料一覧</h1>

  <div class="archive-loop">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part('template-parts/loop', 'resource');
        endwhile;

        the_posts_pagination();
    else :
        echo '<p>まだ資料がありません。</p>';
    endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>
