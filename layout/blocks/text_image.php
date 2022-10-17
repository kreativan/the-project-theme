<?php
$media_position = get_sub_field('media_position');
$media_size = get_sub_field('media_size');
$image = get_sub_field('image');

$text = get_sub_field('text');
$text = str_replace('<p><a', '<p><a class="uk-button uk-button-primary"', $text);

$class = ($media_position == 'right') ? " uk-flex-row-reverse" : "";

?>

<div class="uk-grid uk-grid-large uk-flex-middle<?= $class ?>" uk-grid>

  <div class="uk-width-<?= $media_size ?>@m">
    <div class="uk-panel">
      <?php
        tpf_picture($image, [
          'size' => 'x640'
        ])
      ?>
    </div>
  </div>

  <div class="uk-width-expand@m">
    <div class="uk-panel">
      <?= $text ?>
    </div>
  </div>

</div>