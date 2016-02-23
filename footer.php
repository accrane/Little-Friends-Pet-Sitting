<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

// Get the URL we are on to pull the right page footer
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if( !is_front_page() ) :
	if ( strpos($url,'services-pricing') !== false && !is_front_page() ) {
	    get_template_part('template-parts/footer-services');
	} else {
	    get_template_part('template-parts/footer-bowl');
	}
endif;


$phone = get_field('phone_number', 'option');
$email = get_field('site_email', 'option'); 
$sitemap = get_field('sitemap_link', 'option'); 
$spambot = antispambot($email);

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				
				<?php 

				wp_reset_query();
				/*
					Here is the array key for the header-main-pages
					2266 = services
					665 = sitemap
					13 = getting started
					2010 = new client registration
					2257 = who we are
					2270 = locations
					2713 = paws for giving
					2259 = who we are / overview
					65 = who we are / customer service
					2 = who we are / owners and managment
					2933 = Your location
					2936 = Contact Us
					210 = new client registration
					15 = main blog
				*/
				if( is_front_page() || is_page( array(2266, 665, 13, 2010, 2257, 2270, 2, 65, 2259, 2713, 2933, 2936, 210, 15) ) ) {
						get_template_part('footer-main');
					} else {
						get_template_part('footer-locations');
				    } 

				?>




				

			</div><!-- .site-info -->

			

			<div class="footer-creds">
				<?php echo $phone . ' | All Rights Reserved | <a href="mailto:' . $spambot . '">' . $spambot . '</a> | <a href="'. $sitemap .'">sitemap</a> | Site By <a href="http://bellaworksweb.com" target="_blank">Bellaworks</a>'; ?>
			</div><!-- footer creds -->

	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('google_analytics_code', 'option'); ?>
<!-- Begin Mongoose Metrics Tracking Code -->
<script type="text/javascript">
var mm_c = 'EEDD360A2DD820B93F7F8168F509AE43';
var mm_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + mm_protocol + "www.mongoosemetrics.com/jsfiles/js-correlation/mm-getvar.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
/* Custom Parameters */
/* MANDATORY default_number Setup Parameter DO NOT REMOVE */
var default_number='7043408102'; /* 10 Digits Only i.e. 8881234567 */

/* Custom Parameters */

</script>
<script type="text/javascript">
document.write(unescape("%3Cscript src='" + mm_protocol + "www.mongoosemetrics.com/jsfiles/js-correlation/mm-control.php%3F" + mm_variables + "' type='text/javascript'%3E%3C/script%3E"));
</script>
<!-- End Mongoose Metrics Tracking Code -->
</body>

</html>
