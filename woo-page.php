<?php
/** 
 *  Template Name: WooCommerce
 */ 

$shortcode = get_field('page');
?>

<?php get_header(); ?>

<div class="uk-section">
  <div class="uk-container" uk-height-viewport="expand: true">
    <div>

      <h1 class="uk-margin-medium">
        <?php the_title(); ?>
      </h1>

      <?php
        if($shortcode != "custom") {
          echo do_shortcode("[$shortcode]");
        }
      ?>

    </div>

  </div>
</div>

<?php get_footer(); ?>