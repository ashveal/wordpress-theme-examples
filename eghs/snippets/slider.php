<?php

if(have_rows('content')):
 
	while(have_rows('content')) : the_row();
		
		switch(get_row_layout()) {
			
			case 'single_slider':
				
				$img = wp_get_attachment_image_src(get_sub_field('image'), 'full');
				
				echo '<div class="slider-wrapper-single" style="background-image:url('.$img[0].');">';
				echo '<div class="container"><div class="row"><div class="col-xs-12">';
				echo '<div class="slider-caption"><h3 style="'.get_sub_field('caption_position').':'.get_sub_field('caption_offset').'px;">'.get_sub_field('caption').'</h3></div>';
				echo '</div></div></div>';
				echo '</div>';
				
			break;
			
			case 'image_slider':
				echo '<div class="slider-wrapper">';
	
				$total_images = count(get_sub_field('images'));
					
				if(have_rows('images')):
					
					//echo '<a href="#" class="previous">Previous</a><a href="#" class="next">Next</a>';
					echo '<div class="slider-images" style="width:'.(($total_images*500)*2).'px;animation-duration: '.($total_images*10).'s;">'; //margin-left:-'.(($total_images*500)/2).'px

						$images = '';
				    while(have_rows('images')) : the_row();
				        
				        $images .= '<a title="'.get_sub_field('caption').'" href="'.wp_get_attachment_image_src( get_sub_field('image'), 'large' )[0].'">'.wp_get_attachment_image( get_sub_field('image'), 'medium' ).'</a>';
				 
				    endwhile;
				    
				    echo $images.$images;
				    
				    
					echo '</div>';
				 
				endif;
				
				echo '</div>';
			break;
			
			case 'testimonial_slider':
				
				echo '<div class="slider-wrapper-testimonial" style="background-color:#'.get_sub_field('background_colour').';">';
				echo '<div class="container"><div class="row"><div class="col-xs-12"><div class="testimonials">';
				
				$total = count(get_sub_field('testimonial'));
				
				if(have_rows('testimonial')) {
				
					echo '<ul class="testimonials">';
				
					while(have_rows('testimonial')) : the_row();
					
						echo '<li><div class="testimonial">'.get_sub_field('text').'</div></li>';
					
					endwhile;
				
					echo '</ul>';
					
					echo '<div class="testimonial-nav"><ul>';
					for($i=0;$i<$total;$i++) {
						echo '<li><a href="#"'.($i==0?' class="current"':'').'></a></li>';
					}
					echo '</ul></div>';
				
				}
				
				echo '</div></div></div></div>';
				echo '</div>';
				
			break;
			
		}
		
	endwhile;
 
endif;

?>
