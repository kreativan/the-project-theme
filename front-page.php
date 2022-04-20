<?php
/**
 *  Template Name: Home Page
 */
?>

<?php get_header(); ?>

<?php get_template_part("includes/hero"); ?>

<div class="uk-container uk-margin-large-top">

  <div class="uk-padding uk-background-muted">
    <?php get_template_part('searchform'); ?>
  </div>

</div>

<?php 
page_builder([
  "container" => "true",
  "class" => "uk-margin-large",
  //"editor" => 'uk-background-primary uk-light uk-section',
]);
?>



<?php get_footer(); ?>
