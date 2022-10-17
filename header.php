<?php

// Site language
$lang = get_option('WPLANG');
$lang = explode("_", $lang);
$lang = $lang[0];
$lang = !empty($lang) ? $lang : 'en';

// Google Fonts link
$google_fonts_link = "https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&display=swap";

// Less files to be compiled
$less_files = [
  get_template_directory() . "/less/vars.less",
  get_template_directory() . "/less/style.less",
];

// Set/override less variables
$less_vars = [
  "global-font-family" => "Jost, sans-serif",
  "base-heading-font-family" => "Jost, sans-serif",
];

// Js fiels that will be laoded in head section
$js_files = [
  the_project_url() . "lib/uikit/dist/js/components/notification.min.js",
  the_project_url() . "lib/uikit/dist/js/components/slideshow.min.js",
  the_project_url() . "lib/uikit/dist/js/components/tooltip.min.js",
];

// Set js vars to be included in head cms constant
$js_vars = [];

// Body class/id
$tmpl = str_replace(".php", "", basename(get_page_template()));
$body_cls = get_field("ph_enable") ? "is-page-heading" : "";
$body_cls = get_field("hero_title") ? "is-hero" : "";

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
    get_template_part("inc/_meta");

    get_template_part("inc/_head", null, [
      "less_files" => $less_files,
      "less_vars" => $less_vars,
      "js_files" => $js_files,
      "js_vars" => $js_vars,
      "google_fonts_link" => $google_fonts_link,
    ]);

    wp_head();
  ?>

</head>

<body id="tmpl-<?= $tmpl ?>" class="<?= $body_cls ?>">

<?php
// Mobile Header
get_template_part("layout/base/mobile-header");
?>

<?php
// Mobile Header
get_template_part("layout/base/header");
?>

<main id="main"><!-- main start -->