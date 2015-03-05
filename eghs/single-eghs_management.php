<?php get_header(); ?>

<div id="content-wrapper">
	<div class="container">
		<div class="row">
	    	<div class="col-xs-12 col-md-3">
	    		<?php
	    		get_sidebar();
	    		?>
	    	</div>
	    	<div class="col-xs-12 col-md-9">
	        	
	        	<div id="content"> 
					
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
						<?php
					    $img = wp_get_attachment_image_src(get_field('image'), 'thumbnail');
					    $email = get_field('email');
					    $twitter = get_field('twitter');
					    $linkedin = get_field('linkedin');
					    ?>
					
						<div class="single-board-member">
							<img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>" class="img-responsive" align="right" />
							<h1><?php the_title(); ?></h1>
							<hr />
							<h2><?php echo get_field('intro_text'); ?></h2>
							<hr />
							<?php the_content(); ?>
							<hr />
							<div class="social">
								<?php
								if($email != '') {
									echo '<a href="mailto:'.$email.'" target="_blank"><span class="icon-email" aria-hidden="true"></span>'.$email.'</a>';
								}
								if($linkedin != '') {
									echo '<a href="'.$linkedin.'" target="_blank"><span class="icon-linkedin" aria-hidden="true"></span>'.$linkedin.'</a>';
								}
								if($twitter != '') {
									echo '<a href="'.$twitter.'" target="_blank"><span class="icon-twitter" aria-hidden="true"></span>'.$twitter.'</a>';
								}
								?>
							</div>
						</div>
					  
					<?php endwhile; wp_reset_query(); ?>
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>