<?php
/**
 * Template Name: Sitters
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

// Which Location for Blog
$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_post($parent[0]);
$pid = $first_parent;
$region = get_the_terms( $pid, 'location' );
// Term ID
$ID = $region[0]->term_id;

// Our Region
$region = get_the_terms( $pid, 'location' );
$urlParam = sanitize_title_with_dashes($region[0]->name);
?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">


<?php

//			Query First for anchorLinks


    $wp_query = new WP_Query();
    $wp_query->query(array(
        'post_type'=>'sitters',
        'posts_per_page' => -1,
        'meta_key' => 'pet_or_sitter',
        'meta_value' => 'sitter',
		'orderby' => 'title', 
		'order' => 'ASC',
		'tax_query' => array(
					array(
						'taxonomy' => 'location', // your custom taxonomy
						'field' => 'term_id',
						'terms' => array( $ID ) // the terms (categories) you created
					)
				)
    ));
    if ($wp_query->have_posts()) : ?>
    <a name="<?php echo 'top'; ?>"></a>
        <div class="the-sitters-list">
            <ul>
            
            <?php while ($wp_query->have_posts()) : ?>
            <?php $wp_query->the_post(); ?>  
            
            <?php 
            // need some variables
                $anchorLinks = get_the_title($wp_query->post_title);
                $sanitized =  sanitize_title_with_dashes($anchorLinks);
            ?>            
                        
               <li><a href="#<?php echo $sanitized ?>"><?php the_title(); ?></a></li>         
                        
            <?php endwhile;   ?> 
            </ul>
        </div><!-- the sitters -->          
    <?php endif;   ?>
    
    <div class="clear"></div>

<?php


//			Now Query for actual Sitters
				$i=0;

				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'sitters',
				'posts_per_page' => -1,
				'meta_key' => 'pet_or_sitter',
		        'meta_value' => 'sitter',
				'orderby' => 'title', 
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'location', // your custom taxonomy
						'field' => 'term_id',
						'terms' => array( $ID ) // the terms (categories) you created
					)
				)
			));
			if ($wp_query->have_posts()) : ?>

			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); $i++;

				
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

				if( $cardColor == 'green-card') {
					$color = 'green-card';
				} elseif( $cardColor == 'orange-card') {
					$color = 'orange-card';
				} elseif( $cardColor == 'purple-card') {
					$color = 'purple-card';
				} elseif( $cardColor == 'red-card') {
					$color = 'red-card';
				}

				// counter
				if( $i == 2 ) {
					$sittterClass = 'sitter-card-right';
					$i=0;
				} else {
					$sittterClass = 'sitter-card-left';
				}

			?>	



<div class="sitter-card <?php echo $cardColor ?> <?php echo $sittterClass ?> blocks  wow zoomIn animated"     data-wow-duration=".3s">
	<div class="cardinner">
	<div class="backtotop"><a href="#top">top</a></div>

	<a name="<?php echo $sanitized ?>"></a>

	<div class="sitter-card-name"><?php the_title(); ?></div>

		<div class="card-contents">
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
					<span class="pets-sum"><?php echo sitter_pets_excerpt() ?></span>
				</div><!-- hometown -->
			<?php endif; ?>
			<?php if( $funFacts != '' ) : ?>
				<div class="funfacts">
					<span class="pets-title">Fun Facts:</span><br>
					<span class="pets-sum"><?php echo sitter_funfact_excerpt() ?></span>
				</div><!-- hometown -->
			<?php endif; ?>
			<?php if( $bio != '' ) : ?>
				<div class="other">
					<span class="pets-title">Bio:</span><br>
					<span class="pets-sum"><?php echo sitter_field_excerpt() ?></span>
				</div><!-- hometown -->
			<?php endif; ?>

			<div class="more">
				<?php echo '<a href="' . esc_url( get_permalink() . '?location=' . $urlParam ) . '" rel="bookmark">', '</a>'; ?>
			</div>

		</div><!-- card contents -->
	</div><!-- card inner -->
</div><!-- sitter card --> 

				

				<?php endwhile; // End of the loop. ?>
				
				<div class="sitter-bottom">
					This div will push the bottom so the last card is not on top of the dog bowl
				</div><!-- sitter bottom -->
				
				<?php pagi_posts_nav(); ?>
			<?php endif; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php

get_footer();
