<?php
/** 
 *  Template Name: Page Builder
 */ 
?>

<?php get_header(); ?>

<?php get_template_part('layout/common/page-heading'); ?>

<div class="uk-container tm-container-margin">
<?php
  get_template_part("layout/base/page-builder");
?>
</div>

<?php get_footer(); ?>
