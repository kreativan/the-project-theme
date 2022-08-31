<?php

$logo = site_settings("logo");

?>

<header id="header" class="uk-visible@l"
  uk-sticky="show-on-up: true; animation: uk-animation-slide-top"
>
  <div class="uk-container uk-container-expand">
    <nav class="uk-navbar-container uk-navbar uk-navbar-transparent" uk-navbar>

      <div class="uk-navbar-left logo uk-flex uk-flex-middle">
        <a href="/" class="uk-h4 uk-text-bold uk-margin-remove uk-link-reset uk-text-emphasis">
        <?php if($logo) :?>
          <img 
            src="<?= $logo['sizes']['logo'] ?>" 
            alt="<?= site_settings("site_name") ?>" 
            width="<?= $logo['sizes']['logo-width'] ?>" 
            height="<?= $logo['sizes']['logo-height'] ?>" 
          />
        <?php else : ?>
          <?= site_settings("site_name") ?>
        <?php endif; ?>
        </a>
      </div>

      <div class="uk-navbar-center">
        <?php
          if ( has_nav_menu('navbar') ) {
            wp_nav_menu([
              'theme_location' => 'navbar',
              'menu_class' => 'uk-navbar-nav',
              'walker' => new Walker_Navbar()
            ]);
          }
        ?>
      </div>

      <div class="uk-navbar-right">
        <button type="button" class="uk-button uk-button-primary uk-button-small">
          Button
        </button>
      </div>

    </nav>
  </div>
</header>