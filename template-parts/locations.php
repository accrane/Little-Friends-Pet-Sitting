<?php 

// Locations, Cities, Areas, and Zips

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

// echo '<pre>';
// print_r($terms);

foreach( $terms as $term ) {
            
            $relatedArea = get_field('related_area', 'location_' . $ID);

            $areaArray = array();

            $name = $term->name;
            $ID = $term->term_id;
            $link = get_term_link($ID);
            $cities = get_field('cities','location_' . $ID );
            // echo '<pre>';
            // print_r($cities);
            $num = count($cities);
            $i = 0;

            // Get our cities
            $cityArray = array();
            if( have_rows('cities','location_' . $ID) ) :
              while( have_rows('cities','location_' . $ID) ) : the_row(); $i++;
                
                $cName = get_sub_field('city');
                $cityArray[] = $cName;
                 

              endwhile;
            endif;


            // Get our Zips
            $zipArray = array();
            if( have_rows('zip_codes','location_' . $ID) ) :
              while( have_rows('zip_codes','location_' . $ID) ) : the_row(); $i++;
                
                $zipcode = get_sub_field('zip_code');
                $zipArray[] = $cName;
                 

              endwhile;
            endif;


            
          }
?>