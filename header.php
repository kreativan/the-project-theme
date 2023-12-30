<?php

// Dev mode
$dev_mode = the_project('dev_mode') == '1' ? true : false;
$suffix = $dev_mode ? '' : "?v=" . time();
$scripts_in_head = get_field('scripts_in_head', 'options');

/**
 * Less Files
 */
$less_files = TPF_Less_Files('minimal');
$less_files[] = get_template_directory() . "/assets/less/_vars.less";

/**
 * Less Variables
 */
$less_vars = [
  'global-font-family' => 'Inter',
];

/**
 * CSS Files
 */
$css_files = [
  get_template_directory_uri() . "/assets/fonts/fonts.css",
];

/**
 * JS Files
 */
$js_files = TPF_JS_Files();

/**
 * JS Vars
 */
$js_vars = TPF_JS_Vars();

?>

<!DOCTYPE html>
<html lang="<?= site_lang() ?>">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  /** TPF head */
  render("html/head", [
    "less_files" => $less_files,
    "less_vars" => $less_vars,
    'css_files' => $css_files,
    "js_files" => $js_files,
    "js_vars" => $js_vars,
  ]);

  /** WP head */
  wp_head();
  ?>

  <?php
  /**
   * Scripts in head
   */
  if (!empty($scripts_in_head) && $scripts_in_head != "") {
    echo $scripts_in_head;
  }
  ?>

</head>

<body>

  <?php
  render("layout/base/mobile-header");
  ?>

  <?php
  render("layout/base/header");
  ?>