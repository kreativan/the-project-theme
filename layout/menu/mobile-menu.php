<?php
$mobile_menu = tpf_menu('Main Menu');

if(isset($_GET['actual_link'])) {
  $actual_link = $_GET['actual_link'];
} else {
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>

<button class="uk-offcanvas-close" type="button" uk-close></button>

<ul id="mobile-menu-nav" class="uk-nav uk-nav-primary uk-nav-parent-icon uk-margin-auto-vertical" uk-nav>
  <?php foreach($mobile_menu as $item) :?>

    <?php
      $submenu = isset($item['submenu']) && count($item['submenu']) > 0 ? true : false;
      $class = "menu-item";
      if($submenu) $class .= " uk-parent";
      if($item['href'] == $actual_link) $class .= " uk-active";
    ?>

    <li class="<?= $class ?>">
      <a href="<?= $item['href'] ?>">
        <?= $item['title'] ?>
      </a>
      <?php if($submenu) :?>
        <ul class="uk-nav-sub">
          <?php foreach($item['submenu'] as $subitem) :?>
            <li>
              <a href="<?= $subitem['href'] ?>">
                <?= $subitem['title'] ?>
              </a>
            </li>
          <?php endforeach; ?>
         </ul>
      <?php endif;?>
    </li>
  
  <?php endforeach; ?>
</ul>