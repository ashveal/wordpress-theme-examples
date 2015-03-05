<?php
/**
 * The default template for displaying a single post
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
?>

<h1><?php the_title(); ?></h1>
<p><?php echo get_the_date('l jS F, Y '); ?></p>
<span class="post-image"><?php the_post_thumbnail('medium'); ?></span>
<?php the_content(); ?>
<div class="clear"></div>