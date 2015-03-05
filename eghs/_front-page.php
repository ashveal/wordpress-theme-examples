<?php get_header(); ?>

<div id="content-wrapper">
	<div class="container">
		<div class="row">
	    	<div class="col-md-12">
	        	<div id="content"> 
	
					<?php while ( have_posts() ) : the_post(); ?>
					    <div class="frontpage-content">
							<?php //get_template_part( 'content', 'page' ); ?>
							
							<div class="frontpage">
							
								<div class="panels">
									<div align="center">
										<img src="<?php echo get_template_directory_uri(); ?>/img/alcocks.png" alt="<?php bloginfo('name'); ?>" class="img-responsive" />
									</div>
									<div align="center">
										
										<?php 
										/*$panels = get_field('panel');
										
										$count = 0;
										
										foreach($panels as $panel) {
										
											$count++;
										
											$img = wp_get_attachment_image_src($panel['image'], 'thumbnail');
										?>	
											<div class="link-panel<?php echo ($count==3 ? ' link-panel-last' : ''); ?>">
												<div class="panel-inner">
													<a href="<?php echo $panel['link']; ?>">
														<img src="<?php echo $img[0]; ?>" alt="<?php echo $panel['title']; ?>" />
														<h4><?php echo $panel['title']; ?></h4>
													</a>
												</div>
											</div>
										<?php	
										}*/
										?>
										
										
										<div class="clear"></div>
									</div>
								</div>
							
							</div>
							
					    </div>
					<?php endwhile; ?>
					
				</div><!--#content-->
	        </div>
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>