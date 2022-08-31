<?php
$id = !empty($args['id']) ? $args['id'] : false;
$button_style = !empty($args['button_style']) ? $args['button_style'] : 'primary';
$labels = get_field('labels', $id);

$form = get_post($id);
$form_fields = get_field('form_fields', $id);

$action = get_field('action_url', $id);
$action = !empty($action) ? $action : "/ajax/acf-form/";

$captcha = get_field('captcha', $id);

?>

<?php if(!empty($form_fields)) :?>
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

        <?php
          $is_label = ($labels == "1" || $labels == "3") ? true : false;
          $placeholder = ($labels == "2" || $labels == "3") ? $field['placeholder'] : "";
          $name = $field['name'];
          if(empty($name)) {
            $name = str_replace(' ', '_', $field['label']);
            $name = strtolower($name);
          }
        ?>
        
        <?php if($is_label) : ?>
        <label class="uk-form-label"
          for="input-<?= $name ?>"
          <?php if(!empty($field['description']) && $field['show_description']) : ?>
          title="<?= $field['description'] ?>"
          uk-tooltip='pos: top-left'
          <?php endif; ?>
        >

            <?php if(!empty($field['description']) && $field['show_description']) : ?>
              <span uk-icon="info"></span>
            <?php endif; ?>

            <?= $field['label'] ?>
     
            <?php if($field['required']) : ?>
              <span class="uk-text-danger">*</span>
            <?php endif; ?>
            
        </label>
        <?php endif; ?>

        <?php if($field['acf_fc_layout'] == 'text') : ?>
          <?php
            get_template_part('/layout/input/input', null, [
              'type' => 'text',
              'name' => $name,
              'placeholder' => $placeholder,
              'required' => $field['required'] ? 1 : 0,
            ]);
          ?>
        <?php elseif($field['acf_fc_layout'] == 'email') : ?>
          <?php
            get_template_part('/layout/input/input', null, [
              'type' => 'email',
              'name' => $name,
              'placeholder' => $placeholder,
              'required' => $field['required'] ? 1 : 0,
            ]);
          ?>
        <?php elseif($field['acf_fc_layout'] == 'textarea') : ?>
          <?php
            get_template_part('/layout/input/textarea', null, [
              'type' => 'email',
              'name' => $name,
              'placeholder' => $placeholder,
              'rows' => 5,
              'required' => $field['required'] ? 1 : 0,
            ]);
          ?>
        <?php elseif($field['acf_fc_layout'] == 'file') : ?>
          <?php
            get_template_part('/layout/input/file', null, [
              'name' => $name,
              'placeholder' => $field['placeholder'],
              'required' => $field['required'] ? 1 : 0,
            ]);
          ?>
        <?php elseif($field['acf_fc_layout'] == 'select') : ?>
          <?php
            $arr = [];
            $options = explode(PHP_EOL, $field['options']);
            foreach($options as $opt) {
              $i = explode('=', $opt);
              $arr[$i[0]] = $i[1];
            }
            get_template_part('/layout/input/select', null, [
              'name' => $name,
              'placeholder' => $field['placeholder'],
              'required' => $field['required'] ? 1 : 0,
              'field_options' => $arr,
            ]);
          ?>
        <?php endif;?>

      </div>
    <?php endforeach; ?>  
  </div>

  <?php if($captcha) : ?>
  <div class="uk-margin-small-top">
    <?php get_template_part('layout/input/captcha'); ?>
  </div>
  <?php endif;?>

  <div class="uk-margin-top">
    <button type="button" class="uk-button uk-button-<?= $button_style ?>" onclick="the_project.formSubmit('form-<?= $form->post_name ?>')">
      <?= get_field('submit_button_text', $id) ?>
    </button>
    <span class="ajax-indicator uk-hidden uk-margin-left" uk-spinner></span>
  </div>

</form>
<?php endif; ?>