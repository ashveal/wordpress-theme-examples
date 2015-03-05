<?php

/*Display Social Media links*/

echo '<ul>';

$facebook = get_field('facebook_url','option');
if($facebook != '') {
	echo '<li><a href="'.$facebook.'" class="facebook" target="_blank"></a></li>';
}

$twitter = get_field('twitter_url','option');
if($twitter != '') {
	echo '<li><a href="'.$twitter.'" class="twitter" target="_blank"></a></li>';
}

$google = get_field('google_url','option');
if($google != '') {
	echo '<li><a href="'.$google.'" class="google" target="_blank"></a></li>';
}

echo '</ul>';
?>