<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div id="content">

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="content-menu">
				<ul class="submenu">
					<?php simple_section_nav('before_widget=<li>&after_widget=</li>&a_heading=false'); ?>
				</ul>
			</div>
			<div class="content-main"><?php the_content(); ?></div>
			<div class="clear"></div>
		</div>
	<?php endwhile; ?>

</div>

<?php get_footer(); ?>