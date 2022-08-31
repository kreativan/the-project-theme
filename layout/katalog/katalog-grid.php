<div class="uk-grid uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-margin-medium" uk-grid>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

  <div>

    <div class="uk-panel">
      <?php get_template_part("layout/katalog/katalog-item"); ?>
    </div>

  </div>

<?php endwhile; endif; ?>
</div>
