<div class="uk-panel">

  <a href="<?= the_permalink() ?>" title="<?= the_title() ?>">
    <?php
      if(has_post_thumbnail()) {
        echo get_the_post_thumbnail(null, 'movie_card');
      }
    ?>
  </a>

  <h3 class="uk-h5 uk-margin-small"><?= the_title() ?></h3>

  <?php if(get_field('featured')) : ?>
  <label class="uk-label uk-label-danger uk-position-top-right uk-position-small">
    <?= lng('Featured');?>
  </label>
  <?php endif;?>

</div>
