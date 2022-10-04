<?php
/**
 *  Template Name: Home Page
 */
?>

<?php get_header(); ?>

<?php get_template_part("layout/home/hero"); ?>

<div class="uk-container tm-container-margin">

  <div class="uk-padding uk-background-muted">
    <?php get_template_part('searchform'); ?>
  </div>

  <?php 
    get_template_part('layout/page-builder/default');
  ?>

</div>



<?php get_footer(); ?>
