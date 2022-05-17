<?php
$id = !empty($args['id']) ? $args['id'] : false;
$button_style = !empty($args['button_style']) ? $args['button_style'] : 'primary';

$form = get_post($id);
$form_fields = get_field('form_fields', $id);

$action = get_field('action_url', $id);
$action = !empty($action) ? $action : "/ajax/acf-form/";

?>

<form 
  id="form-<?= $form->post_name ?>"
  action="<?= $action ?>" 
  method="POST" 
  enctype='multipart/form-data' 
  class="uk-form-stacked">

  <input type="hidden" name="nonce" value="<?= wp_create_nonce('ajax-nonce') ?>" />
  <input type="hidden" name="form_id" value="<?= $id ?>" />

  <div class="uk-grid" uk-grid>
    <?php foreach($form_fields as $field) : ?>
      <div class="uk-width-<?= $field['width'] ?>@m uk-margin-bottom uk-margin-remove-top">
           
        <label class="uk-form-label"
          for="input-<?= $field['name'] ?>"
          <?php if(!empty($field['description'])) : ?>
          title="<?= $field['description'] ?>"
          uk-tooltip='pos: top-left'
          <?php endif; ?>
        >

            <?php if(!empty($field['description'])) : ?>
              <span uk-icon="info"></span>
            <?php endif; ?>

            <?= $field['label'] ?>
     
            <?php if($field['required']) : ?>
              <span class="uk-text-danger">*</span>
            <?php endif; ?>
            
        </label>

        <?php if($field['acf_fc_layout'] == 'text') : ?>
          <input 
            class="uk-input" 
            type="text" 
            name="<?= $field['name'] ?>" 
            id="input-<?= $field['name'] ?>" 
            <?= $field['required'] ? 'required' : ''; ?>
          />
        <?php elseif($field['acf_fc_layout'] == 'email') : ?>
          <input 
            class="uk-input" 
            type="email" 
            name="<?= $field['name'] ?>" 
            id="input-<?= $field['name'] ?>" 
            <?= $field['required'] ? 'required' : ''; ?>
          />
        <?php elseif($field['acf_fc_layout'] == 'textarea') : ?>
          <textarea class="uk-textarea" rows="5" name="<?= $field['name'] ?>"></textarea>
        <?php elseif($field['acf_fc_layout'] == 'file') : ?>
          <div class="uk-width-1-1" uk-form-custom="target: true">
            <input type="file" name="<?= $field['name'] ?>" multiple="false">
            <input class="uk-input" type="text" placeholder="<?= __('Select File') ?>" disabled>
          </div>
        <?php elseif($field['acf_fc_layout'] == 'select') : ?>
        <select class="uk-select" name="<?= $field['name'] ?>">
          <?php
            $options = explode(PHP_EOL, $field['options']);
          ?>
          <option value=''>- <?= __('Select') ?> -</option>
          <?php foreach($options as $option) : ?>
            <option value='<?= $option ?>'><?= $option ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif;?>

      </div>
    <?php endforeach; ?>  
  </div>

  <div class="uk-margin-top">
    <button type="button" class="uk-button uk-button-<?= $button_style ?>" onclick="project.formSubmit('form-<?= $form->post_name ?>')">
      <?= get_field('submit_button_text', $id) ?>
    </button>
    <span class="ajax-indicator uk-hidden uk-margin-left" uk-spinner></span>
  </div>

</form>