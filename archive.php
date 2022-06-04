<?php get_header(); ?>

<div class="uk-container tm-container-margin">

  <h1 class="uk-heading-medium uk-text-bold">
    <?= single_cat_title(); ?>
  </h1>

  <?php
    get_template_part('includes/breadcrumb');
  ?>

  <div class="uk-grid" uk-grid>

    <div class="uk-width-expand@m">
      <div id="content">
        <?php 
          get_template_part('includes/archive'); 
          get_template_part('includes/pagination');
        ?>
      </div>
    </div>

    <?php if(is_active_sidebar('blog-sidebar')) : ?>
    <div class="uk-width-medium@m">
      <div id="sidebar">
        <?php dynamic_sidebar('blog-sidebar'); ?>
      </div>
    </div>
    <?php endif;?>

  </div>

</div>

<?php get_footer(); ?>
