<?php
/**
 * Render layout file on htmx request
 * @example ./?htmx=layout/home/hero
 */
if(get_htmx_file()) {
  $layout = get_htmx_file();
  get_template_part($layout, null);
  exit();
}

// Less compiler
$lessCompiler = new Less_Compiler;

// Project Settings
$dev_mode = the_project('dev_mode') == '1' ? true : false;
$assets_suffix = the_project('assets_suffix');

/**
 * Less File - array of file paths
 * All files in this array will be passed to the compiler.
 * Include your less files here
 */
$less_files = [
  get_template_directory() . "/lib/uikit/src/less/uikit.theme.less",
  get_template_directory() . "/lib/less/mixins.less",
  get_template_directory() . "/lib/less/wp.less",
  get_template_directory() . "/lib/less/utility.less",
  get_template_directory() . "/lib/less/svg.less",
  get_template_directory() . "/style/vars.less",
  get_template_directory() . "/style/style.less",
];

/**
 * Less variables 
 * Set and override less variables here
 * @example ['global-primary-color' => 'blue']
 */
$less_vars = [
  "global-font-family" => "'Roboto Flex', sans-serif",
  "base-heading-font-family" => "'Roboto Flex', sans-serif",
];

// Google Fonts LInk
$google_fonts_link = "https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,700&display=swap";

/**
 * JS Files
 * Include your js files here
 */
$js_files = [
  get_template_directory_uri() . "/lib/uikit/dist/js/uikit-core.min.js",
  get_template_directory_uri() . "/lib/uikit/dist/js/uikit-icons.min.js",
  get_template_directory_uri() . "/lib/uikit/dist/js/components/notification.min.js",
  get_template_directory_uri() . "/lib/uikit/dist/js/components/slideshow.min.js",
  get_template_directory_uri() . "/lib/uikit/dist/js/components/tooltip.min.js",
];

/**
 * JS Vars
 * @example console.log(cms.debug)
 */
$js_vars = [
  "debug" => $dev_mode ? true : false,
  'mobile_menu_path' => './?htmx=layout/menu/mobile-menu',
];

?>

<!-- Google Fonts -->
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

<script>
  const cms = <?= json_encode($js_vars) ?>;
  console.log(cms);
</script>