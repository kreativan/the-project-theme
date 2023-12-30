<?php

/**
 *  Template Name: Front Page
 */

get_header();
?>

<main uk-height-viewport="expand: true;">
  <?php
  render('layout/home/demo.php');
  ?>
</main>

<hr class="uk-margin-remove" />

<?php get_footer(); ?>