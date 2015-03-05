<?php
/**
 * The Template for displaying all single news posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 

$news = new WP_Query(array('post_type'=>'news','name'=>$post->post_name));

echo '<div id="news"><p><a href="/whats-on">< back</a></p>';

foreach($news->posts as $item) {

	$alias = $item->post_name;
	$title = $item->post_title;
	$date = $item->post_date;
	$content = get_field('content',$item->ID);
	$image = wp_get_attachment_image_src(get_field('image',$item->ID),'post-thumbnail');
	
	echo '<h3>'.$title.'</h3><p class="date">'.get_the_date('l jS F, Y').'</p><span class="post-image"><img src="'.$image[0].'" /></span>'.$content;
	
}

echo '</div>';

get_footer();

?>