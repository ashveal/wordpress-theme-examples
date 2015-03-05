<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'freightbar' ), 'after' => '</div>' ) ); ?>
<?php //edit_post_link( __( 'Edit', 'freightbar' ), '<span class="edit-link">', '</span>' ); ?>