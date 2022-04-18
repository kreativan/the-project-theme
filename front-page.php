<?php get_header(); ?>

<section class="uk-section">
  <div class="uk-container">

    <h1><?php the_title(); ?></h1>

    <?php get_template_part('searchform'); ?>

    <?php get_template_part('includes/content'); ?>

  </div>
</section>

<?php get_footer(); ?>
