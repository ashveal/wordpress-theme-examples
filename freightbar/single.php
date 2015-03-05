<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part('content','single'); ?>
<?php endwhile; ?>
    
<?php get_footer(); ?>