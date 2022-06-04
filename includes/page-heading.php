<?php

$enable = get_field("ph_enable");

if($enable) {

  $headline = get_field("ph_title");
  $bg = get_field('ph_bg');
  $is_bg = !empty($bg) ? true : false;

  $attr = "";
  $class = "uk-section uk-position-relative";


  if($is_bg) {
    $bg = $hero_image['url'];
    $attr .= !empty($bg) ? "data-src='{$bg}' uk-img" : "";
    $class .= " uk-light uk-background-cover uk-position-relative";
  } else {
    $class .= " uk-background-muted";
  }

}

?>

<?php if($enable) :?>
<div id="page-heading" class="<?= $class ?>" <?= $attr ?>>

  <?php if($is_bg) : ?>
  <div class="uk-overlay uk-overlay-default uk-position-cover"></div>
  <?php endif; ?>

  <div class="uk-container uk-position-relative">

    <h1 class="uk-heading-small"><?= $headline ?></h1>

    <?php
      get_template_part('includes/breadcrumb'); 
    ?>

  </div>

</div>
<?php endif; ?>