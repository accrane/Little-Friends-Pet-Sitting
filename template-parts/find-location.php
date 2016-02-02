<?php 
// $search = $_GET['location-name'];
// if($search == 'go') {
// 	echo 'Yeha buddy';
// }
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

// Loop Results
foreach( $terms as $term ) {
						
	$name = $term->name;
	$ID = $term->term_id;
	$link = get_term_link($ID);
	$cities = get_field('cities','location_' . $ID );
	// Region
	$relatedArea = get_field('related_region', 'location_' . $ID);
	// echo '<pre>';
	// print_r($relatedArea);
	// echo '</pre>';
	
	// echo '<pre>';
	// print_r($cities);
	$num = count($cities);
	$i = 0;

	if( have_rows('cities','location_' . $ID) ) :
		while( have_rows('cities','location_' . $ID) ) : the_row(); $i++;
			
			$cName = get_sub_field('city');


			// echo '<li>';
			// echo '<a href="' . $relatedArea . '">';
			// echo $cName;
			// if( $num > $i ) {echo ', ';}
			// echo '</a>';
			// echo '</li>'; 

		endwhile;
	endif;


	
}


?>



<?php
