<?php
/** 
 *  Template Name: Search
 */ 
?>

<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin">
<div uk-height-viewport="expand: true;">

  <div class="uk-background-muted uk-padding uk-margin-medium-bottom">
    <h1 class="uk-h3">Search</h1>
    <?php get_search_form(); ?>
  </div>

  <h4 class="uk-heading-divider">Results for: <b><?= get_search_query() ?></b></h4>

  <?php 
    get_template_part('layout/common/search-results'); 
    get_template_part('layout/common/pagination', null);
  ?>

</div>
</div>

<?php get_footer(); ?>
