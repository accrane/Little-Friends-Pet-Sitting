<?php
/**
 * Template Name: Home Care, Errand Main
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

		
		<a name="top"></a>

		<h1><?php the_title(); ?></h1>

		<div id="top-service-spacer"></div>

		<?php
				/*

						Button Query

				*/

				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'services',
				'posts_per_page' => -1,
				'post__not_in' => array(
					'325', // Slumber Party
					'344',  // Medications
					'315',  // Pet Sitting
					'2318',  // Dog Walking
					),
				// 'tax_query' => array(
				// 	array(
				// 		'taxonomy' => $taxonomy, // your custom taxonomy
				// 		'field' => 'term_id',
				// 		'terms' => array( $ID ) // the terms (categories) you created
				// 	)
				// )
			));
				$i = 0;
			if ($wp_query->have_posts()) : ?>

			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
					$i++;

					$boxColor = get_field('box_color');

					if( $boxColor == 'Light Blue' ) {
						$btnClass = 'btn-blue';
					} elseif( $boxColor == 'Yellow' ) {
						$btnClass = 'btn-yellow';
					} elseif( $boxColor == 'Red' ) {
						$btnClass = 'btn-red';
					} elseif( $boxColor == 'Green' ) {
						$btnClass = 'btn-green';
					} elseif( $boxColor == 'Purple' ) {
						$btnClass = 'btn-purple';
					} else {
						$btnClass = 'btn-dark-blue';
					}

					$image = get_field('button');
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

					$title = get_the_title();
					$link = sanitize_title_with_dashes($title);


			?>

			<div class="service-btn <?php echo $btnClass; ?>   wow zoomIn animated"  data-wow-duration=".2s">
				<a href="#<?php echo $link ?>">
					<div class="service-btn-image">
						<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
					</div>
					<h3 class="small"><?php echo $title; ?></h3>
				</a>
			</div><!-- service btn -->

			<?php 
			endwhile; 
			endif; 
			rewind_posts(); ?>
			

			<?php

				/*

						Pricing Query = Excludes Pet Sitting and Dog Walking

				*/


				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'services',
				'posts_per_page' => -1,
				'post__not_in' => array(
					'325', // Slumber Party
					'344',  // Medications
					'315',  // Pet Sitting
					'2318',  // Dog Walking
					),
				// 'tax_query' => array(
				// 	array(
				// 		'taxonomy' => 'location', // your custom taxonomy
				// 		'field' => 'term_id',
				// 		'terms' => array( $ID ) // the terms (categories) you created
				// 	)
				// )
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
							<div class="entry-content">
								<h2  id="<?php echo $link; ?>" class="anchor"><?php the_title(); ?></h2>
								<?php 

								//the_field('short-description'); 
								the_content();
								?>
							</div><!-- entry content -->
					

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

				</div><!-- content area -->

				<div class="service-side-area blocks">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
					<div class="back-to-top">
						<a href="#top">Back to top</a>
					</div>
				</div><!-- widget area -->


				<div class="paw-row"></div><!-- paw row -->

			<?php endwhile; ?>
			<?php endif; ?>

			<div class="clear"></div>

			<div class="entry-content">
				<h3 class="black">Other Services</h3>
			</div><!-- entry content -->


			<?php
			/*
					Final Query for the last 2 buttons


			*/
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'services',
				'posts_per_page' => -1,
				'post__in' => array(
					'315',  // Pet Sitting
					'2318',  // Dog Walking
					),
				// 'tax_query' => array(
				// 	array(
				// 		'taxonomy' => $taxonomy, // your custom taxonomy
				// 		'field' => 'term_id',
				// 		'terms' => array( $ID ) // the terms (categories) you created
				// 	)
				// )
			));
				$i = 0;
			if ($wp_query->have_posts()) : ?>
			<div class="bottom-btns">
			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

					$boxColor = get_field('box_color');

					if( $boxColor == 'Light Blue' ) {
						$btnClass = 'btn-blue';
					} elseif( $boxColor == 'Yellow' ) {
						$btnClass = 'btn-yellow';
					} elseif( $boxColor == 'Red' ) {
						$btnClass = 'btn-red';
					} elseif( $boxColor == 'Green' ) {
						$btnClass = 'btn-green';
					} elseif( $boxColor == 'Purple' ) {
						$btnClass = 'btn-purple';
					} else {
						$btnClass = 'btn-dark-blue';
					}

					$image = get_field('button');
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

					$title = get_the_title();
					$santiTitle = sanitize_title_with_dashes($title);
					$link = $parentLink . 'services-pricing/pet-sitting-dog-walking/#' . $santiTitle;

			?>
				<div class="service-btn <?php echo $btnClass; ?> wow zoomIn animated"     data-wow-duration=".2s">
					<a href="<?php echo $link ?>">
						<div class="service-btn-image">
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
						</div>
						<h3 class="small"><?php echo $title; ?></h3>
					</a>
				</div><!-- service btn -->

			<?php endwhile; ?>
		</div><!-- bottom btns -->
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->

<?php get_footer(); ?>