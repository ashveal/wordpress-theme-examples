<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/js/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/js/flexslider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/staff.css" />
	<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php
	if( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_register_script('modernizer', get_bloginfo('template_directory') . '/js/modernizr-2.6.1-respond-1.1.0.min.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'modernizer' );
	wp_register_script('magnific', get_bloginfo('template_directory') . '/js/jquery.magnific-popup.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'magnific' );
	wp_register_script('flexslider', get_bloginfo('template_directory') . '/js/jquery.flexslider.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'flexslider' );
	wp_register_script('customutils', get_bloginfo('template_directory') . '/js/utils.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'customutils' );
	wp_head();
	?>
	
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ur-2fb7f131-b24c-6997-2942-1463a05730c6", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="page">
		<header>	
			<?php include('snippets/sliders.php'); ?>
			<nav>
				<div class="container">
					<div class="logo">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" class="logo" /></a>
					</div>
					<div class="menu"><?php wp_nav_menu(array('theme_location'=>'primary','container'=>'ul','menu_class'=>'main-menu')); ?></div>
				</div>
			</nav>
		</header>