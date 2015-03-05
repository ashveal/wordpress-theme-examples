<?php
/**
 * Template Name: Venues
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php
			
$name = get_field('name');
$content = get_field('content');
$images = get_field('images');
$phone = get_field('phone');
$hours = get_field('opening_hours');
			
$address_html = get_field('address').'<br />'.get_field('city').' '.get_field('state').' '.get_field('postcode');
$google_address = get_field('address').' '.get_field('city').' '.get_field('state').' '.get_field('postcode');
			
?>

<div id="content">
	<div class="container">
		<div id="venues">
			<div class="venue-name">
				<h2><?php echo $name; ?></h2>
			</div>
			<div class="venue-content">
				<div class="venue-images">
					<div class="flexslider">
						<ul class="slides">
							<?php
							foreach($images as $image) {	
								$img = wp_get_attachment_image_src($image['image'], 'large');
								echo '<li><a href="'.$img[0].'" title="'.$name.'"><img src="'.bfi_thumb($img[0], $params = array('width'=>500, 'height'=>300)).'" alt="'.$name.'" width="500" height="300" /></a></li>';	
							}
							?>
						</ul>
						<div class="slider-nav"></div>
					</div>
				</div>
				<?php echo $content; ?>
			</div>
			<div class="venue-info">
				<div id="google-map"></div>
				<h3>Address</h3>
				<p><?php echo $address_html; ?></p>
				<h3>Phone</h3>
				<p><?php echo $phone; ?></p>
				<h3>Opening Hours</h3>
				<p><?php echo $hours; ?></p>
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
		zoom: 17,
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