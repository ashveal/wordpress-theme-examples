        <div id="social-wrapper">
        	<div class="container">
        		<div class="row">
        			<div class="col-xs-12 col-sm-6">
        				<div class="social">
	            			<a href="#page" id="back-to-top"><span class="icon-arrow-up" aria-hidden="true"></span></a>
	            			<?php include('snippets/footer-social.php'); ?>
	            		</div>	
        			</div>
        			<div class="col-xs-12 col-sm-6">
        				<?php include('snippets/footer-subscribe.php'); ?>
        			</div>
        		</div>
        	</div>
        </div>
        
        <footer>
            <div class="container">
               	       	
            	<div class="footer-menu">
            		<div class="row">
	            		<div class="col-xs-12 col-sm-3">
	            			<div class="contact hidden-xs">
	            				<?php include('snippets/footer-contact.php'); ?>
	            			</div>
	            		</div>
	            		<div class="col-xs-12 col-sm-3">
	            			<div class="menu">
	            				<?php wp_nav_menu(array('theme_location'=>'footer','menu_class'=>'footer-menu')); ?>
	            			</div>
	            		</div>
	            		<div class="col-xs-12 col-sm-6"></div>
            		</div>
            	</div>
            	
            	<div class="footer-bottom">
	            	<div class="row">
	            		<div class="col-xs-12 col-sm-6">
	            			<div class="logos">
	            				<a href="http://www.nab.com.au" class="nab"></a>
	            				<a href="http://www.jca.org.au/" class="jca"></a>
	            				<div class="clear"></div>
	            			</div>
	            		</div>
	            		<div class="col-xs-12 col-sm-6">
	            			<div class="footer-main-menu hidden-xs hidden-sm">
	            				<?php wp_nav_menu(array('theme_location'=>'primary','menu_class'=>'main-menu','depth'=>1)); ?>	
								<div class="clear"></div>
	            			</div>
	            		</div>
	            	</div>	
            	</div>

            </div>
        </footer>
    	
    </div><!--#page-->

<?php wp_footer(); ?>

</body>
</html>