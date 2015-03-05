<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">
		<div class="container">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>
				<?php //twentythirteen_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>
		</div>
	</div>
	
<?php get_footer(); ?>