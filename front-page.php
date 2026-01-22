<?php get_header('lp'); ?>

<main class="lp-connect__main">

    <?php get_template_part('template-parts/front-page/section', 'fv'); ?>

    <?php get_template_part('template-parts/front-page/section', 'about'); ?>

    <?php get_template_part('template-parts/front-page/section', 'problem'); ?>

    <?php get_template_part('template-parts/front-page/section', 'function'); ?>

    <?php get_template_part('template-parts/front-page/section', 'recommend'); ?>

    <?php get_template_part('template-parts/front-page/section', 'faq'); ?>

    <?php get_template_part('template-parts/front-page/section', 'price'); ?>

  </main>
  <!--/ end main -->

  <?php get_template_part('template-parts/front-page/section', 'fixed-cta'); ?>

<!-- js -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lp-connect.js"></script>

<?php get_footer(); ?>
