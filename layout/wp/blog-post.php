<?php if( have_posts() ) : while( have_posts() ) : the_post(); 

// Meta
$fname = get_the_author_meta('first_name', false);
$lname = get_the_author_meta('last_name', false);
$date = get_the_date('l jS M Y');

// Tags
$tags = get_the_tags();

// Categories
$categories = get_the_category();

?>

<p class="uk-text-meta">
  <span>
    <i uk-icon="calendar"></i>
    <?= $date ?>
  </span>
  <span class="uk-margin-left">
    <i uk-icon="user"></i>
    <?= $fname ?> <?= $lname ?>
  </span>
  <span class="uk-margin-left">
    <i uk-icon="folder"></i>
    <?php foreach($categories as $cat) : ?>
    <a href="<?= get_category_link($cat->term_id) ?>" title="<?= $cat->name ?>">
      <?= $cat->name ?>
    </a>
    <?php endforeach; ?>
  </span>
</p>

<?php 
  the_content(); 
  get_template_part("layout/common/next-prev");
?>

<hr />

<div class="uk-width-auto@l">
  <?php if($tags) :?>
  <ul class="uk-subnav">
    <?php foreach($tags as $tag) : ?>
    <li>
      <a href="<?= get_tag_link($tag->term_id) ?>" title="<?= $tag->name ?>">
        <i uk-icon="tag"></i>
        <?= $tag->name ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif;?>
</div>


<div>
  <?php 
    // comments_template(); 
  ?>
</div>

<?php endwhile; endif; ?>
