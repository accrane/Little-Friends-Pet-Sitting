<?php
/**
 * Template Name: Your Location
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				//get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.

// Are we coming from the search?
if(isset($_GET['location'])) {
	$location = $_GET['location'];
} else {
	$location = 'not-from-search';
}

// find uppercase or lowercase
function in_array_case_insensitive($needle, $haystack) {
 return in_array( strtolower($needle), array_map('strtolower', $haystack) );
}

$taxonomies = array('location');

$args = array(
    'orderby'                => 'name',
    'order'                  => 'ASC',
    'hide_empty'             => true,
    'fields'                 => 'all',
    'name'                   => '',
    'slug'                   => '',
    'hierarchical'           => true,
    'search'                 => '',
    'child_of'               => 0,
    'parent'                 => '',
    'cache_domain'           => 'core',
    'update_term_meta_cache' => true,
    'meta_query'             => ''
); 
$terms = get_terms($taxonomies, $args);

$i = 0;	


// Create the Search Array
$searchArray = array();



// Reset my counter
$i = 0;	
// Loop Results
foreach( $terms as $term ) {
						
	$i++;
	$name = $term->name;
	$ID = $term->term_id;
	$link = get_term_link($ID);
	$cities = get_field('cities','location_' . $ID );
	

	// Run through the Cities
	if( have_rows('cities','location_' . $ID) ) :
		while( have_rows('cities','location_' . $ID) ) : the_row(); $i++;
			
			$cName = get_sub_field('city');
			// Add Cities to Search Array
			$searchArray[] = $cName;
			$searchArray[] = $term->name;

	
		endwhile;
	endif;
	

	// Run through the ZipCodes
	if( have_rows('zip_codes','location_' . $ID) ) :
		while( have_rows('zip_codes','location_' . $ID) ) : the_row(); $i++;
			
			$zip = get_sub_field('zip_code');
			// Add Zips to Search Array
			$searchArray[] = $zip;


		endwhile;
	endif;


	// Conditional to see if we have a match
	if (in_array_case_insensitive($location, $searchArray)) {

		// Region
		$relatedArea = get_field('related_region', 'location_' . $ID);
		echo '<div class="entry-content">';
	 	echo '<h2><strong>' . $location . '</strong> is in our Little Friends region of '. $term->name . '</h2>';
	 	echo '<div class="gottoregion"><a href="' . $relatedArea . '">Go</a></div>';
	 	echo '</div>';
	 	// set a variable if we got a match.
		$match = 'yes';
	 	break; // get outta here

	} else {
		// else start over and try again.
	 	unset($searchArray);
		$searchArray = array();
		$match = '';
	}


}

// If no match
if( $match !== 'yes' || $match = '' )	{ ?>

<div class="entry-content">
	<?php the_content(); ?>
</div>

<div class="search-locations-result">
<h3>Locations: </h3>

	<ul class="locations-list">
		<?php foreach( $terms as $term ) {
			
			$name = $term->name;
			$ID = $term->term_id;
			$link = get_term_link($ID);
			$cities = get_field('cities','location_' . $ID );
			// Region
			$relatedArea = get_field('related_region', 'location_' . $ID);
			
			$num = count($cities);
			$i = 0;

			if( have_rows('cities','location_' . $ID) ) :
				while( have_rows('cities','location_' . $ID) ) : the_row(); $i++;
					
					$cName = get_sub_field('city');


					echo '<li>';
					echo '<a href="' . $relatedArea . '">';
					echo $cName;
					if( $num > $i ) {echo ', ';}
					echo '</a>';
					echo '</li>'; 

				endwhile;
			endif;


			
		}
		?>
		
	</ul>


<?php }	// End if no Match ?>
</div><!-- search-locations-result -->



		

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->
<?php
//get_sidebar();
get_footer();
?>