<?php get_header(); 
$categories = get_the_terms($post->ID, "katalog_category");
$custom_fields = get_fields($post->ID);
// $custom_fields_groups = acf_get_field_groups();
?>


<div class="uk-container tm-container-margin">

  <div class="uk-grid" uk-grid>

    <?php if(has_post_thumbnail()) : ?>
    <div class="uk-width-2-5@m">
      <div class="uk-panel">
        <img src="<?= the_post_thumbnail_url() ?>" loading="lazy" alt="<?php the_title(); ?>" />
      </div>
    </div>
    <?php endif; ?>

    <div class="uk-width-expand@m">
      <div class="uk-background-muted uk-padding">

        <h1><?php the_title(); ?></h1>

        <?php foreach($categories as $cat) : ?>
        <span class="uk-label uk-label-primary">
          <a class="uk-light uk-link-reset" href="<?= get_category_link($cat->term_id) ?>" title="<?= $cat->name ?>">
            <?= $cat->name ?>
          </a>
        </span>
        <?php endforeach; ?>
        
        <ul class="uk-list uk-list-striped">
          <?php foreach($custom_fields as $key => $value) :?>
          <?php if(!empty($value)) :?>
          <li>
            <span><?= ucfirst($key) ?></span>:
            <?php if(!is_array($value)) :?>
              <span><?= $value ?></span>
            <?php else :?>
              <span>
                <?php
                  $i = 0;
                  foreach($value as $item) echo ($i++ > 0) ? ",  $item" : $item;
                ?>
              </span>
            <?php endif;?>
          </li>
          <?php endif;?>
          <?php endforeach;?>
        </ul>
        <?php the_content(); ?>

        <?php get_template_part("includes/next-prev"); ?>

      </div>
    </div>

  </div>

</div>


<?php get_footer(); ?>
