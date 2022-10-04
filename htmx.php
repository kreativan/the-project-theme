<?php
/** 
 *  Template Name: HTMX
 */ 
?>

<?php get_header(); ?>

<div uk-height-viewport="expand: true">
  <div class="uk-container tm-container-margin">

    <h1><?= the_title(); ?></h1>

    <div class="uk-margin uk-padding uk-background-muted">

      <?= the_content() ?>
    
      <button type="button" class="uk-button uk-button-primary"
        hx-post="./?htmx=layout/htmx-examples/test"
        hx-target="#target"
        hx-swap="outerHTML"
        hx-indicator="#htmx-indicator"
        hx-vals='<?= json_encode(["headline" => "Headline"]) ?>'
      >
        Load Content
      </button>

      <button type="button" class="uk-button uk-button-default uk-margin-left tm-bg-white"
        hx-get="./?htmx=layout/htmx-examples/modal"
        hx-target="body"
        hx-swap="beforeend"
        hx-indicator="#htmx-indicator"
        hx-vals='<?= json_encode(['title' => 'Modal']) ?>'
        onclick="project.htmxModal()"
      >
        Modal
      </button>

      <button type="button" class="uk-button uk-button-default uk-margin-left tm-bg-white"
        hx-get="./?htmx=layout/htmx-examples/offcanvas"
        hx-target="body"
        hx-swap="beforeend"
        hx-indicator="#htmx-indicator"
        hx-vals='<?= json_encode(['title' => 'Title']) ?>'
        onclick="project.htmxOffcanvas()"
      >
        Offcanvas
      </button>

      <?php
        $ajax_data = [
          'indicator' => "#htmx-indicator",
          'title' => get_the_title(),
        ];
      ?>
      <button class="uk-button uk-button-default uk-margin-left tm-bg-white" 
        onclick='project.ajaxReq("/ajax/demo/", <?=  json_encode($ajax_data) ?>)'
      >
        Ajax REQ
      </button>

      <span id="ajax-indicator" class="uk-hidden uk-margin-left" uk-spinner></span>
      <span id="htmx-indicator" class="htmx-indicator uk-margin-left" uk-spinner></span>

    </div>

    <div id="target" class="uk-animation-slide-bottom-small"></div>

  </div>
</div>


<?php get_footer(); ?>
