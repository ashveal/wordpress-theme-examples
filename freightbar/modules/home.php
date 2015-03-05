<?php

$page = get_page_by_title('Home');

echo '<div class="home-content">'.apply_filters('the_content',$page->post_content).'</div>';

if(get_the_post_thumbnail($page->ID)) {
	echo get_the_post_thumbnail($page->ID);	
}

?>