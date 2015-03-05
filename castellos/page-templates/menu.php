<?php
/**
 * Template Name: Menu
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php
$category = get_field('category');
?>

<div id="content">
	<div class="container">
		<div id="menu">
			<div class="menu-menu">
				<h2><?php echo get_the_title(); ?> Menu</h2>
				<ul class="submenu"><?php
				foreach($category as $cat) {
					echo '<li><a href="#'.str_replace(' ','',$cat['title']).'">'.$cat['title'].'</a></li>';
				}
				?>
				</ul>
			</div>
			<div class="menu-content">
				
				<?php
				
				foreach($category as $cat) {
					
					echo '<h3 id="'.str_replace(' ','',$cat['title']).'">'.$cat['title'].'</h3>';
					
					foreach($cat['items'] as $item) {
						
						echo '<div class="menu-item" >';
						echo '<div class="item-name"><p><strong>'.$item['name'].($item['vegetarian'] == 'Yes' ? ' &bull; v' : '').($item['gluten_free'] == 'Yes' ? ' &bull; gf' : '').'</strong>'.($item['description'] != '' ? '<br />'.$item['description'] : '').'</p></div>';
						echo '<div class="item-price"><p>'.$item['price'].'</p></div>';
						echo '<div class="clear"></div>';
						echo '</div>';
						
					}
					
				}
				
				?>
				
			</div>
			<div class="clear"></div>
		</div>	
	</div>
</div>

<?php get_footer(); ?>