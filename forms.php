<?php
/** 
 *  Template Name: Forms
 */ 

$args = [
  'post_type' => 'project-forms',
];
$query = new WP_Query($args);
?>

<?php get_header(); ?>

<div class="uk-container tm-container-margin">

  <?php if( $query->have_posts() ) :?>
    <?php while( $query->have_posts() ) : $query->the_post(); ?>
      <div class="tm-border uk-padding uk-margin-medium uk-background-muted">
        <h2><?= the_title(); ?></h2>
        <?php
          // get_template_part('layout/form/acf-form', null, ['id' => $post->ID]); 
          the_project_form($post->ID);
        ?>
      </div>
    <?php endwhile;?>
  <?php endif; ?>

</div>


<?php get_footer(); ?>