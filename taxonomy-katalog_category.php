<?php get_header();
$categories = get_terms('katalog_category'); 
?>

<section class="uk-section" uk-height-viewport="expand: true">
  <div class="uk-container">

    <h1 class="uk-heading-medium">
      Katalog - <?= single_cat_title() ?>
    </h1>

    <div class="uk-margin">
      <?php get_template_part('katalog/katalog-nav'); ?>
    </div>

    <div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s uk-margin-medium" uk-grid="masonry: true">
      <?php get_template_part('katalog/katalog-grid') ?>
    </div>

    <?php get_template_part('includes/pagination'); ?>

  </div>
</section>

<?php get_footer(); ?>