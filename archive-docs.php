<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin">

  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <a href="<?= the_permalink() ?>" title="<?php the_title() ?>">
      <?php the_title(); ?>
    </a> 

  <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>