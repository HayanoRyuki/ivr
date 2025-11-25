<?php
get_header();
?>

<main class="single single-help">

  <?php
  if ( have_posts() ) :
      while ( have_posts() ) :
          the_post();
  ?>

  <article <?php post_class(); ?>>
      <h1 class="single-title"><?php the_title(); ?></h1>
      <div class="single-content help-content">
          <?php the_content(); ?>
      </div>
  </article>

  <?php
      endwhile;
  endif;
  ?>

</main>

<?php get_footer(); ?>
