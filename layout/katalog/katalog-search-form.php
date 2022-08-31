<?php
$categories = get_terms([
  'taxonomy' => "katalog_category",
  'hide_empty' => false,
]);
$year = date("Y"); 
?>
<form id="form-katalog-search" action="./" method="GET" class="uk-form-stacked">
  <div class="uk-grid uk-grid-small uk-flex-bottom" uk-grid>

    <div class="uk-width-expand@m">
      <input id="input-search" class="uk-input" type="text" name="q" value="<?= isset($_GET["q"]) ? $_GET["q"] : "" ?>"
        placeholder="<?= lng('Search') ?>..." />
    </div>

    <div class="uk-width-expand@m">
      <select class="uk-select" name="category" onchange="this.form.submit()">
        <option value="">- <?= lng('Category') ?> -</option>
        <?php foreach($categories as $cat) : ?>
        <option value="<?= $cat->slug ?>"
          <?= ( isset($_GET["category"]) && $_GET["category"] == $cat->slug ) ? "selected" : ""; ?>>
          <?= $cat->name ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="uk-width-expand@m">
      <select class="uk-select" name="y" onchange="this.form.submit()">
        <option value="">- <?= lng('Year') ?> -</option>
        <?php for($i = 1981; $i <= $year; $i++) :?>
          <option value="<?= $i ?>"
            <?= ( isset($_GET["y"]) && $_GET["y"] == $i ) ? "selected" : ""; ?>>
            <?= $i ?>
          </option>
        <?php endfor;?>
      </select>
    </div>

  </div>
</form>
