<?php

$footer_contact = get_field('footer_contact','option');
if($footer_contact != '') {
	echo $footer_contact;
}

?>