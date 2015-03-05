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
					
					<h1>Latest News</h1>
					<hr />
					<?php 
					//print_r(getRewriterules());
					//print_r(get_query_var( 'news_year' ));
					

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					
					
					//echo 'year='.get_query_var( 'news_year' ).'&monthnum='.get_query_var( 'news_month' ).'&post_type=eghs_news&paged='.$paged;
					
					query_posts( 'year='.get_query_var( 'news_year' ).'&monthnum='.get_query_var( 'news_month' ).'&post_type=eghs_news&paged='.$paged );
					
				/*	$query_args = array(
            'post_type' => 'eghs_news',
            'year' => get_query_var( 'news_year' ),
            'monthnum' => get_query_var( 'news_month' ),
            'paged' => $paged
        );
				
				global $wp_query;

        // The Featured Posts query.
        new WP_Query($query_args);
        
        
        echo $wp_query->max_num_pages;*/
        
        



					
					if ( have_posts() ): ?>
					  <?php while ( have_posts() ) : the_post(); ?>
					    <?php $author_name = get_the_author_meta('nickname'); ?>
					    
					    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					    
					    <p><em><?php echo get_the_date('jS F Y'); ?></em></p>

					    <?php the_excerpt(); ?>

					    <hr />
					    
					  <?php endwhile;  ?>
					<?php else: ?>
					  <h2>No posts found</h2>
					<?php endif; ?>
					
					<?php wp_pagination();
					
					wp_reset_query();
					 ?>
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>