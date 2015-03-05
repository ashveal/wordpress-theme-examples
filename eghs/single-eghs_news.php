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
					
						<h1><?php the_title(); ?></h1>
						<?php the_date('jS F Y','<p><em>','</em></p>'); ?>
						<hr />
					
						<?php
						

						include('snippets/content-blocks.php');
						
						
						?>

						<hr />
						<p><a href="/news">Back to News</a></p>
						
					<?php endwhile; wp_reset_query(); ?>
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>