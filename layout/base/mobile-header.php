<?php

// actual link - used to detect active menu items
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<!-- mobile header -->
<div id="mobile-menu" uk-offcanvas="overlay: true">
  <div class="uk-offcanvas-bar uk-flex uk-flex-column">
    <div class="uk-position-center uk-width-1-1 uk-text-center uk-flex-middle">
      <span uk-spinner></span>
    </div>
  </div>
</div>

<div id="mobile-header" class="uk-hidden@l uk-flex uk-flex-center uk-flex-middle"
uk-sticky="show-on-up: true; animation: uk-animation-slide-top">

  <button 
    type="button" 
    class="mobile-menu-button uk-icon uk-position-center-left" 
    onclick="theProject.mobile_menu('<?= $actual_link ?>')"
    title=""
  >
    <i uk-icon="icon: menu; ratio: 1.5;"></i>
  </button>

  <a href="/">
    <?= get_option("blogname"); ?>
  </a>

</div>