<?php
// pagination
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$katalog_per_page = get_field("katalog_per_page", "options");

// Query Arguments
$args = [
  'paged' => $paged,
  'post_type' => 'katalog',
  'posts_per_page' => $katalog_per_page,
  'tax_query' => [],
  'meta_query' => [
    'relation' => 'AND',
  ],
];

// meta_query year
$y = isset($_GET['y']) ? $_GET['y'] : false;
if($y) {
  $args['meta_query'][] = [
    'key' => 'year',
    'value' => $y,
    'type' => 'numeric',
    'compare' => '<=', // more or equal to the value
  ];
}

// Q
if( isset($_GET['q']) && !empty($_GET['q']) ) {
  $args['s'] = sanitize_text_field($_GET['q']);
}

// Category
if( isset($_GET['category']) && !empty($_GET['category']) ) {
  $args['tax_query'][] = [
    'taxonomy' => 'katalog_category',
    'field' => 'slug', // what field to search?
    'terms' => [
      sanitize_text_field($_GET['category'])
    ],
  ];
}

// Query
$search_query = new WP_Query($args);

?>

<?php if( $search_query->have_posts() ) :?>
<div class="uk-grid uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium" uk-grid>
  <?php while( $search_query->have_posts() ) : $search_query->the_post(); ?>
  <div>
    <?php get_template_part("katalog/katalog-item"); ?>
  </div>
  <?php endwhile; ?>
</div>

<?php
  $big = 999999999;
  echo paginate_links([
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link($big) )),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $search_query->max_num_pages,
    'type' => 'list',
  ]);
?>

<?php else :?>
No results
<?php endif; ?>
