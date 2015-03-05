<?php

/*Frontpage Custom Panel*/

$panels = get_field('panel');
$count = 1;

foreach($panels as $panel) {	
	
	$img = wp_get_attachment_image_src($panel['image'], 'medium');
	echo '<div class="panel'.($count == 3 ? ' panel-last' : '').'"><a href="'.$panel['page_link'].'"><img src="'.bfi_thumb($img[0], $params = array('width'=>320, 'height'=>200)).'" width="320" height="200" alt="'.$panel['title'].'" /></a><h2>'.$panel['title'].'</h2><p>'.$panel['text'].'</p></div>';
	$count++;

}

?>