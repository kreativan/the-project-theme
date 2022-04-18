<?php
/**
 *  Search Form
 *  Pass cat_id in $args to restrict search to specifuc category
 *  @var array $args
 *  @var string $cat_id = $args["cat_id"]
 *  @example get_search_form();
 *  @example  get_template_part('searchform', null, ['cat_id' => 6]);
 */

$cat_id = isset($args["cat_id"]) ? $args["cat_id"] : "";

?>

<form id="form-search" action="/" method="GET" class="uk-form-stacked">

  <div class="uk-grid uk-grid-small uk-flex-bottom" uk-grid>

    <?php
      // restrict search to the specific category
      // by category id
    ?>
    <input type="hidden" name="cat" value="<?= $cat_id ?>" />


    <div class="uk-width-expand@m">
      <input 
        id="input-search" 
        class="uk-input" 
        type="text" 
        name="s" 
        value="<?= the_search_query() ?>" 
        placeholder="Search..."
        required 
      />    
    </div>

    <div class="uk-width-auto@m">
      <button class="uk-button uk-button-primary uk-width-small" type="submit">
        Search
      </button>
    </div>

  </div>

</form>
