<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */

get_header(); ?>
                
<?php 
if(is_front_page() && !is_paged()) {
	get_template_part('modules/home'); //load home page content
}
?>

<div id="blog">

	<h1>BLOG</h1>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<div class="clear"></div>
		
		<?php freightbar_content_nav('nav-below'); ?>

	<?php endif; ?>
	
</div>

<?php get_footer(); ?>