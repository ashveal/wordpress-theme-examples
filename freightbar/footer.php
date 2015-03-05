<?php
/**
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
?>    
                    			</div><!-- #content -->
                            </div> 
                            <div class="span4 no-margin">
                                <div id="sidebar">
                                    <?php get_sidebar(); ?>
                                </div>
                            </div>       
                        </div>   
                    </div>
                    
                    <div class="line-holder">
                        <div class="line"></div>
                    </div>
                    
                    <div id="footer-wrapper">
                        <div class="banner">
                        	<img src="<?php echo get_template_directory_uri(); ?>/img/footer-banner.png" alt="Taking function bookings now" />
                        </div>
                        <div class="copyright">
                            <p align="center">Copyright &copy; <?php echo bloginfo('name'); ?> - Designed by <a href="http://www.cressaid.com.au" target="_blank">Cressaid Logic</a> - Built by <a href="http://www.launchinteractive.com.au" target="_blank">Launch Interactive</a></p>
                        </div>
                    </div>
                    
                </div>
			</div>
		</div>
    </div><!-- #page -->

<?php wp_footer(); ?>

<!-- Custom Functions -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/js_loader.php"></script>

</body>
</html>