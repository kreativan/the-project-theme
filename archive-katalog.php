<?php get_header();?>

<?php
$page = get_field('katalog_archive_page', 'options');

$headline = get_field('headline', $page);
$bg = get_field('background', $page);

?>

<div class="uk-container tm-container-margin">

  <h1 class="uk-heading-medium">
    <?= $headline ?>
  </h1>

  <div class="uk-margin">
    <?php get_template_part('katalog/katalog-nav'); ?>
  </div>

  <div class="uk-grid uk-child-width-1-4@m uk-child-width-1-2@s uk-margin-medium" uk-grid="masonry: true">
    <?php get_template_part('katalog/katalog-grid') ?>
  </div>

  <?php get_template_part('includes/pagination'); ?>

</div>

<?php get_footer(); ?>
