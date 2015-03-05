<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		<div id="brands">
			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/img/brands.png" alt="<?php bloginfo('name'); ?>" />
			</div>
		</div>
		
		<footer>
			<div class="container">
				<nav>
					<div class="menu">
						<?php wp_nav_menu(array('theme_location'=>'footer','container'=>'ul','menu_class'=>'')); ?>
					</div>
					<div class="social">
						<div class="follow">
							<p>Follow us</p>
							<?php include('snippets/social_media.php'); ?>
						</div>
						<div class="share">
							<p>Share</p>
							<span class='st_facebook_hcount' displayText='Facebook'></span>
							<span class='st_twitter_hcount' displayText='Tweet'></span>
							<span class='st_googleplus_hcount' displayText='Google +'></span>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</nav>
				<div class="copyright">
					<?php
					if(get_field('footer_text','option') != '') {
						echo get_field('footer_text','option');
					}
					?>
				</div>
			</div>
		</footer>
		
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>