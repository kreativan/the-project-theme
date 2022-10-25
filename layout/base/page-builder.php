<?php
/**
 *  Page Builder
 *  @example get_template_part('inc/page-builder', null, $args); 
 *  @param string $container - true/false wrap block in a container
 *  @param string $space - space between blocks small/medium/large/xlarge
 *  
 
    $args = [ 
      'folder' => 'layout/my-blocks/', // blocks layout folder
      'container' => false, // true = sections, false = margins
      'container_remove' => [], // array of lahyouts to remove container for
      'space' => 'medium',
      'space_type' => "margin", // section, margin
      'editor' => 'uk-background-primary uk-light', // add class to the specific block (layout) 
    ]

 *
 */


$folder = !empty($args['folder']) ? $args['folder'] : "layout/blocks/";
$container = !empty($args['container']) && $args['container'] == 'true' ? true : false;
$container_remove = !empty($args['container_remove']) ? $args['container_remove'] : [];
$space = !empty($args['space']) ? $args['space'] : 'medium';
$space_type = !empty($args['space_type']) ? $args['space_type'] : 'margin';
$margin = $space != "default" ? "-$space" : "";
$section = $space != "default" ? " uk-section-$space" : "";

?>

<?php if(have_rows("page_builder")) : ?>
<?php while(have_rows("page_builder")) : the_row(); $layout = get_row_layout(); ?>
  <?php
    $class = "tpf-block";
    if($space_type != "none") $class .= " uk-{$space_type}-{$space}";
    $class .= " block-$layout";
    if(isset($args[$layout]) && !empty($args[$layout])) {
      $class .= " {$args[$layout]}";
    }
  ?>
  <div class="<?= $class ?>">
    <?php
      if($container && !in_array($layout, $container_remove)) echo "<div class='uk-container'>";
      get_template_part("{$folder}{$layout}");
      wp_reset_postdata();
      if($container && !in_array($layout, $container_remove)) echo "</div>";
    ?>
  </div>
<?php endwhile;?>
<?php endif;?>