<?php
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
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

	<div id="mobilewrap">

	<?php include('snippets/splash.php'); ?>

    <div id="page">
    
    <?php include('snippets/mobile_menu.php'); ?>
        
      
       
    	<header>
        	<div class="container">
            	<div class="row">
                	<div class="col-xs-2 col-sm-1 col-md-4">                   
                    	<a href="#" class="menu-mobile" id="mobile_toggle"></a> 
                    	<div class="logo">
                    		<a href="<?php echo home_url( '/' ); ?>" class="logo"></a>
							<h3>improving the health of our community</h3>
                    	</div>
                    	
                    	    
                    </div>
                    <div class="col-xs-8 col-sm-10 col-md-1 logomobile">
                    <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-mobile.png" alt="logo-mobile" width="435" height="25"></a></div>
                    <div class="col-xs-2 col-sm-1 col-md-8">                   
                         <ul class="icons">
                         	<li>
                         		<div class="icon green"><div><h3>Integrity</h3><p>We value integrity, honesty and respect in all&nbsp;relationships.</p></div></div>
                         	</li>
                         	<li>
                         		<div class="icon orange"><div><h3>Excellence</h3><p>We value excellence as the appropriate standard for all services and&nbsp;practices.</p></div></div>
                         	</li>
                         	<li>
                         		<div class="icon red"><div><h3>Community</h3><p>We respect the dignity and rights of our community and acknowledge their beliefs, regardless of their cultural, spiritual or socioeconomic&nbsp;background.</p></div></div>
                         	</li>
                         	<li>
                         		<div class="icon blue"><div><h3>Working Together</h3><p>We value equally all people who make acontribution to EGHS to achieve shared&nbsp;goals.</p></div></div>
                         	</li>
                         	<li>
                         		<div class="icon grey"><div><h3>Learning Culture</h3><p>We strive to continually learn and develop through education, training, mentoring and by teaching&nbsp;others.</p></div></div>
                         	</li>
                         </ul>
                         <a href="<?php echo home_url( '/' ); ?>" class="home-mobile"></a> 
                    </div>
                </div>
        	</div>
        	<div id="menu-wrapper">
        		<div class="container">
        			<div class="row">
                		<div class="col-xs-12">
                			<?php include('snippets/menu.php'); ?>
							<div class="clear"></div>  
						</div>
					</div>
        		</div>
        	</div>
        	
        	<div id="colour-wrapper"></div>
        </header>
        
        <div id="mobile-overflow-wrapper"> 
        
        <div id="mobiletop">
	        <ul class="mainbuttons">
	    			<li><a href="/services" class="services">Our<br/>Services</a></li>
	    			<li><a href="/employment" class="employment">Careers<br/>Employment</a></li>
	    			<li><a href="/services/ararat/pyrenees-house" class="pyrenees">Pyrenees<br/>House</a></li>
	    			<li><a href="/donations" class="donations">Donations<br/>& Bequests</a></li>
	    			<li><a href="/foundation" class="foundation">EGHS<br/>Foundation</a></li>
	    		</ul>
        </div>
        
        