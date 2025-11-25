<?php
get_header();
?>

<main class="archive archive-case">

  <h1 class="archive-title">導入事例一覧</h1>

  <div class="archive-loop">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part('template-parts/loop', 'case');
        endwhile;

        the_posts_pagination();
    else :
        echo '<p>まだ導入事例がありません。</p>';
    endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>
