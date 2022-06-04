<?php
/** 
 *  Template Name: Page Builder
 */ 
?>

<?php get_header(); ?>

<?php get_template_part('includes/page-heading'); ?>

<div class="uk-container tm-container-margin">
<?php
  get_template_part("includes/page-builder");
?>
</div>

<?php get_footer(); ?>
