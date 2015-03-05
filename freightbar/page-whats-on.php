<?php
/**
 * The template for displaying news page.
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */

get_header();

//show page content
while(have_posts()) {
	the_post();
	get_template_part('content','page');
}

//load news post types
$news = new WP_Query(array('post_type'=>'news','orderby'=>'ID','order'=>'ASC'));

echo '<div id="news">';

foreach($news->posts as $item) {	

	$alias = $item->post_name;
	$title = $item->post_title;
	$date = date('l jS F, Y',strtotime($item->post_date));
	$content = substr(get_field('content',$item->ID),0,200);
	$image = wp_get_attachment_image_src(get_field('image',$item->ID),'post-thumbnail');
	
	echo '<article><div class="post-holder">
	<h3>'.$title.'</h3><p class="date">'.$date.'</p>
	<p><a href="'.$alias.'"><img src="'.$image[0].'" /></a></p>'.$content.'...<p align="right"><a href="'.$alias.'">See more...</a></p></div></article>';
		
}

echo '<div class="clear"></div></div>';

get_footer();

?>