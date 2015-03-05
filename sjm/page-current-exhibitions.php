<?php get_header(); ?>

<div id="slider-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="slider">
					<?php include('snippets/sliders.php'); ?>
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
					
				    <?php
					
					$args = array(
						'post_type' => 'exhibition',
						'orderby' => 'title',
						'order' => 'ASC'
					);

					$query = new WP_Query($args);
					
					// The Loop
					if($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
							echo '<div class="exhibition">';
							$img = wp_get_attachment_image_src(get_field('image'), 'full');
							
							echo '<h2>'.get_the_title().'</h2>';
							echo '<img src="'.$img[0].'" alt="'.get_the_title().'" class="img-responsive" />';
							if(get_field('dates') != '') {
								echo '<p class="date">'.get_field('dates').'</p>';
							}
							echo '<hr />';
							the_excerpt();
							echo '<hr />';
							echo '<a href="'.get_permalink().'" class="btn-exhibition">FIND OUT MORE</a>';
							echo '</div>';
						}
					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					
					?>
					
				</div><!--#content-->
				
	        </div>
	        <div class="col-xs-12 col-md-3">
	    		<div id="sidebar">
		    		<?php get_sidebar('exhibitions'); ?>
	    		</div>
	    	</div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php endwhile; ?>

<?php get_footer(); ?>