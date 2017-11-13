<?php
/**
 * Template Name: Services Main
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

			<div class="entry-content">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="service-signs-vertical">
				<?php get_template_part('template-parts/signs-vertical'); ?>
			</div><!-- service signs -->

			<?php
			/*
					Query for the large 2 buttons


			*/
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'services',
				'posts_per_page' => -1,
				// 'post__in' => array(
				// 	'315',  // Pet Sitting
				// 	'2318',  // Dog Walking
				// 	),
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

			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); $i++;

					$boxColor = get_field('box_color');

					if( $boxColor == 'Light Blue' ) {
						$btnClass = 'box-blue';
					} elseif( $boxColor == 'Yellow' ) {
						$btnClass = 'box-yellow';
					} elseif( $boxColor == 'Red' ) {
						$btnClass = 'box-red';
					} elseif( $boxColor == 'Green' ) {
						$btnClass = 'box-green';
					} elseif( $boxColor == 'Purple' ) {
						$btnClass = 'box-purple';
					} else {
						$btnClass = 'box-dark-blue';
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
					$shortDesc = short_desc_excerpt();
					$santiTitle = sanitize_title_with_dashes($title);
					$link = $parentLink . 'pet-sitting-dog-walking/#' . $santiTitle;

					if($i == 1) {
						$margin = 'firstbox';
					} else {
						$margin = 'secondbox';
					}

			?>
				<div class="service-btn <?php echo $btnClass . ' ' . $margin; ?>">
					<a href="<?php echo $link ?>">
						<h3 class="big"><?php echo $title; ?></h3>
						<?php if($shortDesc != '') {
							echo '<div class="shortdesc">'.$shortDesc.'</div>';
						} ?>
						<div class="service-btn-image">
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
						</div>
						
						<div class="learn-more-services">
							Learn more about <?php echo $title; ?> services
						</div>

					</a>
				</div><!-- service btn -->

			<?php endwhile; ?>
		<?php endif; ?>

			<?php get_template_part('template-parts/btn-query-4'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php

get_footer();
