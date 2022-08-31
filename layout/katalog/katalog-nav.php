<?php
$categories = get_terms('katalog_category'); 
?>

<ul class="uk-subnav uk-subnav-divider">
  <li>
    <a href="<?= get_post_type_archive_link('katalog') ?>">
      All
    </a>
  </li>
  <?php foreach($categories as $cat) :?>
    <li>
      <a href="<?= get_term_link($cat->term_id, "katalog_category") ?>">
        <?= $cat->name ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>