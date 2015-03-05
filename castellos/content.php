<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<?php
global $post_count; //custom counter
?>

<div class="panel<?=($post_count % 3 == 0 ? ' panel-last' : '')?>">
	<?php
	global $post_count; //custom counter
	$img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
	?>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo bfi_thumb($img[0], $params = array('width'=>320, 'height'=>200)); ?>" alt="<?php echo get_the_title(); ?>" width="320" height="200" /></a>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
	<?php the_excerpt(); ?>
</div>