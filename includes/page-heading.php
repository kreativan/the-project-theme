<?php
$bg = get_field('background');

$attr = "";
$attr .= !empty($bg) ? "data-src='{$bg["url"]}' uk-img" : "";

$headline = get_field("headline");
?>

<div id="page-heading" class="uk-section uk-section-large uk-position-relative uk-background-cover uk-light" <?= $attr ?>>

  <div class="uk-overlay uk-overlay-default uk-position-cover"></div>

  <div class="uk-container uk-position-relative">
    <h1 class="uk-heading-large uk-text-bold"><?= $headline ?></h1>
  </div>

</div>