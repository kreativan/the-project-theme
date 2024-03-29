<?php

/**
 * Archive
 * Default category page, list of posts
 */

get_header();

// get queried object
$queried_object = get_queried_object();

?>

<div id="page-heading" class="uk-section uk-section-muted">
  <div class="uk-container uk-text-center">
    <h1>
      <?= $queried_object->name ?>
    </h1>
    <?php
    render('layout/common/breadcrumb');
    ?>
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