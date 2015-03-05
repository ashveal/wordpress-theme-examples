<?php

/**
 * Freight Bar functions and definitions.
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
 
if(!isset($content_width)) {
	$content_width = 1170; //pixels
}

function freightbar_load_css() {
	wp_enqueue_style('CSSLoader',get_stylesheet_directory_uri().'/css/css_loader.php');
}
add_action('wp_enqueue_scripts','freightbar_load_css',11);

function freightbar_setup() {

	//primary menu
	register_nav_menu('primary', __('Primary Menu','freightbar'));
	//secondary menu
	//register_nav_menu('secondary', __('Secondary Menu','twentytwelve'));
	
	register_sidebar(array(
		'name' => __( 'Main Sidebar', 'freightbar' ),
		'id' => 'sidebar-1',
		'description' => __( 'Main sidebar area', 'freightbar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => __( 'Social Media', 'freightbar' ),
		'id' => 'sidebar-2',
		'description' => __( 'Facebook and Twitter status feeds', 'freightbar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	//setup custom image sizes for file uploads
	add_image_size('banner',1100,630,true);
	
	//featured images for posts
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(333,200,true);
	
	//banners post type
	register_post_type('banners',array(
		'labels' => array(
			'name' => __( 'Banners' ),
			'singular_name' => __( 'Banner Group' ),
			'add_new_item'=> __( 'Add New Banner Group' ),
			'edit_item' => __( 'Edit Banner Groups' ),
			'view_item' => __( 'View Banner Groups' ),
			'search_items' => __( 'Search Banner Groups' ),
			'not_found' => __( 'No Banner Groups Found' ),
			'not_found_in_trash' => __( 'No Banner Groups found in Trash' )
		),
		'public' => true,
		'has_archive' => false
		)
	);
	
	//gallery post type
	register_post_type('galleries',array(
		'labels' => array(
			'name' => __( 'Galleries' ),
			'singular_name' => __( 'Gallery' ),
			'add_new_item'=> __( 'Add New Gallery' ),
			'edit_item' => __( 'Edit Gallery' ),
			'view_item' => __( 'View Gallery' ),
			'search_items' => __( 'Search Galleries' ),
			'not_found' => __( 'No Galleries Found' ),
			'not_found_in_trash' => __( 'No Galleries found in Trash' )
		),
		'public' => true,
		'has_archive' => false
		)
	);
	
	//news post type
	register_post_type('news',array(
		'labels' => array(
			'name' => __( 'News' ),
			'singular_name' => __( 'News Item' ),
			'add_new_item'=> __( 'Add News Item' ),
			'edit_item' => __( 'Edit News Item' ),
			'view_item' => __( 'View News Items' ),
			'search_items' => __( 'Search News Items' ),
			'not_found' => __( 'No News Items Found' ),
			'not_found_in_trash' => __( 'No News Items found in Trash' )
		),
		'public' => true,
		'has_archive' => false
		)
	);

}
add_action('after_setup_theme','freightbar_setup');

function freightbar_content_nav() {
	
	// Sets how many pages to show (leave it alone)
	$pages = '';
	// Sets how many buttons you want to show in the pagination area
	$range = 3;
	
	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}   

	if(1 != $pages)	{
		echo '<div class="pagination pagination-centered"><ul>';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li><a href="'.get_pagenum_link(1).'">&laquo;</a></li>';
		if($paged > 1 && $showitems < $pages) echo '<li>' . previous_posts_link('&laquo; Prev') . '</li>';

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? '<li class="active"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}

		if ($paged < $pages && $showitems < $pages) echo '<li>' . next_posts_link('Next &raquo;','') . '</li>';  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($pages).'">&raquo;</a></li>';
		echo '</ul></div>';
	}
	
}

//build html for gallery images from specific custom post ID
function generateGallery($repeater_field_name,$img_field_name,$id,$thumb_size) {

	$gallery_images = get_field($repeater_field_name,$id);
	
	if($gallery_images) {
	
		echo '<div class="popup-gallery"><div class="popup-gallery-container"><h3>'.get_the_title($id).'</h3><ul class="gallery-images">';
		$count = 1;
		for($i=0,$size=count($gallery_images);$i<$size;$i++) {
			$thumbnail = wp_get_attachment_image_src($gallery_images[$i][$img_field_name], $thumb_size);
			$large = wp_get_attachment_image_src($gallery_images[$i][$img_field_name], 'large');
			echo '<li'.($count > 1 ? ' class="hidden"' : '').'><a href="'.$large[0].'" title="'.get_the_title($gallery_images[$i][$img_field_name]).'" rel="'.get_the_title($id).'"><img src="'.$thumbnail[0].'" /></a></li>';
			$count++;
		}
		echo '</ul></div></div>';
		
	}

	return $gallery_html;
	
}