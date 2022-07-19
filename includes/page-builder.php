<?php
/**
 *  Page Builder
 *  @example get_template_part('includes/page-builder', null, $args); 
 *  @param string $container - true/false wrap block in a container
 *  @param string $space - space between blocks small/medium/large/xlarge
 *  
    $args = [ 
      'container' => false, // true = sections, false = margins
      'space' => 'medium',
      'editor' => 'uk-background-primary uk-light', // add class to the specific block (layout) 
    ]
 *
 */

$container = !empty($args['container']) && $args['container'] == 'true' ? true : false;

$space = !empty($args['space']) ? $args['space'] : 'medium';
$margin = $space != "default" ? "-$space" : "";
$section = $space != "default" ? " uk-section-$space" : "";

$class = "block";
$class .= $container ? " uk-section{$section}" : " uk-margin{$margin}";

?>

<?php if(have_rows("page_builder")) : ?>
<?php while(have_rows("page_builder")) : the_row(); $layout = get_row_layout(); ?>
  <?php
    $class .= " block-$layout";
    if(isset($args[$layout]) && !empty($args[$layout])) {
      $class .= " {$args[$layout]}";
    }
  ?>
  <div class="<?= $class ?>">
    <?php
      if($container) echo "<div class='uk-container'>";
      get_template_part("blocks/$layout");
      wp_reset_postdata();
      if($container) echo "</div>";
    ?>
  </div>
<?php endwhile;?>
<?php endif;?>