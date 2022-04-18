<div class="uk-panel">

  <a href="<?= the_permalink() ?>" title="<?= the_title() ?>">
    <img src="<?= the_post_thumbnail_url() ?>" loading="lazy" alt="<?php the_title(); ?>" />
  </a>

  <h3 class="uk-h5 uk-margin-small"><?= the_title() ?></h3>

  <label class="uk-label uk-label-primary uk-position-top-right uk-position-small">
    <?= the_field('maker');?>
  </label>

</div>
