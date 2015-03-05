<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/html5shiv.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>

    <div id="page">
        
    	<header>
        	<div id="header-menu-wrapper">
        		<div class="container">
        			<div class="row">
                		<div class="col-xs-12 col-md-6"></div>
                		<div class="col-xs-12 col-md-6">
                			<div class="header-menu">
	                			<div class="menu">
	                				<?php wp_nav_menu(array('theme_location'=>'header','menu_class'=>'header-menu')); ?>
	                			</div>
								<div class="search">
		            				<?php include('snippets/search.php'); ?>
		            			</div>
		            			<div class="clear"></div>
                			</div>
	            			<div class="clear"></div>  
						</div>
					</div>
        		</div>
        	</div>
        	<div id="main-menu-wrapper">
        		<div class="container">
        			<div class="row menu-row">
                		<div class="col-xs-12 col-sm-4 col-md-6">
                			<div class="logo">
                    			<a href="<?php echo home_url( '/' ); ?>" class="logo"></a>
							</div>
						</div>
                		<div class="col-xs-12 col-sm-8 col-md-6 mobile-menu menu-container">
                			<?php include('snippets/menu.php'); ?>
							<div class="clear"></div>  
						</div>
					</div>
        		</div>
        	</div>
        	<div id="sub-menu-wrapper" class="hidden-xs">
        		<!--<div class="container">
        			<div class="row">
                		<div class="col-xs-12">
                			<?php simple_section_nav('before_widget=<div class="submenu">&after_widget=<div class="clear"></div></div>'); ?>
						</div>
					</div>
        		</div>-->
        	</div>
        	<div id="donation-wrapper" class="hidden-xs">
				<div class="container">
        			<a href="#" class="donation">Donate to SJM</a>
				</div>
        	</div>
        </header>