<?php
/**
 * The template for displaying list of blog posts.
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */

get_header();

get_template_part('modules/home'); //load home page content

$posts = new WP_Query(array('post_type'=>'post'));

/*echo '<pre>';
print_r($posts->posts);
echo '</pre>';*/

?>

<div id="blog"> 
	<?php if($posts): ?>
		<?php foreach($posts->posts as $post) :	setup_postdata($post); ?>	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post-holder">
                    <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></p>
                    <p><?php echo get_the_date('l jS F, Y '); ?></p>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <p align="right"><a href="<?php the_permalink(); ?>">See more...</a></p>  
                </div>
            </article>		
		<?php endforeach; ?>
        <div class="clear"></div>
        <?php freightbar_content_nav('nav-below'); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>