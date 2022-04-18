<?php
$lessCompiler = new Less_Compiler;

$dev_mode = the_project('dev_mode') == '1' ? true : false;
$assets_suffix = the_project('assets_suffix');

// Less files
$less_files = [get_template_directory() . "/less/import.less"];
$less_vars = [
  "global-font-family" => "Jost, Sans Serif",
  "base-heading-font-family" => "Jost, Sans Serif",
];

// js_files
$js_files = [
  get_template_directory_uri() . "/assets/uikit/dist/js/uikit-core.min.js",
  get_template_directory_uri() . "/assets/uikit/dist/js/uikit-icons.min.js",
  get_template_directory_uri() . "/assets/uikit/dist/js/components/notification.min.js",
];

// js vars
$js_vars = [
  "debug" => $dev_mode ? true : false,
];

// actual link - used to detect active menu items
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- preload -->
  <?php if(!$dev_mode) :?>
  <link rel="preload" href="<?= get_template_directory_uri()."/assets/css/main.css"; ?>" as="style">
  <?php endif; ?>

  <!-- UIkit -->
  <link rel="stylesheet" type="text/css" href="<?= $lessCompiler->less($less_files, $less_vars, "main", $dev_mode); ?>">

  <!-- js -->
  <?php foreach($js_files as $file) : ?>
  <script defer type='text/javascript' src='<?= $file ?>'></script>
  <?php endforeach; ?>

  <?php wp_head(); ?>

  <script>
    const cms = <?= json_encode($js_vars) ?>;
    console.log(cms);
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,700;1,300;1,700&family=Lato&family=Prata&display=swap" rel="stylesheet"> 

</head>

<body>


<!-- mobile header -->
<div id="mobile-menu" uk-offcanvas="overlay: true">
  <div class="uk-offcanvas-bar uk-flex uk-flex-column"></div>
</div>

<div id="mobile-header" class="uk-hidden@l uk-flex uk-flex-center uk-flex-middle"
uk-sticky="show-on-up: true; animation: uk-animation-slide-top">

  <button 
    type="button" 
    class="mobile-menu-button uk-icon uk-position-center-left" 
    onclick="mobile_menu('<?= $actual_link ?>')"
    title=""
  >
    <i uk-icon="icon: menu; ratio: 1.5;"></i>
  </button>

  <a href="/">
    <?= get_option("blogname"); ?>
  </a>

</div>
  
<!-- header -->
<header id="header" class="uk-visible@l"
  uk-sticky="show-on-up: true; animation: uk-animation-slide-top"
>
  <div class="uk-container">
    <nav class="uk-navbar-container uk-navbar uk-navbar-transparent" uk-navbar>

      <div class="logo uk-flex uk-flex-middle">
        <a href="/" class="uk-h4 uk-text-bold uk-margin-remove uk-link-reset uk-text-emphasis">
          <?= get_option("blogname"); ?>
        </a>
      </div>

      <div class="uk-navbar-right">
        <?php
          if ( has_nav_menu('navbar') ) {
            wp_nav_menu([
              'theme_location' => 'navbar',
              'menu_class' => 'uk-navbar-nav',
              'walker' => new Walker_Navbar()
            ]);
          }
        ?>
      </div>

    </nav>
  </div>
</header>

<main id="main"><!-- main start -->