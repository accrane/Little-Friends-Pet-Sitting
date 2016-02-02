<?php
/**
 * Template Name: Location Main
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
// page id, we are in the main location page here
$pid = get_the_ID();
$region = get_the_terms( $pid, 'location' );
// Term ID
$ID = $region[0]->term_id;
// Page link
$link = get_page_link($pid);
// Schedule a service
$sas = get_field('s_a_s','option');
?>
<div class="wrapper">
	<div id="primary" class=" ">
		<main id="main" class="" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<div class="location-main-welcome">
					<?php the_content(); ?>
				</div>

			<?php endwhile; // End of the loop.
			?>

			<div class="clear"></div>

			<div class="box-green new-client wow zoomIn pulse animated">
				<div class="btn-bird"></div>
				<a href="<?php echo $link . 'new-client-registration'; ?>">
					<h2>New Client?</h2>
					<p>Get started by <br>registering here!</p>
				</a>
			</div><!-- box green -->

			<div class="box-green existing-client wow zoomIn animated">
				<div class="btn-cat"></div>
				<a href="<?php echo $sas; ?>"  target="_blank">
					<h2>Already a Client?</h2>
					<p>Schedule a <br>Service!</p>
				</a>
			</div><!-- box green -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php

get_footer();
