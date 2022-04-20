<?php
/** 
 *  Template Name: HTMX
 */ 

$htmx_req = [
  "headline" => "Headline",
];


?>


<?php get_header(); ?>

<div uk-height-viewport="expand: true">
  <div class="uk-container tm-container-margin">

    <h1><?= the_title(); ?></h1>

    <div class="uk-margin uk-padding tm-bg-white uk-box-shadow-medium">

      <?= the_content() ?>
    
      <button type="button" class="uk-button uk-button-primary"
        hx-post="/htmx/test/"
        hx-target="#target"
        hx-swap="innerHTML"
        hx-vals='<?= json_encode($htmx_req) ?>'
      >
        Load Content
      </button>

    </div>

    <div id="target"></div>

  </div>
</div>


<?php get_footer(); ?>
