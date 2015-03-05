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

<div id="content-wrapper">
	
	<div id="title-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="page_title">Collection</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
	    	<div class="col-xs-12 col-md-12">
	        	
	        	<div id="collection-single"> 
					
				    <?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
				    
				    <div class="content">
				    
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="mobile-product-header">
									<h2><?php echo get_the_title(); ?></h2>
									<p class="code"><?php echo get_field('code'); ?></p>
								</div>
								<div class="image">
									<?php
									$images = get_field('images');
									$count = 1;
									echo '<ul>';
									foreach($images as $image) {
										$img = wp_get_attachment_image_src($image['image'], 'full');
										echo '<li><a href="#" rel="'.$count.'"><img src="'.$img[0].'" alt="'.get_the_title().'" class="img-responsive" /></a>';
										if($image['caption'] != '') {
											echo '<div class="image-caption"><div class="caption"><p>'.$image['caption'].'</p></div><div class="caption-button"><a href="#">?</a></div><div class="clear"></div></div>';
										}
										echo '</li>';
										$count++;
									}
									echo '</ul>';
									?>
								</div>
								<div class="images">
									<?php						
									$images = get_field('images');
									$count = 1;
									echo '<ul>';
									foreach($images as $image) {
										$thumb = wp_get_attachment_image_src($image['image'], 'thumbnail');
										$full = wp_get_attachment_image_src($image['image'], 'full');
										echo '<li><a href="'.$full[0].'" rel="'.$count.'"><img src="'.$thumb[0].'" alt="'.get_the_title().'" class="img-responsive" /></a><span class="bar'.($count == 1 ? ' bar-active' : '').'"></span></li>';
										$count++;
									}
									echo '</ul>';
									?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="desktop-product-header">
									<h2><?php echo get_the_title(); ?></h2>
									<p class="code"><?php echo get_field('code'); ?></p>
								</div>
								<p class="donator"><?php echo get_field('donator'); ?></p>
								<?php the_content(); ?>
								<div class="share">
									<ul>
										<li><span class="share_text">SHARE</span></li>
										<li><a class="twitter" href="'#" target="_blank"><span class="icon-twitter" aria-hidden="true"></span></a></li>
										<li><a class="facebook" href="'#" target="_blank"><span class="icon-facebook" aria-hidden="true"></span></a></li>
										<li><a class="email" href="'#" target="_blank"><span class="icon-envelope" aria-hidden="true"></span></a></li>
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</div>

				    </div>
				    
				    <div class="related">
				    	<h2>More in the Collection</h2>
				    	<?php
				    	
				    	$category = wp_get_post_terms($post->ID, 'collection-category', array("fields" => "names"));
				    	
				    	$current_cat = $category[0];
				    	
				    	$args = array(
							'post_type' => 'collection',
							'collection-category' => $category[0],
							'orderby' => 'rand',
							'order' => 'ASC',
							'posts_per_page' => 6,
							'post__not_in' => array($post->ID)
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
				    
				    <?php endwhile; ?>	
					
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>