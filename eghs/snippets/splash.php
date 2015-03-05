<?php

if(is_front_page()) {
	
	echo '<div id="splash">';
	

	

	if( have_rows('splash_images') ):
	
		$x = 0;
	
		while ( have_rows('splash_images') ) : the_row();
			
			if($x == 0) {
				echo '<div class="splash_image" style="background-image:url('.wp_get_attachment_image_src( get_sub_field('image'), 'splash' )[0].');"></div>';
			} else {
				 echo '<div class="splash_image" data-bg="'.wp_get_attachment_image_src( get_sub_field('image'), 'splash' )[0].'"></div>';
			}
			$x++;
					 
		endwhile;
	
	endif;
	
	echo '<div id="splash_wrap"><div id="splash_vert_center"><div class="container">';
	
	
	echo '<div class="row"><div class="col-sm-12 blurb"><a href="/"><img src="'.get_template_directory_uri().'/img/splash-logo@2x.png" width="200" /></a><br/>'.get_field('blurb').'</div></div>';
	
	
	if( have_rows('buttons') ):
		echo '<div class="row buttons">';
		while ( have_rows('buttons') ) : the_row();
			 echo '<div class="col-sm-4"><a href="'.get_sub_field('link').'" class="button"><span class="bg" style="background-image:url('.wp_get_attachment_image_src( get_sub_field('image'), 'button' )[0].');"></span><span class="label">'.get_sub_field('label').'</span></a></div>';
					 
		endwhile;
		echo '</div>';
	
	endif;
	
	
	echo '<div class="row scroll"><div class="col-sm-12"><a href="#" class="view"><span></span><br/>SCROLL DOWN FOR MORE</a></div></div>';
	
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}