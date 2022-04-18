<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin">

  <?php if(has_post_thumbnail()) : ?>
  <img src="<?= the_post_thumbnail_url('blog-large') ?>" loading="lazy" alt="<?php the_title(); ?>" />
  <?php endif;?>

  <h1><?php the_title(); ?></h1>

  <?php get_template_part('includes/blog-post'); ?>


</div>

<?php get_footer(); ?>
