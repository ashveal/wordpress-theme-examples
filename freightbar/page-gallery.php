<?php
/**
 * The template for displaying gallery page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */

get_header();

while(have_posts()) {
	the_post();
	get_template_part('content','page');
}

echo '<div id="gallery">';

$galleries = new WP_Query(array('post_type'=>'galleries','orderby'=>'ID','order'=>'ASC'));

foreach($galleries->posts as $gallery) {	
	echo generateGallery('gallery_images','gallery_image',$gallery->ID,'medium');	
}

echo '<div class="clear"></div></div>';

get_footer();

?>