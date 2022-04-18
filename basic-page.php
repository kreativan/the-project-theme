<?php
/** 
 *  Template Name: Basic Page
 */ 
?>

<?php get_header(); ?>

<section id="page-heading" class="uk-section uk-section-muted">
  <div class="uk-container">
    <h1 class="uk-heading-medium">
      <?= the_title(); ?>
    </h1>
  </div>
</section>

<div class="uk-container tm-container-margin">

  <?php get_template_part('includes/content'); ?>

</div>

<?php get_footer(); ?>
