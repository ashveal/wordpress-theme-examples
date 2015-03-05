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
					
					<?php if ( have_posts() ): ?>
					
					  <?php 
					  

					include('snippets/content-blocks.php');

					  
					  while ( have_posts() ) : the_post(); ?>
					    
					    
					    <div class="col-xs-6 col-sm-4 col-md-3 board-container">
					    
					    	<?php
					    	$img = wp_get_attachment_image_src(get_field('image'), 'thumbnail');
					    	$email = get_field('email');
					    	$twitter = get_field('twitter');
					    	$linkedin = get_field('linkedin');
					    	?>
					    
					    	<div class="board-member">
					    		<a href="<?php the_permalink(); ?>"><img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a>
								<p class="name"><?php the_title(); ?></p>
								<p class="position"><?php echo get_field('position'); ?></p>
								<div class="social">
									<?php
									if($email != '') {
										echo '<a href="mailto:'.$email.'" target="_blank"><span class="icon-email" aria-hidden="true"></span></a>';
									}
									if($linkedin != '') {
										echo '<a href="'.$linkedin.'" target="_blank"><span class="icon-linkedin" aria-hidden="true"></span></a>';
									}
									if($twitter != '') {
										echo '<a href="'.$twitter.'" target="_blank"><span class="icon-twitter" aria-hidden="true"></span></a>';
									}
									?>
								</div>
					    	</div>
							
					    </div>

					    
					  <?php endwhile; wp_reset_query(); ?>
					<?php else: ?>
					  <h2>No posts found</h2>
					<?php endif; ?>
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>