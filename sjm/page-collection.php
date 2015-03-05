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
	    	<div class="col-xs-12 col-md-12">
	        	
	        	<div id="collection"> 
					
				    <div class="content">
						<?php the_content(); ?>
						
						<div class="collection-categories">
							<?php
							$categories = get_terms('collection-category', array('hide_empty' => false));
							$total = count($categories);
							$cat_count = 1;
							
							echo '<ul><li><a href="'.home_url('/explore/collection').'">All</a><span class="separator">/</span></li>';
							foreach($categories as $category) {
								echo '<li>' . '<a href="' . esc_attr(get_term_link($category, 'collection-category')) . '" title="' . sprintf( __( "View all items in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>'.($cat_count != $total ? '<span class="separator">/</span>' : '').'</li>';
								$cat_count++;
							}
							echo '</ul>';
							?>
						</div>
						
						<?php
						
						
						$args = array(
							'post_type' => 'collection',
							'orderby' => 'title',
							'order' => 'ASC'
						);

						$query = new WP_Query($args);
						
						// The Loop
						if($query->have_posts()) {
							echo '<div class="row">';
							while ($query->have_posts()) {
								$query->the_post();
								echo '<div class="col-xs-6 col-sm-3 col-md-2">';
								
								$images = get_field('images');
								$img = wp_get_attachment_image_src($images[0]['image'], 'thumb');
								echo '<div class="collection-item"><a href="'.get_permalink().'"><img src="'.$img[0].'" alt="'.get_the_title().'" class="img-responsive" />'.get_the_title().'</a></div>';
								
								echo '</div>';
							}
						    echo '</div>';
						} else {
							// no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
						
						?>	
						
				    </div>
					
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php endwhile; ?>

<?php get_footer(); ?>