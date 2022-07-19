<?php get_header(); ?>

<div class="uk-container tm-container-margin">
  <div uk-height-viewport="expand: true">

    <h1><?php the_title(); ?></h1>

    <?php the_content(); ?>

    <?php
      if(is_shop()) get_template_part("includes/content");
    ?>

  </div>

</div>

<?php get_footer(); ?>
