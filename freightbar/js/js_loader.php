<?php

header("Content-type: application/x-javascript; charset: UTF-8");

$js = array(
	'vendor/bootstrap.min.js',
	'vendor/jquery.easing.1.3.js',
	'vendor/responsiveslides.min.js',
	'vendor/jquery.magnific-popup.min.js',
	'main.js'
);

$output = '';

foreach($js as $js_file) {
    $output .= file_get_contents($js_file);
}

echo $output;

?>