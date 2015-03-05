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
					
					<h1>Employment at EGHS</h1>
					<hr />
					<h2>Situated in the heart of Victoria’s Grampians region East Grampians Health Service offers a full range of acute medical and surgical services, residential aged care and community health in Ararat and Willaura.</h2>
					<hr/>
					<?php
			//query_posts('post_per_page=3');
					
					
				/*	$args = array (
				    'post_type' => 'eghs_employment',
				    'meta_query' => array(
						array(
					        'key'		=> 'end_date',
					        'compare'	=> '>=',
					        'value'		=> date('Ymd')
					    )
				    ),
				    'meta_key'=>'end_date',
				    'orderby'=>'meta_value_num',
				    'order'=>'ASC'
				);
				query_posts($args);*/
					
					 if ( have_posts() ): ?>
					  <?php while ( have_posts() ) : the_post(); ?>
					    <?php $author_name = get_the_author_meta('nickname'); ?>
					    
					    <?php
					    
					    $type = (get_field('type') ? implode(', ',get_field('type')) : '' );
					    
					    ?>
					    
					    <h3><a href="<?php the_permalink(); ?>"><strong><?php echo strtoupper(get_the_title()); ?></strong><?php echo ($type != ''? ' - ' . $type : '') ?></a></h3>
					    
					    <p><em>Applications Close: <?php 
					    
					    if(get_field('end_date')) {
					    $date = DateTime::createFromFormat('Ymd', get_field('end_date'));
							echo $date->format('jS F Y');
					    }
					    ?></em></p>

					    <?php the_excerpt(); ?>

					    <hr />
					    
					  <?php endwhile; wp_reset_query(); ?>
					<?php else: 
					
						$page = get_page_by_path($_SERVER['REQUEST_URI']);
						echo get_field('no_positions_vacant_message',$page->ID);
					
					endif; ?>
					
					<?php wp_pagination(); ?>
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->



<?php get_footer(); ?>