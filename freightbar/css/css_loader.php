<?php

header("Content-type: text/css");

$css = array(
    'vendor/bootstrap.min.css',
    'vendor/bootstrap-responsive.min.css',
	//'http://fonts.googleapis.com/css?family=Cutive',
	'vendor/magnific-popup.css',
	'../style.css'
);

$output = '';

foreach ($css as $css_file) {
    $output .= file_get_contents($css_file);
}

echo $output;

?>