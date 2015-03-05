<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Freight_Bar
 * @since Freight Bar 1.0
 */
?>

<div class="hours">
	<h2>OPENING HOURS</h2>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
    	<tr>
        	<td>Monday -</td>
            <td>Closed</td>
        </tr>
        <tr>
        	<td>Tuesday -</td>
            <td>9am - 9pm</td>
        </tr>
        <tr>
        	<td>Wednesday -</td>
            <td>9am - 9pm</td>
        </tr>
        <tr>
        	<td>Thursday -</td>
            <td>9am - 9pm</td>
        </tr>
        <tr>
        	<td>Friday -</td>
            <td>9am - late</td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
        	<td>Saturday -</td>
            <td>9am - late</td>
        </tr>
        <tr>
        	<td>Sunday -</td>
            <td>9am - late</td>
        </tr>
	</table>
</div>

<div class="contact">
	<h2>CONTACT</h2>
    <p>Corner of Mair and Lydiard St<br />
    Ballarat VIC 3350</p>
	<p>Ph: (03) 5333 3333</p>
    <p>Email: <a href="mailto:info@freightbar.com.au">info@freightbar.com.au</a></p>
</div>

<div class="social">
	<h2>WHAT'S HAPPENING ON<br />SOCIAL MEDIA?</h2>
		<p><a href="#" class="toggle selected">Facebook</a> | <a href="#" class="toggle">Twitter</a></p>
    <?php
    include('./social/social.html');
    ?>
</div>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>