<?php get_header(); ?>

<div class="uk-container uk-container-small tm-container-margin">

  <?php get_template_part('layout/common/breadcrumb'); ?>

  <h1><?php the_title(); ?></h1>

  <?php the_content() ?>

  <?php
  foreach(get_field('content') as $item) {
    if($item['acf_fc_layout'] == "editor") {

      echo $item['editor'];

    } if($item['acf_fc_layout'] == "markdown") {

      markdown($item['text']);

    } if($item['acf_fc_layout'] == "code") {

      $code = htmlspecialchars($item['code']);

      if(!empty($item['title'])) echo "<h3>{$item['title']}</h3>";
      if(!empty($item['text'])) markdown($item['text']);
      echo "<pre class='uk-border-rounded'>";
      echo "<code class='language-{$item['lang']}'>{$code}</code>";
      echo "</pre>";

    }
  }
  ?>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/atom-one-dark.min.css" integrity="sha512-Jk4AqjWsdSzSWCSuQTfYRIF84Rq/eV0G2+tu07byYwHcbTGfdmLrHjUSwvzp5HvbiqK4ibmNwdcG49Y5RGYPTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js" integrity="sha512-yUUc0qWm2rhM7X0EFe82LNnv2moqArj5nro/w1bi05A09hRVeIZbN6jlMoyu0+4I/Bu4Ck/85JQIU82T82M28w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- and it's easy to individually load additional languages -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/languages/php.min.js" integrity="sha512-uGyl/usiWvQEfVKXG1g0FTSKs7kyuan4w5c2SPWluNEW3anQqdfWdkPqVrjP91v/G+NaRIOXyh5RTkNngP4N8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/languages/less.min.js" integrity="sha512-cDjZxcNHvFFFO/w8/hUe0G631yvZINouzj+ExiQUaSqB4OL1m/9CX5mFWIjsSsDh63RDR6Fh/cU7LUNpaep4yw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/languages/css.min.js" integrity="sha512-WHS3gu5JBFjazJThDTYfEuLJp7uIcm2gG7nBdtS4bw4FCuaKq2etcCR6niZwz1EDD6GO6JbmYA5eiOpcvM86RQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/languages/javascript.min.js" integrity="sha512-V3q3W5043LERycIee7tLy1LAfzxblUrmI5J8p3uZF2FQ3QlMp9QddQoy4OgcIzVs4aCMEj9iwGL5UmjqHF/uBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/languages/json.min.js" integrity="sha512-KcLAKG8ZX/8SDgs3ZYRvHh2CUAtAfUNGd4ZW1/0v37PEnZxJ4TAViOIf1euDuP2s06prYumSr+VjXRuxp9EYzA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/languages/markdown.min.js" integrity="sha512-LX/PTbwXDQRTMHBxv5rfRhI+ceFDWT796PwF5ulC+Xl5HiczIATBewkdKUQ+5FalV5xd35u2JU+XSJbpwQ31wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>hljs.highlightAll();</script>

<?php get_footer(); ?>
