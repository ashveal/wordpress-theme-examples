<?php
/**
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <link href='http://fonts.googleapis.com/css?family=Cutive' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
    
    <!-- Google Analytics -->
    <script>
        /*var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-39495429-1']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();*/
    </script>
</head>

<body <?php body_class(); ?>>

    <div id="page">
    	<div id="page-container" class="container">
        	<div class="row">
            	<div class="span12">
                	<div id="header-wrapper">
                        <p class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php echo bloginfo('name'); ?>" /></a></p>
                        <div class="social-media">
                            <p class="icons">
                                <a href="https://twitter.com/FreightBar" target="_blank" class="twitter" title="Twitter">Twitter</a>
                                <a href="https://facebook.com/FreightBar" target="_blank" class="facebook" title="Facebook">Facebook</a>
                                <a href="http://instagram.com/freightbar" target="_blank" class="instagram" title="Instagram">Instagram</a>
                                <a href="http://www.freightbar.com.au/home/feed" target="_blank" class="rss last" title="RSS">RSS</a>				
                            </p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    
                    <div class="line-holder<?php echo (!is_front_page() ? ' line-holder-top' : ''); ?>">
                        <div class="line"></div>
                    </div>
                    
                    <div id="<?php echo (!is_front_page() ? 'menu-wrapper-sub' : 'menu-wrapper'); ?>">
                        <?php 
						if(is_front_page()) { //banners
							get_template_part('modules/banners','home');
						}
						?>
                        <div id="menu"<?php echo (!is_front_page() ? ' class="sub"' : ''); ?>>
                            <?php wp_nav_menu(array('theme_location'=>'primary','menu_class'=>'nav-menu')); ?>
                        </div>
                    </div>
                    
                    <div class="line-holder<?php echo (!is_front_page() ? ' line-holder-bottom' : ''); ?>">
                        <div class="line"></div>
                    </div>
                    
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="span8">
                                <div id="content"<?php echo (!is_front_page() ? ' class="content-sub"' : ''); ?>>