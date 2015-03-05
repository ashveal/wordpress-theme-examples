	</div> <?php //mobile-overflow-wrapper ?>
        <footer>
        
            <div class="container">
            	<a class="btn-expand" href="#"></a>
            </div>
            
            <div class="container">

	           <div class="footer-top">
	            	<div class="row">
	            		<div class="col-xs-12 col-sm-8 col-md-8">
	            			<ul class="buttons">
	            				<li>
	            					<a href="/privacy-statement" class="privacy"></a>
	            				</li>
	            				<li>
	            					<a href="/contact-us/feedback" class="contact"></a>
	            				</li>
	            				<li>
	            					<a href="/contact-us" class="location"></a>
	            				</li>
	            			</ul>
	            		</div>
	            		<div class="col-xs-12 col-sm-4 col-md-4">
	            			<div class="social">
	            				<?php include('snippets/footer-social.php'); ?>
	            			</div>
	            		</div>
	            	</div>
	           </div>
            	
            	<div class="footer-menu">
            		<div class="row">
	            		<div class="col-xs-6 col-sm-3 col-md-2">
	            			<?php wp_nav_menu(array('theme_location'=>'footer-one','menu_class'=>'footer-menu')); ?>
	            		</div>
	            		<div class="col-xs-6 col-sm-3 col-md-2">
	            			<?php wp_nav_menu(array('theme_location'=>'footer-two','menu_class'=>'footer-menu')); ?>
	            		</div>
	            		<div class="col-xs-6 col-sm-3 col-md-2">
	            			<?php wp_nav_menu(array('theme_location'=>'footer-three','menu_class'=>'footer-menu')); ?>
	            		</div>
	            		<div class="col-xs-6 col-sm-3 col-md-2">
	            			<?php wp_nav_menu(array('theme_location'=>'footer-four','menu_class'=>'footer-menu')); ?>
	            		</div>
	            		<div class="col-xs-12 col-sm-12 col-md-4">
	            			<div class="search">
	            				<?php include('snippets/search.php'); ?>
	            			</div>
	            			<div class="contact">
	            				<?php include('snippets/footer-contact.php'); ?>
	            			</div>
	            			<div class="logo"></div>
	            		</div>
            		</div>
            	</div>
            	
            	<div class="footer-bottom">
	            	<div class="row">
	            		<div class="col-xs-12">
	            			<?php include('snippets/footer-credits.php'); ?>
	            		</div>
	            	</div>	
            	</div>

            </div>
        </footer>
    	
    </div><!--#page-->
    
</div><?php //mobilewrap ?>

<?php wp_footer(); ?>

</body>
</html>