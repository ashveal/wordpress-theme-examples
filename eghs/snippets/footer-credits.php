<?php

$footer_copyright = get_field('footer_copyright','option');
if($footer_copyright != '') {
	echo $footer_copyright;
}

?>