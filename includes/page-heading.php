<?php

$enable = (!empty($args['enable']) && $args['enable'] === 'true') ? true : get_field("ph_enable");
$bg = !empty($args['bg']) ? $args['bg'] : get_field('ph_bg');
$headline = !empty($args['headline']) ? $args['headline'] : get_field('ph_title');
$breadcrumb = (!empty($args['breadcrumb']) && $args['breadcrumb'] === 'false') ? false : true;

if($enable) {

  $is_bg = !empty($bg) ? true : false;

  $attr = "";
  $class = "uk-section uk-position-relative";


  if($is_bg) {

    $bg = is_object($bg) || is_array($bg) ? $bg['sizes']['hero'] : $bg;
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
    if($breadcrumb) get_template_part('includes/breadcrumb'); 
    ?>

  </div>

</div>
<?php endif; ?>