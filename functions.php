<?php
/**
 *  Custom Image Sizes
 *  
 */
add_image_size('logo', 180, 42, false);
add_image_size('hero', 1920, null, false);
add_image_size('container', 1200, null, false);
add_image_size('x640', 640, null, false);
add_image_size('x380', 380, null, false);
add_image_size('thumb', 100, 100, true);

add_image_size('movie_card', 270, 400, true);


/**
 * Widget Positions
 *
 */
function widget_positions() {

  register_sidebar([
    'name' => 'Blog Sidebar',
    'id' => 'blog-sidebar',
    'before_widget' => '<div class="uk-panel uk-margin">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ]);

}
add_action('widgets_init', 'widget_positions');


/**
 * Menus
 *
 */
register_nav_menus([
  'navbar' => 'Navbar Location',
  'mobile-menu' => 'Mobile Menu Location',
  "footer-menu" => "Footer Menu Location",
]);
