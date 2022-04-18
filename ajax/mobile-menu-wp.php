<button class="uk-offcanvas-close" type="button" uk-close></button>

<div id="mobile-menu-nav" class="uk-margin-auto-vertical">
<?php
wp_nav_menu([
  'theme_location' => 'mobile-menu',
  //'menu_class' => 'uk-nav uk-nav-primary uk-nav-parent-icon uk-margin-auto-vertical',
  'container' => false,
  'items_wrap' => '<ul class="uk-nav uk-nav-primary uk-nav-parent-icon" uk-nav>%3$s</ul>',
  'walker' => new Walker_MobileMenu(),
]);
?>
</div>