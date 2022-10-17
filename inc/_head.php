<?php
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
  the_project_dir() . "/lib/uikit/src/less/uikit.theme.less",
  the_project_dir() . "/lib/less/mixins.less",
  the_project_dir() . "/lib/less/wp.less",
  the_project_dir() . "/lib/less/utility.less",
  the_project_dir() . "/lib/less/svg.less",
];

if(isset($args["less_files"])) {
  $less_files = array_merge($less_files, $args["less_files"]);
}

/**
 * Less variables 
 * Set and override less variables here
 * @example ['global-primary-color' => 'blue']
 */
$less_vars = [];
if(isset($args["less_vars"])) $less_vars = $args["less_vars"];

// Google Fonts LInk
$google_fonts_link = isset($args['google_fonts_link']) ? $args['google_fonts_link'] : "";

/**
 * JS Files
 * Include your js files here
 */
$js_files = [
  the_project_url() . "lib/uikit/dist/js/uikit-core.min.js",
  the_project_url() . "lib/uikit/dist/js/uikit-icons.min.js",
];

if(isset($args["js_files"])) {
  $js_files = array_merge($js_files, $args["js_files"]);
}

/**
 * JS Vars
 * @example console.log(cms.debug)
 */
$js_vars = [
  "debug" => $dev_mode ? true : false,
  'mobile_menu_path' => './?htmx=layout/menu/mobile-menu',
  "ajaxUrl" => '/ajax/',
  "REST" => '/wp-json/project/',
];

if(isset($args["js_vars"])) {
  $js_vars = array_merge($js_vars, $args["js_vars"]);
}

?>

<?php if($google_fonts_link && $google_fonts_link != "") : ?>
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="<?= $google_fonts_link ?>">
<link href="<?= $google_fonts_link ?>" rel="stylesheet"> 
<?php endif;?>

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

<?php
do_action("tpf_head");
?>

