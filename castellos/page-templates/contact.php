<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php
			
$google_address = get_field('google_map_address','options');
			
?>

<div id="content">
	<div class="container">
		<div id="contact">
			<div class="contact-title">
				<h2><?php echo get_the_title(); ?></h2>
			</div>
			<div class="contact-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<div class="contact-info">
				<div id="google-map"></div>
			</div>
			<div class="clear"></div>
		</div>	
	</div>
</div>

<script type="text/javascript">

function initialize() {

	var styles = [
		{
			stylers: [
				{ saturation: -100 }
			]
		}
	];
	
	var mapOptions = {
		zoom: 16,
		disableDefaultUI: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP/*,
		styles: styles*/
	}

	var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

	var address = "<?php echo $google_address; ?>";
	var geocoder = new google.maps.Geocoder();
	
	geocoder.geocode({'address':address},function(results,status) {

		if(status == google.maps.GeocoderStatus.OK) {
			
			map.setCenter(results[0].geometry.location);
		
			var locationMarker = new google.maps.Marker({
				position: results[0].geometry.location,
				map: map,
				title: "Location"
			});
			
		} else {	
			alert("Geocode Error: "+status);	
		}
		
	});

}

function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
	document.body.appendChild(script);
}

window.onload = loadScript;

</script>

<?php get_footer(); ?>