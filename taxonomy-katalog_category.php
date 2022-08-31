<?php get_header(); ?>

<section class="uk-section" uk-height-viewport="expand: true">
  <div class="uk-container">

    <h1 class="uk-heading-medium">
      Katalog - <?= single_cat_title() ?>
    </h1>

    <div class="uk-margin">
      <?php get_template_part('layout/katalog/katalog-nav'); ?>
    </div>

    <?php get_template_part('layout/katalog/katalog-grid') ?>

    <?php 
      get_template_part('layout/common/pagination'); 
    ?>


  </div>
</section>

<?php get_footer(); ?>