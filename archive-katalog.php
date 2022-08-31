<?php get_header();?>

<?php
$page = get_field('katalog_archive_page', 'options');

$headline = get_field('headline', $page);
$content = get_field('content', $page);

?>

<div class="uk-container tm-container-margin">

  <h1 class="uk-heading-small"><?= $headline ?></h1>

  <?= $content ?>

  <div class="uk-margin">
    <?php get_template_part('layout/katalog/katalog-nav'); ?>
  </div>

  <div class="uk-background-muted uk-padding uk-margin-medium">
    <?php get_template_part('layout/katalog/katalog-search-form'); ?>
  </div>

  <?php
    if($_GET) {
      get_template_part('layout/katalog/katalog-search');
    } else {
      get_template_part('layout/katalog/katalog-grid');
      get_template_part('layout/common/pagination');
    }
  ?>

</div>

<?php get_footer(); ?>
