<?php

/**
 * Load theme text domain
 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
 */
add_action('after_setup_theme', function () {
  load_theme_textdomain('the-project', get_template_directory() . '/languages');
});

/**
 * Global Variables
 * @param string $name The name of the variable
 * @return mixed The value of the variable or false if not found
 * @example variable('color-primary');
 */
function variable($name) {
  $variables = [
    'color-primary' => '#1e87f0',
  ];
  return isset($variables[$name]) ? $variables[$name] : false;
}

/**
 * Custom Image Sizes
 */
// add_image_size('xlarge', 1600, null, false);

/**
 * Menu Positions
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
register_nav_menus([
  'navbar' => 'Navbar',
  'mobile' => 'Mobile',
  "footer" => "Footer",
]);


/**
 * Add ... to the excerpts
 */
add_filter('excerpt_more', function () {
  return "...";
});
