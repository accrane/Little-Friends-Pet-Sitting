<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

// Are we coming from the featured Sitter
$isFeat = $_GET['featured'];

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

				$anchorLinks = get_the_title($wp_query->post_title);
                $sanitized =  sanitize_title_with_dashes($anchorLinks);
				$petOrSitter = get_field('pet_or_sitter');
				$cardColor = get_field('card_color');
				$image = get_field('picture');
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
			 	$size = 'sitter';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
				$hometown = get_field('hometown');
				$pets = get_field('pets');
				$funFacts = get_field('fun_facts');
				$bio = get_field('bio');
				$petBio = get_field('pet_bio');
				$petBioShort = get_field('pet_bio_short_descripton');
				$sitterLongBio = get_field('sitter_long_bio');

				
				//echo $isFeat;
				

					?>
			<div class="entry-content">
				<h1><?php the_title(); ?></h1>
			</div>
				
			<?php if( $isFeat !== 'Y' ) : ?>
				<div class="card-pic"><img src="<?php echo $thumb ?>" /></div>

				
				<?php if( $hometown != '' ) : ?>
					<div class="hometown">
						<span class="pets-title">Hometown:</span><br>
						<span class="pets-sum"><?php echo $hometown; ?></span>
					</div><!-- hometown -->
				<?php endif; ?>
				<?php if( $pets != '' ) : ?>
					<div class="pets">
						<span class="pets-title">Pets:</span><br>
						<span class="pets-sum"><?php echo $pets ?></span>
					</div><!-- hometown -->
				<?php endif; ?>
				<?php if( $funFacts != '' ) : ?>
					<div class="funfacts">
						<span class="pets-title">Fun Facts:</span><br>
						<span class="pets-sum"><?php echo $funFacts ?></span>
					</div><!-- hometown -->
				<?php endif; ?>
				<?php if( $bio != '' ) : ?>
					<div class="other">
						<span class="pets-title">Bio:</span><br>
						<span class="pets-sum"><?php echo $bio ?></span>
					</div><!-- hometown -->
				<?php endif; ?>
				

			<?php endif; ?>

			<?php if( $sitterLongBio != '' ) : ?>
				<div class="other">
					<span class="pets-sum"><?php echo $sitterLongBio ?></span>
				</div><!-- hometown -->
			<?php endif; ?>

			<?php if($petOrSitter == 'pet') { ?>
				<div class="other">
					<span class="pets-sum"><?php echo $petBio ?></span>
				</div><!-- hometown -->
			<?php } ?>

			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
</div><!-- wrapper -->
<?php get_footer(); ?>
