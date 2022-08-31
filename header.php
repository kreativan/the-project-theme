<?php
// Site language
$lang = get_option('WPLANG');
$lang = explode("_", $lang);
$lang = $lang[0];
$lang = !empty($lang) ? $lang : 'en';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
    get_template_part("/inc/_meta");
    get_template_part("/inc/_head");
    wp_head();
  ?>

</head>

<body>

<?php
// Mobile Header
get_template_part("layout/base/mobile-header");
?>

<?php
// Mobile Header
get_template_part("layout/base/header");
?>

<?php
// Woocommerce BAsesic nav
get_template_part("layout/woo/basic-nav");
?>

<main id="main"><!-- main start -->