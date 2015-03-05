<?php

$facebook_url = get_field('facebook_url','option');
$twitter_url = get_field('twitter_url','option');

echo '<div class="connect">Connect with us</div>';

if($twitter_url != '') {
	echo '<a class="twitter" href="'.$twitter_url.'" target="_blank"><span class="icon-twitter" aria-hidden="true"></span></a>';
}

if($facebook_url != '') {
	echo '<a class="facebook" href="'.$facebook_url.'" target="_blank"><span class="icon-facebook" aria-hidden="true"></span></a>';
}

echo '<div class="clear"></div>';

?>