<?php
/**
 *  Template Name: Home Page
 */
?>

<?php get_header(); ?>

<?php get_template_part("includes/hero"); ?>

<div class="uk-container tm-container-margin">

  <div class="uk-padding uk-background-muted">
    <?php get_template_part('searchform'); ?>
  </div>

  <?php 
    get_template_part('includes/page-builder');
  ?>

</div>



<?php get_footer(); ?>
