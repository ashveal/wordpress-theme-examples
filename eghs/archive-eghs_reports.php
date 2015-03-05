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
	        	
	        	<h1>Reports</h1>
	
					<?php if ( have_posts() ): ?>
					  <?php while ( have_posts() ) : the_post(); ?>
					    
					    <div class="col-xs-6 col-sm-4 col-md-3 linetop">
					    
					    	<?php

					    	
					    	$file = get_field('file')['url'];

					    	?>
					    
					    	<div class="report">
					    		<a href="<?php echo $file; ?>" target="_blank" class="nolink"><?php the_post_thumbnail('report',array('class'=>'img-responsive')); ?></a>
								<h2><?php the_title(); ?></h2>
								<p><em><?php echo get_the_date('jS F Y'); ?></em></p>
								<a target="_blank" href="<?php echo $file; ?>">Download</a>
					    	</div>
							
					    </div>

					    
					  <?php endwhile; wp_reset_query(); ?>
					<?php else: ?>
					  <h2>No posts found</h2>
					<?php endif; ?>
					
					<?php wp_pagination(); ?>
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>