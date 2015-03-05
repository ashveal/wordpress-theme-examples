<?php

//banners module

echo '<div id="banner">';

$banners = new WP_Query(array('post_type'=>'banners','orderby'=>'ID','order'=>'ASC'));

foreach($banners->posts as $banner) {	
	
	$banner_set = get_field('banner_images',$banner->ID);
	
	echo '<ul class="rslides">';
 
	foreach($banner_set as $banner) {
		$img = wp_get_attachment_image_src($banner['banner_image'], 'banner');
		echo '<li><img src="'.$img[0].'" alt="'.get_the_title($banner['banner_image']).'" /></li>';
	}
 
	echo '</ul>';
		
}

echo '</div>';

?>