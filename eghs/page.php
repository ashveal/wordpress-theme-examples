<?php 
get_header(); ?>

<div id="slider-wrapper">
	<?php include('snippets/slider.php'); ?>
</div>

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
					
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<div class="content">
					
					<?php
					

					if($post->ID=='25') { //contact page
						
						echo '<h1>Contact Us</h1>';
						echo '<hr/>';
						echo '<div class="row"><div class="col-xs-12 col-sm-8"><div id="map-canvas"></div>
						
						<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>

$(function(){

	var location1 = new google.maps.LatLng(-37.279461, 142.932319);
	
	var location2 = new google.maps.LatLng(-37.550512, 142.819707);

  var mapOptions = {
    center: location1,
    zoom: 15,
    mapTypeControl: false
  };
  var map = new google.maps.Map(document.getElementById("map-canvas"),
      mapOptions);
      
  var marker1 = new google.maps.Marker({
      position: location1,
      map: map,
      title: \'East Grampians Health Service\'
  });
  
  var marker2 = new google.maps.Marker({
      position: location2,
      map: map,
      title: \'Willaura Health Care\'
  });

	$(\'.contact_location\').on(\'click\',function(){
		map.panTo(new google.maps.LatLng($(this).data(\'lat\'),$(this).data(\'lng\')));
		map.setZoom($(this).data(\'zoom\'));
	});
})
</script>

						
						
						</div><div class="col-xs-12 col-sm-4">
						
						<div class="contact_location" data-zoom="15" data-lng="142.932319" data-lat="-37.279461"><h2>East Grampians Health Service</h2>
<address>Girdlestone Street<br/>
(P.O. Box 155)<br/>Ararat 3377</address>
<strong>P:</strong> 03 5352 9300<br/>
<strong>F:</strong> 03 5352 9333<br/>
<strong>E:</strong> <a href="mailto:info@eghs.net.au">info@eghs.net.au</a></div>

<div class="contact_location" data-zoom="14" data-lng="142.819707" data-lat="-37.550512"><h2>Willaura Health Care</h2>
<address>Delacombe Way<br/>
Willaura 3379</address>
<strong>P:</strong> 03 5354 1600<br/>
<strong>F:</strong> 03 5354 1610</div>
						
						</div></div>';
						echo '<hr style="margin-top:0" />';
					}
					
					
					
					include('snippets/content-blocks.php');
					
					?>					
					
					</div>
					    
					<?php endwhile; wp_reset_query(); ?>
					
				</div><!--#content-->
				
	        </div> 
	    </div>
	</div>
</div><!--#content-wrapper-->

<?php get_footer(); ?>