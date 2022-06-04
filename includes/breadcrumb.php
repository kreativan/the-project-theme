<?php
$term = get_queried_object();

$url = $_SERVER['REQUEST_URI'];
$arr = explode('/', $url);
$arr = array_filter($arr);
$last = count($arr);
$last = $arr[$last];

$current = !empty($args['current']) ? $args['current'] : $last;
$class = !empty($args['class']) ? " {$args['class']}" : "";

$url = "/";

$items = [];
$archive = [];
$tax_items = [];

foreach($arr as $item) {
  $url .= "$item/";
  $id = url_to_postid($url);

  if(!empty($id) && ($item != $last)) {
    $items[] = get_post($id);
  } else {
    $archive_url = get_post_type_archive_link($item);
    if($archive_url) $archive[$item] = $archive_url;
  }

}

$taxy = get_taxonomies('','names');
$categories = wp_get_post_terms($term->ID, $taxy);
$category = count($categories) > 0 ? $categories[0] : false;
?>

<ul class="uk-breadcrumb<?= $class ?>">

  <li>
    <a href="/" title="<? __('Home') ?>">
      <?= __('Home') ?>
    </a>
  </li>

  <?php if(count($archive)) :?>
  <?php foreach($archive as $key => $value) : ?>
    <li>
      <a href="<?= $value ?>" title="<?= $key ?><">
        <?= ucfirst($key) ?>
      </a>
    </li>
  <?php endforeach; ?>
  <?php endif;?>

  <?php foreach($items as $item) : ?>
    <li>
      <a href="<?= get_permalink($item) ?>" title="<?= $item->post_title ?><">
        <?= $item->post_title ?>
      </a>
    </li>
  <?php endforeach; ?>

  <?php if($category) :?>
    <li>
      <a href="<?= get_category_link($category->term_id) ?>" title="<?= $category->name ?>">
        <?= $category->name ?>
      </a>
    </li>
  <?php endif;?>

  <li>
    <span><?= $term->name ? $term->name : $term->post_title ?></span>
  </li>

</ul>
