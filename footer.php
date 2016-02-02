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
</body>

</html>
