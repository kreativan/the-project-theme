<?php

function dump($var) {
  echo '<pre>',print_r($var,1),'</pre>';
}

/**
 *  Custom Image Sizes
 *  
 */
add_image_size('logo', 180, 42, false);
add_image_size("blog-large", 900, 400, true);
add_image_size("blog-small", 300, 200, false);


//
// Options
//

add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');


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

function latest_movies($atts, $content = null, $tag = '') {
  ob_start();
  set_query_var("attributes", $atts);
  get_template_part('katalog/katalog-latest');
  return ob_get_clean();
}
add_shortcode('latest_movies', 'latest_movies');


//-------------------------------------------------------- 
//  Functions
//-------------------------------------------------------- 

function page_builder($args = []) {

  $flexible_content_field = !empty($args['flexible_content_field']) ? $args['flexible_content_field'] : 'page_builder';
  $container = !empty($args['container']) && $args['container'] == "true" ? true : false;
  $class = !empty($args['class']) ? " {$args['class']}" : "";

  if(have_rows($flexible_content_field)) {
    while(have_rows($flexible_content_field)) {

      the_row();

      $layout = get_row_layout();
      $file = get_template_directory() . "/blocks/$layout.php";

      $main_class = $class;
      $layout_class = "";

      if(isset($args[$layout]) && !empty($args[$layout])) {
        $main_class = "";
        $layout_class = " {$args[$layout]}";
      } 

      if(file_exists($file)) {
        echo "<div class='block block-{$layout}{$main_class}{$layout_class}'>";
        if($container) echo "<div class='uk-container'>";
        get_template_part("blocks/$layout");
        if($container) echo "</div>";
        echo "</div>";
      } else {
        echo "<div class='uk-alert uk-alert-danger'>/blocks/{$layout}.php does not exists</div>";
      }
    }

  }

}

function media_url($slug) {

  $args = array(
    'post_type' => 'attachment',
    'name' => sanitize_title($slug),
    'posts_per_page' => 1,
    'post_status' => 'inherit',
  );
  $_header = get_posts( $args );
  $header = $_header ? array_pop($_header) : null;
  return $header ? wp_get_attachment_url($header->ID) : '';

}