<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;


global $product;

$thumbnail_id = $product->get_image_id();
$thumbnail = wp_get_attachment_image_src($thumbnail_id, 'x640');

$thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'x640');
$thumbnail_src_sm = wp_get_attachment_image_src($thumbnail_id, 'x380');

$thumbnail_meta = wp_get_attachment_metadata($thumbnail_id);
$thumbnail_width = $thumbnail_meta['sizes']['x640']['width'];
$thumbnail_height = $thumbnail_meta['sizes']['x640']['height'];

$gallery = $product->get_gallery_image_ids();

?>

<div uk-slideshow="ratio:1:1">

	<div class="uk-position-relative uk-visible-toggle">

    <ul class="uk-slideshow-items">
			<li>
				<picture>
					<source media='(max-width: 600px)' srcset='<?= $thumbnail_src_sm[0] ?>' />
					<img src="<?= $thumbnail_src[0] ?>" alt="<?= the_title() ?>-<?= $thumbnail_id ?>" width="<?= $thumbnail_width ?>" height="<?= $thumbnail_height ?>" loading="lazy" />
				</picture>
			</li>
			<?php foreach($gallery as $id) :?>
				<?php
					$metadata = wp_get_attachment_metadata($id);
					$width = $metadata['sizes']['x640']['width'];
					$height = $metadata['sizes']['x640']['height'];
					$src = wp_get_attachment_image_src($id, 'x640');
					$src_sm = wp_get_attachment_image_src($id, 'x380');
				?>
				<li>
					<picture>
						<source media='(max-width: 600px)' srcset='<?= $src_sm[0] ?>' />
						<img src="<?= $src[0] ?>" alt="<?= the_title() ?>-<?= $id ?>" width="<?= $width ?>" height="<?= $height ?>" loading="lazy" />
					</picture>
				</li>
			<?php endforeach;?>	
		</ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

	</div>

  <div class="uk-grid uk-grid-small uk-child-width-auto uk-margin-small">
		<div uk-slideshow-item="0">
			<a href="#">
				<img src="<?= wp_get_attachment_image_src($thumbnail_id, 'thumb')[0]; ?>" alt="<?= the_title() ?>-thumb" loading="lazy" width="100" height="100" >
			</a>
		</div>
		<?php $i = 1; foreach($gallery as $id) : ?>
    <div uk-slideshow-item="<?= $i++ ?>">
			<a href="#">
				<img src="<?= wp_get_attachment_image_src($id, 'thumb')[0]; ?>" alt="<?= the_title() ?>-thumb-<?= $i ?>" loading="lazy" width="100" height="100" >
			</a>
		</div>
		<?php endforeach; ?>
  </div>

</div>