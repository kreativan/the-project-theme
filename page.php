<?php

/**
 * page.php
 * Default page template
 */

get_header();

?>

<div id="page-heading" class="uk-section uk-section-muted">
  <div class="uk-container uk-text-center">
    <h1>
      <?= the_title() ?>
    </h1>
    <?php
    render('layout/common/breadcrumb');
    ?>
  </div>
</div>

<main class="uk-section">
  <div class="uk-container" uk-height-viewport="expand: true">
    <?php the_content() ?>
  </div>
</main>

<?php get_footer(); ?>