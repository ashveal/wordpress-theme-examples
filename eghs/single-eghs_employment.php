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

					<?php 
					
										
					
					
					if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
	
					
					
					  <h1><?php the_title(); ?></h1>
					  <p><em><?php 
					  if(get_field('end_date')) {
					   $date = DateTime::createFromFormat('Ymd', get_field('end_date'));
							echo $date->format('jS F Y');
							}
					?></em></p>
					  <hr />
					  
					  
					  <?php
					
				include('snippets/content-blocks.php');					
					?>					
					  <hr/>
					  
					  <ul>
					  <?php
					  
					  if(get_field('position_description')) {
						  
						  echo '<li><a href="'.get_field('position_description').'">Position Description</a></li>';
						  
					  }
					  
					   echo '<li><a href="#" id="apply">Apply for this Position Online</a><div id="employment_form">';
					   
					   
					   gravity_form(1, false, false, false, array('reference'=>get_field('reference'),'title'=>get_the_title(),'department'=>get_field('department')), true);
					   
					   echo '</div></li>';
					  
					  
					   
					  ?>
					  </ul>
					  
					  <?php
					   
					  ?>

					  <hr />
					  <p>&lt; <a href="/employment/positions-vacant">Back to Vacancies</a></p>
					<?php endwhile; wp_reset_query(); ?>
										
										
										
										
										
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<script>

$(function(){
	
	$('#gform_wrapper_1').addClass('hide');
	
	$('#apply').on('click',function(e){
		e.preventDefault();
		
		$(this).hide();
		
		$('#gform_wrapper_1').toggleClass('hide');
	})
	
});

</script>

<?php get_footer(); ?>