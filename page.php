<?php get_header(); ?>

<div class="uk-container tm-container-margin">
  <div uk-height-viewport="expand: true">

    <h1><?php the_title(); ?></h1>

    <?php
      get_template_part("layout/wp/content");
    ?>

  </div>

</div>

<?php get_footer(); ?>
