<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="slider-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="slider">
					<?php
					$img = wp_get_attachment_image_src(get_field('image'), 'slider');
					echo '<img src="'.$img[0].'" alt="'.get_the_title().'" class="img-responsive" />';
					?>
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
					<h1 class="page_title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
	    	<div class="col-xs-12 col-md-9">
	        	
	        	<div id="content"> 
					
				    <div class="exhibition-single">
				    
				    	<div class="date">
				    		<p><?php echo get_field('dates'); ?></p>
				    	</div>
						<div class="share">
							<ul>
								<li><span class="share_text">SHARE</span></li>
								<li><a class="twitter" href="'#" target="_blank"><span class="icon-twitter" aria-hidden="true"></span></a></li>
								<li><a class="facebook" href="'#" target="_blank"><span class="icon-facebook" aria-hidden="true"></span></a></li>
								<li><a class="email" href="'#" target="_blank"><span class="icon-envelope" aria-hidden="true"></span></a></li>
							</ul>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						
						<hr />
						
						<?php the_content(); ?>
						
				    </div>
					
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