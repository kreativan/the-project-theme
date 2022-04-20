<?php
/**
 *  Template Name: Katalog Search
 */

// pagination
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

// Query Arguments
$args = [
  'paged' => $paged,
  'post_type' => 'katalog',
  'posts_per_page' => 3,
  'tax_query' => [],
  'meta_query' => [
    'relation' => 'AND',
  ],
];

// meta_query
$args['meta_query'][] = [
  'key' => 'year',
  'value' => '2020',
  'type' => 'numeric',
  'compare' => '>=', // more or equal to the value (2020)
];

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
$query = new WP_Query($args);

?>

<?php get_header(); ?>

<div class="uk-container tm-container-margin">

  <div class="tm-bg-white uk-box-shadow-medium uk-padding">

    <h1 class="uk-h3"><?= the_title() ?></h1>

    <?php get_template_part('katalog/katalog-search-form'); ?>

  </div>

  <?php get_template_part('includes/content'); ?>

  <div class="uk-margin-large">

    <?php if( $query->have_posts() ) :?>
    <div class="uk-grid uk-child-width-1-5@l uk-child-width-1-3@s " uk-grid>
      <?php while( $query->have_posts() ) : $query->the_post(); ?>
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
        'total' => $query->max_num_pages
      ]);
    ?>

    <?php else :?>
      No results
    <?php endif; ?>
    
  </div>

</div>

<?php get_footer(); ?>