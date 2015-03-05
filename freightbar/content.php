<?php
/**
 * The default template for displaying all posts (from index.php)
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
?>

<div class="post">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    <h3><?php the_title(); ?></h3>
    <p class="date"><?php echo get_the_date('l jS F, Y '); ?></p>         
    <p><?php the_excerpt(); ?></p>
    <p><a href="<?php the_permalink(); ?>">See more...</a></p>
    <div class="clear"></div>
</div>