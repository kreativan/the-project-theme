<form id="contact-form" action="/ajax/contact/" method="POST">

  <input type="hidden" name="contact_submit" value="1" />
  <input type="hidden" name="nonce" value="<?= wp_create_nonce('ajax-nonce') ?>" />

  <div class="uk-margin-bottom uk-grid uk-child-width-expand@m" uk-grid>
    <div>
      <label class="uk-form-label" for="input-name">
        <?= __('Name') ?>
        <span class="uk-text-danger">*</span>
      </label>
      <input id="input-name" class="uk-input" type="text" name="name" />
    </div>
    <div>
      <label class="uk-form-label" for="input-email">
        <?= __('Email') ?>
        <span class="uk-text-danger">*</span>
      </label>
      <input id="input-email" class="uk-input" type="email" name="email" />
    </div>
  </div>

  <div class="uk-margin">
    <label class="uk-form-label" for="input-subject">
      <?= __('Subject') ?>
      <span class="uk-text-danger">*</span>
    </label>
    <input id="input-subject" class="uk-input" type="text" name="subject" />
  </div>

  <div class="uk-margin">
    <label class="uk-form-label" for="input-message">
      <?= __('Message') ?>
      <span class="uk-text-danger">*</span>
    </label>
    <textarea id="input-message" class="uk-textarea" name="message" rows="5"></textarea>
  </div>

  <div class="uk-margin">
    <button type="button" class="uk-button uk-button-primary" onclick="project.formSubmit('contact-form')">
      <?= __("Submit") ?>
    </button>
  </div>

</form>
