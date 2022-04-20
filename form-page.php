<?php
/** 
 *  Template Name: Form Page
 */ 
?>

<?php get_header(); ?>

<div class="uk-container tm-container-margin">

  <h1><?= the_title(); ?></h1>

  <?= the_content() ?>

  <div class="uk-padding uk-background-muted uk-margin">
    <form id="form-test" action="/ajax/form-test/" method="POST" class="uk-form-stacked">

      <input type="hidden" name="test_form" value="1" />
      <input type="hidden" name="nonce" value="<?= wp_create_nonce('ajax-nonce') ?>" />

      <div class="uk-margin">
        <label class="uk-form-label" for="#input-name">
          Name <span class="uk-text-danger">*</span>
        </label>
        <input id="input-name" class="uk-input" type="text" name="name" required />
      </div>

      <div class="uk-margin">
        <label class="uk-form-label" for="#input-email">
          Email <span class="uk-text-danger">*</span>
        </label>
        <input id="input-email" class="uk-input" type="email" name="email" required />
      </div>

      <div class="uk-margin">
        <label class="uk-form-label" for="#input-message">
          Message <span class="uk-text-danger">*</span>
        </label>
        <textarea id="input-message" class="uk-textarea" rows="5" name="message" required></textarea>
      </div>

      <div class="uk-margin">
        <button type="submit" name="submit" class="uk-button uk-button-primary" onclick="project.formSubmit('form-test')">
          Submit
        </button>
      </div>

    </form>
  </div>

<?php get_footer(); ?>
