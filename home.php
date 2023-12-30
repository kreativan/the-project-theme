<?php

/**
 *  home.php
 *  Default Blog Page
 */

get_header();

// get queried object
$queried_object = get_queried_object();

?>

<div id="page-heading" class="uk-section uk-section-muted">
  <div class="uk-container uk-text-center">
    <h1><?= the_title() ?></h1>
  </div>
</div>

<main class="uk-section">
  <div class="uk-container" uk-height-viewport="expand: true;">
    <?php
    render('layout/wp/blog-grid');
    ?>
  </div>
</main>

<?php get_footer(); ?>