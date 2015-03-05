<?php
/**
 * Template Name: Visit
 *
 */
?>

<?php get_header(); ?>

<div id="slider-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="slider">
					<?php include('wp-content/themes/sjm/snippets/google_map.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php while ( have_posts() ) : the_post(); ?>

<div id="content-wrapper">
	
	<div id="title-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="page_title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
	    	<div class="col-xs-12 col-md-9">
	        	
	        	<div id="content"> 
					
				    <div class="content">
						<?php the_content(); ?>
				    </div>
					
				</div><!--#content-->
				
	        </div>
	        <div class="col-xs-12 col-md-3">
	    		<div id="sidebar">
		    		<?php get_sidebar(); ?>
	    		</div>
	    	</div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php endwhile; ?>

<?php get_footer(); ?>