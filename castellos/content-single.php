<?php
/**
 * The default template for displaying a single post
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<div class="post-container-single">

	<div class="post-title">
		<h2><?php the_title(); ?></h2>
	</div>
	<div class="post-main">
		<?php
			$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large');
		?>
		<img src="<?php echo bfi_thumb($img[0], $params = array('width'=>500, 'height'=>300)); ?>" alt="<?php echo get_the_title(); ?>" width="500" height="300" />
		<?php the_content(); ?>
	</div>
	<div class="post-info">
		<?php
		$post_info = get_field('event_information');
		if($post_info != '') {
			echo $post_info;
		}
		?>
	</div>
	<div class="clear"></div>

</div>