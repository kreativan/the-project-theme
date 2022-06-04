<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin" uk-height-viewport="expand: true">

  <h1 class="uk-heading-small">Documentation</h1>

  <ul class="uk-list uk-list-divider uk-margin-medium-top">
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <li>
      <h2 class="uk-h4">
        <a class="uk-link-heading uk-flex uk-flex-between uk-flex-middle" href="<?= the_permalink() ?>" title="<?php the_title() ?>">
          <span><?php the_title(); ?></span>
          <i uk-icon="arrow-right"></i>
        </a> 
      </h2>
    </li>
  <?php endwhile; endif; ?>
  </ul>

</div>

<?php get_footer(); ?>