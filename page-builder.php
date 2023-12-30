<?php

/**
 *  Template Name: Page Builder
 */

get_header();

render('html/page-builder.php', [
  'space' => 'large', // default space
  'container_class' => "uk-container",
]);

get_footer();
