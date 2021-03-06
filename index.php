<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>




<div class="wrapper">
	<div class="friends-group">My Friends</div>
</div><!-- wrapper -->

<div class="find-locations">

	<div class="wrapper">
		<div class="find-your-location find-your-location-home left">
			<h3>Enter your zip code to schedule a service or register as a new client!</h3>
			<!-- <p></p> -->
		</div><!-- find your location -->

		<?php //get_template_part('template-parts/find-location'); ?>
		<div class="zip-search right">
			<?php $action = get_bloginfo('url') . '/your-location/'; ?>
			<form action="<?php echo $action ?>" method="get">
			  <input class="zipsearch" type="text" name="location" placeholder="<?php echo esc_attr_x( 'Enter your zip code', 'placeholder' ) ?>" >
			  <input class="submit" type="submit" value="Submit">
			</form>
		</div><!-- zip search -->

	</div><!-- wrapper -->

</div><!-- find locations -->
		

		<div class="wrapper">
			<div class="home-content">

			<h2>News &amp; Information</h2>

			<div class="clear"></div>

			<div class="home-map">
				<a href="<?php bloginfo('url'); ?>/locations">
					<img src="<?php bloginfo('template_url'); ?>/images/map-small.png" />
				</a>
			</div><!-- home map -->


			<!--<div class="box-green new-client wow zoomIn pulse animated">
				<div class="btn-bird"></div>
				<a href="<?php echo get_bloginfo('url') . 'join-our-team'; ?>">
					<h2>Join Our Team</h2>
				</a>
			</div> box green -->

			<div class="divider">
			</div><!-- divider -->

			<div class="home-home-news">
				<?php get_template_part('template-parts/home-news'); ?>
			</div><!-- home-home-news -->
			
		</div><!-- home content -->
	</div><!-- wrapper -->



<?php
get_footer();
