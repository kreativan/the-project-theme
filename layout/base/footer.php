<?php ?>

<footer id="footer" class="uk-section uk-section-secondary uk-text-center">
  <div class="uk-container">

    <?php
      if ( has_nav_menu('footer-menu') ) {
        wp_nav_menu([
          'theme_location' => 'footer-menu',
          'menu_class' => 'uk-subnav uk-subnav-divider uk-flex-center',
          'depth' => 1,
        ]);
      }
    ?>

    <p class="uk-text-small uk-text-muted">
      Copyright © <?= date("Y") ?>. 
      Developed by  <a href="https://kreativan.dev" target="_blank">kreativan.dev</a>
    </p>

  </div>
</footer>


<script>
function mobile_menu(actual_link = '') {
  event.preventDefault();
  let mobileMenu = document.querySelector("#mobile-menu");
  let isLoaded = mobileMenu.querySelector("#mobile-menu-nav");
  UIkit.offcanvas(mobileMenu).show();
  if(!isLoaded) {
    fetch(`/htmx/layout/menu/mobile-menu/?actual_link=${actual_link}`)
      .then(response => response.text())
      .then(data => {
        let mobileMenuBar = mobileMenu.querySelector(".uk-offcanvas-bar");
        mobileMenuBar.innerHTML = data;
      }); 
  }
}
</script>