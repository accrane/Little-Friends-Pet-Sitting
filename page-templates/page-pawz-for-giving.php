<?php
/**
 * Template Name: Pawz for Giving
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *\
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
$urlParam = sanitize_title_with_dashes($region[0]->name);
?>


<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
			<div class="paw-row"></div>

			<section id="sponsored-drives">
			<h1><?php _e( 'Sponsored Drives', 'acstarter' ); ?></h1>

			    <?php
		        $wp_query = new WP_Query();
		        $wp_query->query(array(
		        'post_type'=>'post',
		        'posts_per_page' => 1,
		        'paged' => $paged,
		        'tax_query' => array(
		            array(
		                'taxonomy' => 'category', // your custom taxonomy
		                'field' => 'id',
		                'terms' => array( 37 ) // the terms (categories) you created
		            )
		        )
		    ));
		    if ($wp_query->have_posts()) : ?>
		    <?php while ($wp_query->have_posts()) : ?>
		    <?php $wp_query->the_post(); ?> 

		      
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() . '?location=' . $urlParam ) . '" rel="bookmark">', '</a></h2>' ); ?>
		        <?php the_excerpt(); ?>

		        <div class="more">
		            <a href="<?php echo get_permalink() . '?location=' . $urlParam; ?>">read more</a>
		        </div>

		    <?php endwhile; endif; wp_reset_postdata(); ?>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php 
// if is main pawz for giving page
if( is_page(2713) ) {
	get_template_part('template-parts/sidebar-pawz-main');
// else the pawz for giving location pages.
} else {
	get_template_part('template-parts/sidebar-pawz-location');
}


?>
	

</div><!-- wrapper -->
<?php
//get_sidebar();
get_footer();
