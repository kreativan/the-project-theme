<?php
// prev
$prev_post = get_previous_post(); 
$prev_id = $prev_post->ID ;
$prev_permalink = get_permalink($prev_id);

// next
$next_post = get_next_post();
$next_id = $next_post ? $next_post->ID  : false;
$next_permalink = $next_id ? get_permalink($next_id) : false;

?>

<?php if($prev_post || $next_post) : ?>
<div class="uk-flex uk-flex-between">

  <div>
    <?php if($prev_post) :?>
    <a href="<?= $prev_permalink ?>" class="uk-link-heading" title="<?= $prev_post->post_title ?>">
      <i uk-icon="arrow-left"></i>
      <?= $prev_post->post_title ?>
    </a>
    <?php endif;?>
  </div>

  <div>
    <?php if($next_post) :?>
    <a href="<?= $next_permalink ?>" class="uk-link-heading" title="<?= $next_post->post_title ?>">
      <?= $next_post->post_title ?>
      <i uk-icon="arrow-right"></i>
    </a>
    <?php endif;?>
  </div>

</div>
<?php endif;?>