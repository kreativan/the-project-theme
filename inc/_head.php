<?php
// Less compiler
$lessCompiler = new Less_Compiler;

// Project Settings
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