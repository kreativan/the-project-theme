<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin">

  <?php get_template_part('includes/breadcrumb'); ?>

  <h1><?php the_title(); ?></h1>

  <?php the_content() ?>

</div>

<?php get_footer(); ?>
