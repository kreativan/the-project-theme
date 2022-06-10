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

add_image_size('movie_card', 270, 400, true);

// Sidebars - Widget Positions
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


//
//  Menus
//

register_nav_menus([
  'navbar' => 'Navbar Location',
  'mobile-menu' => 'Mobile Menu Location',
  "footer-menu" => "Footer Menu Location"
]);


// Navbar dropdown html/css update
class Walker_Navbar extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $output .= "<div class='uk-navbar-dropdown'>";
    $output .= "\n$indent<ul class=\"uk-nav uk-navbar-dropdown-nav\">\n";
  }
}

// Navbar dropdown html/css update
class Walker_MobileMenu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"uk-nav-sub\">\n";
  }
}


//
//  Shortcodes
//

function hello_shortcode() {
  return "Hello World";
}
add_shortcode('hello', 'hello_shortcode');

function katalog_feed($atts, $content = null, $tag = '') {
  ob_start();
  set_query_var("attributes", $atts);
  get_template_part('katalog/katalog-feed');
  return ob_get_clean();
}
add_shortcode('katalog', 'katalog_feed');
