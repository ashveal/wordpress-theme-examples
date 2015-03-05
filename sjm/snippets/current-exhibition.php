<?php

$args = array(
	'post_type' => 'exhibition',
	'orderby' => 'rand',
	'order' => 'ASC',
	'posts_per_page' => 1
);

$query = new WP_Query($args);

// The Loop
if($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		echo '<div class="exhibition-sidebar hidden-xs">';
		$img = wp_get_attachment_image_src(get_field('image'), 'medium');
		echo '<a href="'.get_permalink().'"><img src="'.$img[0].'" alt="'.get_the_title().'" class="img-responsive" /></a>';
		echo '<div class="caption">';
		echo '<h4>CURRENT EXHIBITION</h4>';
		echo '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
		echo '</div>';
		echo '</div>';
	}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>