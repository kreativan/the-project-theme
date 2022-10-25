<?php

// Site language
$lang = get_option('WPLANG');
$lang = explode("_", $lang);
$lang = $lang[0];
$lang = !empty($lang) ? $lang : 'en';

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
    // Meta tags
    get_template_part("inc/_meta");
    
    /**
     * Assets
     */
    get_template_part("inc/_head", null, [
      "less_files" => [
        get_template_directory() . "/less/vars.less",
        get_template_directory() . "/less/style.less",
      ],
      "less_vars" => [
        "global-font-family" => "Jost, sans-serif",
        "base-heading-font-family" => "Jost, sans-serif",
      ],
      'css_files' => [
        get_template_directory_uri() . "/assets/css/fonts.css",
      ],
      "js_files" => [
        tpf_url() . "lib/uikit/dist/js/components/notification.min.js",
        tpf_url() . "lib/uikit/dist/js/components/slideshow.min.js",
      ],
      "js_vars" => [], 
      // 'google_fonts_link' => "https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&display=swap",
    ]);

    // wp
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