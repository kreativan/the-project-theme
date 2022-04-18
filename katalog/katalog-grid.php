<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

  <div>

    <div class="uk-panel">

      <?php if(has_post_thumbnail()) : ?>
      <a href="<?= the_permalink() ?>" title="<?= the_title() ?>">
        <img src="<?= the_post_thumbnail_url() ?>" loading="lazy" alt="<?php the_title(); ?>" />
      </a>
      <?php endif;?>
        
      <h3 class="uk-h5 uk-margin-small">
        <?= the_title() ?>
      </h3>

    </div>

  </div>

<?php endwhile; endif; ?>
