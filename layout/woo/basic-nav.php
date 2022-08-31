<?php

?>

<?php if( (is_woocommerce() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page()) && has_nav_menu('footer-menu')) :?>
<div id="shop-menu" class="uk-background-muted uk-padding-small">
  <div class="uk-container">
  <?php
    wp_nav_menu([
      'theme_location' => 'shop-menu',
      'menu_class' => 'uk-subnav uk-subnav-divider uk-flex-center uk-margin-remove-bottom',
      'depth' => 1,
    ]);
  ?>
  </div>
</div>
<?php endif; ?>