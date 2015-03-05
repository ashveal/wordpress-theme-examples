<?php

$sliders = get_field('slider');

if(get_field('slider') != '') {	

	echo '<div class="flexslider"><ul class="slides">';
	
	foreach($sliders as $slider) {	
		
		$img = wp_get_attachment_image_src($slider['image'], 'slider');
	
		echo '<li><img src="'.$img[0].'" alt="'.$slider['title'].'" class="img-responsive" /></li>';
	
	}
	
	echo '</ul><div class="clear"></div><div class="slider-nav"></div><div class="clear"></div></div>';
	
}

?>