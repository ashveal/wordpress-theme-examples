<?php
/**
 * Template Name: Venues Parent
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php
			
$venues = get_field('venue');
			
?>

<div id="content">
	<div id="venues">
		
		<?php
		
		$count = 1;
		$total = count($venues);
		foreach($venues as $venue) {
			
			$img = wp_get_attachment_image_src($venue['image'], 'large');
			echo '<div class="venue-container'.($count==$total ? ' venue-container-last' : '').'"><div class="container">';
			echo '<div class="venue-name"><h2><a href="'.$venue['venue_page'].'">'.$venue['name'].'</a></h2></div>';
			echo '<div class="venue-content"><a href="'.$venue['venue_page'].'"><img src="'.bfi_thumb($img[0], $params = array('width'=>500, 'height'=>300)).'" alt="'.$venue['name'].'" width="500" height="300" /></a></div>';
			echo '<div class="clear"></div></div></div>';
			$count++;
		}
		
		?>
		
		
	</div>	
</div>

<?php get_footer(); ?>