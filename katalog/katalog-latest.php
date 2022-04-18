<?php
$attributes = get_query_var('attributes');

$args = [
  'post_type' => 'katalog',
  'posts_per_page' => isset($attributes['limit']) ? $attributes['limit'] : 5 ,
  //'meta_key' => 'maker',
  //'meta_value' => 'Nintendo',
  //'meta_query' => [],
];

/*
$args['meta_query'][] = [
  'key'     => 'ganre',
  'value'   => 'Animation',
  'compare' => 'LIKE',
];
*/

$query = new WP_Query($args);

?>

<?php if( $query->have_posts() ) :?>
<div class="uk-grid uk-child-width-expand@m" uk-grid>
  <?php while( $query->have_posts() ) : $query->the_post(); ?>

    <div>
      <?php get_template_part("katalog/katalog-item"); ?>
    </div>

  <?php endwhile;?>
</div>
<?php endif; ?>