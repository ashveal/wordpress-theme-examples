<?php

/*Frontpage sliders*/

if(is_home()) { //if posts page
	$sliders = get_field('slider',get_option('page_for_posts'));
} else { //normal page
	$sliders = get_field('slider');	
}

if($sliders != '' && count($sliders) > 0) {

	echo '<div class="flexslider"><ul class="slides">';
	
	foreach($sliders as $slider) {	
		
		$img = wp_get_attachment_image_src($slider['image'], 'slider');
		echo '<li><div class="img-container" style="background-image:url('.$img[0].');"></div></li>';	
	
	}
	
	echo '</ul><div class="slider-nav"></div></div>';
	
} else {
	$img = wp_get_attachment_image_src(get_field('default_header_image','option'), 'slider');
	echo '<div class="img-container" style="background-image:url('.$img[0].');"></div>';
}
?>