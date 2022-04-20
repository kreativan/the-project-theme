<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin">

  <div class="tm-bg-white uk-box-shadow-medium uk-padding uk-margin-medium-bottom">
    <h1 class="uk-h3">Search</h1>
    <?php get_search_form(); ?>
  </div>

  <h4 class="uk-heading-divider">Results for: <b><?= get_search_query() ?></b></h4>

  <?php 
    get_template_part('includes/search-results'); 
    get_template_part('includes/pagination', null);
  ?>

</div>

<?php get_footer(); ?>
