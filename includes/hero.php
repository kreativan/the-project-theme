<?php
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_text = get_field('hero_text');
$hero_image = get_field('hero_image');

$attr = "";
$class = "";

if(!empty($hero_image)) {

  $bg = $hero_image['url'];
  $attr .= !empty($bg) ? "data-src='{$bg}' uk-img" : "";
  $class .= "uk-section uk-section-large uk-light uk-background-cover uk-position-relative";

} elseif($images_count > 1 ) {

}

?>

<div id="hero" class="<?= $class ?>" <?= $attr ?>>

  <div class="uk-overlay uk-overlay-default uk-position-cover"></div>

  <div class="uk-container uk-position-relative">

    <?php if(!empty($hero_title)) :?>
    <h1 class="uk-heading-large uk-text-bold uk-margin-remove">
      <?= $hero_title ?>
    </h1>
    <?php endif; ?>

    <?php if(!empty($hero_subtitle)) :?>
    <h2 class="uk-margin-remove uk-text-light"><?= $hero_subtitle ?></h2>
    <?php endif; ?>

    <?php if(!empty($hero_text)) :?>
    <p class="uk-width-2-3@l"><?= $hero_text ?></p>
    <?php endif;?>

  </div>

</div>
