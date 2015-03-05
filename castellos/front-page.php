<?php
/**
 * The template for displaying the front page
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php //while ( have_posts() ) : the_post(); ?>
	<?php //get_template_part( 'content', 'page' ); ?>
<?php //endwhile; ?>

<div id="panels">
	<div class="container">
		<?php include('snippets/frontpage_panels.php'); ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>