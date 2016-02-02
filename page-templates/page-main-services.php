<?php
/**
 * Template Name: Main Services
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

// //Taxonomy
// $taxonomy = 'location';

// // Which Location for Service
// $parent = array_reverse(get_post_ancestors($post->ID));
// $first_parent = get_post($parent[0]);
// $pid = $first_parent;
// $region = get_the_terms( $pid, 'location' );
// // Term ID
// $ID = $region[0]->term_id;

// // page link of parent for the buttons below
// $parentLink = get_page_link($pid);

?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<?php //get_template_part('template-parts/signs-horizonal'); ?>

		<div id="top"></div>

		<h1><?php the_title(); ?></h1>

		<div id="top-service-spacer"></div>

		<?php

				/*

						Services Query = Everything but => Medicaitons, Slumber Party

				*/


				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'services',
				'posts_per_page' => -1,
				'post__not_in' => array(
					'325', // Slumber Party
					'344',  // Medications
					),
				
			));
			if ($wp_query->have_posts()) : ?>

			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

					// Fields
					$shortDesc = get_field('short-description');
					$image = get_field('button');
					// echo '<pre>';
					// print_r($image);

					// For some reason it's returning the ID, not the array
					// Have triple checked the return value, so a mod is neccisarry.
					if (!is_array($image)) {
					  $image = acf_get_attachment($image);
					}
					if( $image != '' ) {
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];
					 	$size = 'large';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
					}
					$btnDesc = get_field('button_description');
					$priceNotes = get_field('pricing_notes');
					// link for title
					$title = get_the_title();
					$link = sanitize_title_with_dashes($title);

			?>

					<div class="content-area blocks">
						<a name="<?php echo $link; ?>"></a>
						<div class="entry-content">
							<h2><?php the_title(); ?></h2>
							<?php the_field('short-description'); ?>
							<?php //the_content(); ?>
						</div><!-- entry content -->
					
					</div><!-- content area -->

				<div class="service-side-area blocks">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
					<div class="back-to-top">
						<a href="#top">Back to top</a>
					</div>
				</div><!-- widget area -->

			<?php endwhile; ?>
			<?php endif; ?>

			<div class="clear"></div>

			 

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->

<?php get_footer(); ?>