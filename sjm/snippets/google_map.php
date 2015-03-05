<?php
/**
 * Google map
 *
 */

/*$address = get_field('address').'<br />'.get_field('city').' '.get_field('state').' '.get_field('postcode').' '.get_field('country');
$google_address = get_field('address').' '.get_field('city').' '.get_field('state').' '.get_field('postcode');
$phone = get_field('phone');
$fax = get_field('fax');
$email = get_field('email');*/

//$google_address = 'Level 2, 35 Cotham Road, Kew VIC 3101';

?>

<div id="google-map">

	<?php 

	$location = get_field('google_map');
	 
	if(!empty($location)):
	?>
	<div class="acf-map">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	</div>
	<?php endif; ?>
	
</div>