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
				    if(get_the_content() != '') {
				    ?>
				    
				    	<div class="content">
							<?php the_content(); ?>
						</div>
				    
				    <?php
					
					}
					
					$exhibitions = get_field('exhibition');
					
					if($exhibitions != '') {
						
						foreach($exhibitions as $exhibition) {
							
							$img = wp_get_attachment_image_src($exhibition['image'], 'thumbnail');
							
							echo '<div class="exhibition">';
							echo '<div class="exhibition-title"><h2>'.$exhibition['title'].'</h2></div><div class="exhibition-image"><img src="'.$img[0].'" alt="'.$exhibition['title'].'" class="img-responsive" /></div><div class="clear"></div>';
							echo '<div class="exhibition-content">'.$exhibition['content'].'</div>';
							echo '</div>';
							
						}
						
					}
					
					?>
					
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