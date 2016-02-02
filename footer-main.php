<?php 
$taxonomies = array( 
    'location'
);

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

?>

<div class="footer-locations">
<h3>Locations: </h3>

<ul>
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
	<li></li>
</ul>
</div><!-- footer locations -->

 <div id="sociallinks-footer-main"><?php acc_social_links(); ?></div>