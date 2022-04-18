<?php
$categories = get_terms([
  'taxonomy' => "katalog_category",
  'hide_empty' => false,
]);
?>
<form id="form-katalog-search" action="./" method="GET" class="uk-form-stacked">
  <div class="uk-grid uk-grid-small uk-flex-bottom" uk-grid>

    <div class="uk-width-expand@m">
      <input id="input-search" class="uk-input" type="text" name="q" value="<?= isset($_GET["q"]) ? $_GET["q"] : "" ?>"
        placeholder="Search..." />
    </div>

    <div class="uk-width-expand@m">
      <select class="uk-select" name="category" onchange="this.form.submit()">
        <option value="">- Select Maker -</option>
        <?php foreach($categories as $cat) : ?>
        <option value="<?= $cat->slug ?>"
          <?= ( isset($_GET["category"]) && $_GET["category"] == $cat->slug ) ? "selected" : ""; ?>>
          <?= $cat->name ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>

  </div>
</form>
