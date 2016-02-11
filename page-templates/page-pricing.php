<?php
/**
 * Template Name: Pricing
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

//Taxonomy
$taxonomy = 'location';
// Which Location for Service
$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_post($parent[0]);
$pid = $first_parent;
$region = get_the_terms( $pid, 'location' );
// Term ID
$ID = $region[0]->term_id;
// page link of parent for the buttons below
$parentLink = get_page_link($pid);
?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<?php get_template_part('template-parts/signs-mobile'); ?>
			<?php get_template_part('template-parts/signs-horizonal'); ?>

		<div id="top"></div>

		<h1><?php the_title(); ?></h1>

		<?php

				/*

						Pricing Query 

				*/


				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'services',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'location', // your custom taxonomy
						'field' => 'term_id',
						'terms' => array( $ID ) // the terms (categories) you created
					)
				)
			));
			if ($wp_query->have_posts()) : 

				$shortDesc = get_field('short-description');

				?>

			<div class="content-area">

			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

					// link for title
					$title = get_the_title();
					//$link = sanitize_title_with_dashes($title);

                    $santiTitle = sanitize_title_with_dashes($title);
                    $priceNotes = get_field('pricing_notes');
                 
                    if($santiTitle == 'errand-service') {
                    	$link = $parentLink . 'services-pricing/home-care-errand-services/#' . $santiTitle;
                    } elseif($santiTitle == 'pet-taxi') {
                    	$link = $parentLink . 'services-pricing/home-care-errand-services/#' . $santiTitle;
                    } elseif($santiTitle == 'key-pick-updrop-off') {
                    	$link = $parentLink . 'services-pricing/home-care-errand-services/#' . $santiTitle;
                    } elseif($santiTitle == 'home-care') {
                    	$link = $parentLink . 'services-pricing/home-care-errand-services/#' . $santiTitle;
                    } else {
                    	$link = $parentLink . 'services-pricing/pet-sitting-dog-walking/#' . $santiTitle;
                    }
                    
?>			
						<div class="entry-content">
							<h2 class="pricing-title"><?php the_title(); ?></h2>
							<p class="readmore-service">
								<a href="<?php echo $link; ?>">Read More About this Service</a>
							</p>
						</div><!-- entry content -->
						<div class="clear"></div>
						
				<?php if( have_rows('service_pricing') ): ?>
					<?php while( have_rows('service_pricing') ): the_row(); 

						// Subfields
						$servDesc = get_sub_field('service_description');
						$servPrice = get_sub_field('service_pricing');

						// echo '<pre>';
						// print_r($servPrice);

				?>

						<div class="tablerow">
							<div class="serv-desc"><?php echo $servDesc; ?></div>
							<div class="serv-price"><?php echo $servPrice; ?></div>
						</div><!-- table row -->
					

					<?php endwhile; ?>
				<?php endif; ?>

				<?php echo $priceNotes; ?>

				

				<?php endwhile; ?>
				</div><!-- content area -->
			<?php endif; ?>


			<div class="widget-area">

				<div class="side-box sidebox-red">
					<div class="side-box-inner-link">
						<a href="#late-booking" class="inline">
							<h3>Late Booking Fee and Holidays</h3>
						</a>
					</div>
				</div><!-- sidebox -->

				<div style="display: none">
					<div id="late-booking">
						<?php the_field('services_pricing', 'option'); ?>
					</div>
				</div>


				<?php if( have_rows('pricing_reasons', 'option') ): ?>
				<div class="side-box sidebox-green">
					<div class="side-box-inner ">
						<h3>Why choose Little Friends Pet Sitting & Dog Walking?</h3>
						<ul>
							<?php while( have_rows('pricing_reasons', 'option') ): the_row(); 

								// Subfields
								$reason = get_sub_field('reason', 'option');

						?>

								<li class="paw-point" >
									<?php echo $reason; ?>
								</li>
							

							<?php endwhile; ?>
						</ul>
					</div><!-- sidebox inner -->
				</div><!-- sidebox -->
				<?php endif; ?>
			</div><!-- widget area sideaber -->


			

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->

<?php get_footer(); ?>