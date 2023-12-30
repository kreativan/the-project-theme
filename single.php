<?php

/**
 * single.php
 *  Default Single Post Template
 */

get_header();

// Meta
$date = get_the_date('d M Y');
$categories = get_the_category();
$category = $categories[0];

$thumb = get_the_post_thumbnail(null, 'large');

?>

<main class="uk-section">
  <div class="uk-container uk-container-small" uk-height-viewport="expand: true;">
    <?php
    render('layout/wp/single');
    ?>
  </div>
</main>

<?php get_footer(); ?>