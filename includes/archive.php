<?php 
$i = 0;

$lang2 = get_option('WPLANG');
dump($lang2);

if( have_posts() ) : while( have_posts() ) : the_post(); ?>

  <?php if($i++ > 0) echo "<hr class='uk-margin-medium' />"; ?>

  <article class="uk-margin">
    
    <?php
      if(has_post_thumbnail()) {
        echo get_the_post_thumbnail(null, 'container');
        //dump($image);
        /*
        picture($image, [
          "alt" => get_the_title(),
        ]);
        */
      }
    ?>

    <h2><?php the_title(); ?></h2>

    <p class="uk-text-meta"><?= get_the_date('l jS M Y') ?></p>

    <?php the_excerpt(); ?>

    <a href="<?= the_permalink() ?>" class="uk-button uk-button-text" title="<?= the_title() ?>">
      <?= lng('Read More'); ?>
    </a>

  </article>

<?php endwhile; endif; ?>
