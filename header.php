<?php

// Site language
$lang = get_option('WPLANG');
$lang = explode("_", $lang);
$lang = $lang[0];
$lang = !empty($lang) ? $lang : 'en';

// Site Settings
$logo = !empty( get_field('logo', 'options') ) ? get_field('logo', 'options') : false;
$site_name = get_field('site_name', 'options');

// Less compiler
$lessCompiler = new Less_Compiler;

// Project settings
$dev_mode = the_project('dev_mode') == '1' ? true : false;
$assets_suffix = the_project('assets_suffix');

// Less files
$less_files = [get_template_directory() . "/less/import.less"];
$less_vars = [
  "global-font-family" => "'Roboto Flex', sans-serif",
  "base-heading-font-family" => "'Roboto Flex', sans-serif",
];

// Google Fonts LInk
$google_fonts_link = "https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,700&display=swap";

// js_files
$js_files = [
  get_template_directory_uri() . "/assets/uikit/dist/js/uikit-core.min.js",
  get_template_directory_uri() . "/assets/uikit/dist/js/uikit-icons.min.js",
  get_template_directory_uri() . "/assets/uikit/dist/js/components/notification.min.js",
  get_template_directory_uri() . "/assets/uikit/dist/js/components/slideshow.min.js",
];

// js vars
$js_vars = [
  "debug" => $dev_mode ? true : false,
];

// actual link - used to detect active menu items
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="<?= $google_fonts_link ?>">
  <link href="<?= $google_fonts_link ?>" rel="stylesheet"> 

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
  <div class="uk-container uk-container-expand">
    <nav class="uk-navbar-container uk-navbar uk-navbar-transparent" uk-navbar>

      <div class="uk-navbar-left logo uk-flex uk-flex-middle">
        <a href="/" class="uk-h4 uk-text-bold uk-margin-remove uk-link-reset uk-text-emphasis">
        <?php if($logo) :?>
          <img 
            src="<?= $logo['sizes']['logo'] ?>" 
            alt="<?= $site_name ?>" 
            width="<?= $logo['sizes']['logo-width'] ?>" 
            height="<?= $logo['sizes']['logo-height'] ?>" 
          />
        <?php else : ?>
          <?= $site_name ?>
        <?php endif; ?>
        </a>
      </div>

      <div class="uk-navbar-center">
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

      <div class="uk-navbar-right">
        <button type="button" class="uk-button uk-button-primary uk-button-small">
          Button
        </button>
      </div>

    </nav>
  </div>
</header>

<?php if( (is_woocommerce() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page()) && has_nav_menu('footer-menu')) :?>
<div id="shop-menu" class="uk-background-muted uk-padding-small">
  <div class="uk-container">
  <?php
    wp_nav_menu([
      'theme_location' => 'shop-menu',
      'menu_class' => 'uk-subnav uk-subnav-divider uk-flex-center uk-margin-remove-bottom',
      'depth' => 1,
    ]);
  ?>
  </div>
</div>
<?php endif; ?>

<main id="main"><!-- main start -->