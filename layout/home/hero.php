<?php 
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_text = get_field('hero_text');
$hero_image = get_field('hero_image');

$is_bg = !empty($hero_image) ? true : false;

$attr = "";
$class = "uk-section uk-section-large";

if($is_bg) {
  $bg = $hero_image['url'];
  $attr .= !empty($bg) ? "data-src='{$bg}' uk-img" : "";
  $class .= " uk-light uk-background-cover uk-position-relative";
} else {
  $class .= " uk-background-muted";
}

?>

<div id="hero" class="<?= $class ?>" <?= $attr ?>>

  <?php if($is_bg) : ?>
  <div class="uk-overlay uk-overlay-default uk-position-cover"></div>
  <?php endif; ?>

  <div class="uk-container uk-position-relative uk-text-center">

    <?php if(!empty($hero_title)) :?>
    <h1 class="uk-heading-medium uk-text-bold uk-margin-remove">
      <?= $hero_title ?>
    </h1>
    <?php endif; ?>

    <?php if(!empty($hero_subtitle)) :?>
    <h2 class="uk-margin uk-text-light"><?= $hero_subtitle ?></h2>
    <?php endif; ?>

    <?php if(!empty($hero_text)) :?>
    <p class="uk-width-2-3@l uk-margin-auto"><?= $hero_text ?></p>
    <?php endif;?>

  </div>

</div>
