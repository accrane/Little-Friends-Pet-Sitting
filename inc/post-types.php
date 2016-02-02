<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
// Slides
  
     $labels = array(
  'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slides', 'post type singular name'),
    'add_new' => _x('Add New', 'Slides'),
    'add_new_item' => __('Add New Slides'),
    'edit_item' => __('Edit Slides'),
    'new_item' => __('New Slides'),
    'view_item' => __('View Slides'),
    'search_items' => __('Search Slides'),
    'not_found' =>  __('No Slides found'),
    'not_found_in_trash' => __('No Slides found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => 11,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('slides',$args);
  
  
   // Register the Services
  
     $labels = array(
  'name' => _x('Services', 'post type general name'),
    'singular_name' => _x('Service', 'post type singular name'),
    'add_new' => _x('Add New', 'Services'),
    'add_new_item' => __('Add New Services'),
    'edit_item' => __('Edit Services'),
    'new_item' => __('New Services'),
    'view_item' => __('View Services'),
    'search_items' => __('Search Services'),
    'not_found' =>  __('No Services found'),
    'not_found_in_trash' => __('No Services found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Services'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('services',$args);


  // Register the Pet/Sitters
  
     $labels = array(
  'name' => _x('Pets/Sitters', 'post type general name'),
    'singular_name' => _x('Pet/Sitter', 'post type singular name'),
    'add_new' => _x('Add New', 'Pet/Sitter'),
    'add_new_item' => __('Add New Pet/Sitter'),
    'edit_item' => __('Edit Pet/Sitters'),
    'new_item' => __('New Pet/Sitters'),
    'view_item' => __('View Pets/Sitters'),
    'search_items' => __('Search Pets/Sitters'),
    'not_found' =>  __('No Pets/Sitters found'),
    'not_found_in_trash' => __('No Pet/Sitters found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Pets/Sitters'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('sitters',$args);
  
   // Register the Testimonials
  
     $labels = array(
  'name' => _x('Testimonials', 'post type general name'),
    'singular_name' => _x('Testimonial', 'post type singular name'),
    'add_new' => _x('Add New', 'Testimonials'),
    'add_new_item' => __('Add New Testimonials'),
    'edit_item' => __('Edit Testimonials'),
    'new_item' => __('New Testimonials'),
    'view_item' => __('View Testimonials'),
    'search_items' => __('Search Testimonials'),
    'not_found' =>  __('No Testimonials found'),
    'not_found_in_trash' => __('No Testimonials found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Testimonials'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => 26,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('testimonials',$args);
  
   
  //   $labels = array(
  // 'name' => _x('Staff', 'post type general name'),
  //   'singular_name' => _x('Staff', 'post type singular name'),
  //   'add_new' => _x('Add New', 'Staff'),
  //   'add_new_item' => __('Add New Staff'),
  //   'edit_item' => __('Edit Staff'),
  //   'new_item' => __('New Staff'),
  //   'view_item' => __('View Staff'),
  //   'search_items' => __('Search Staff'),
  //   'not_found' =>  __('No Staff found'),
  //   'not_found_in_trash' => __('No Staff found in Trash'), 
  //   'parent_item_colon' => '',
  //   'menu_name' => 'Staff'
  // );
  // $args = array(
  // 'labels' => $labels,
  //   'public' => true,
  //   'publicly_queryable' => true,
  //   'show_ui' => true, 
  //   'show_in_menu' => true, 
  //   'query_var' => true,
  //   'rewrite' => true,
  //   'capability_type' => 'post',
  //   'has_archive' => false, 
  //   'hierarchical' => false,
  //   'menu_position' => 20,
  //   'supports' => array('title','editor','custom-fields','thumbnail'),
  
  // ); 
  // register_post_type('staff',$args);

   // Register the Owners Management
  
     $labels = array(
  'name' => _x('Management', 'post type general name'),
    'singular_name' => _x('Staff', 'post type singular name'),
    'add_new' => _x('Add New', 'Staff'),
    'add_new_item' => __('Add New Staff'),
    'edit_item' => __('Edit Staff'),
    'new_item' => __('New Staff'),
    'view_item' => __('View Staff'),
    'search_items' => __('Search Staff'),
    'not_found' =>  __('No Staff found'),
    'not_found_in_trash' => __('No Staff found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Management'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('ownersandmanagement',$args);



     // Register the Owners Management
  
 // $labels = array(
 //  'name' => _x('FAQ', 'post type general name'),
 //    'singular_name' => _x('FAQ', 'post type singular name'),
 //    'add_new' => _x('Add New', 'FAQ'),
 //    'add_new_item' => __('Add New FAQ'),
 //    'edit_item' => __('Edit FAQ'),
 //    'new_item' => __('New FAQ'),
 //    'view_item' => __('View FAQ'),
 //    'search_items' => __('Search FAQ'),
 //    'not_found' =>  __('No FAQ found'),
 //    'not_found_in_trash' => __('No FAQ found in Trash'), 
 //    'parent_item_colon' => '',
 //    'menu_name' => 'FAQ'
 //  );
 //  $args = array(
 //  'labels' => $labels,
 //    'public' => true,
 //    'publicly_queryable' => true,
 //    'show_ui' => true, 
 //    'show_in_menu' => true, 
 //    'query_var' => true,
 //    'rewrite' => true,
 //    'capability_type' => 'post',
 //    'has_archive' => false, 
 //    'hierarchical' => false,
 //    'menu_position' => 20,
 //    'supports' => array('title','editor','custom-fields','thumbnail'),
  
 //  ); 
 //  register_post_type('faq',$args);




  
   // Register the Testimonials
  
  //    $labels = array(
  // 'name' => _x('Customer Care', 'post type general name'),
  //   'singular_name' => _x('Customer Care', 'post type singular name'),
  //   'add_new' => _x('Add New', 'Customer Care'),
  //   'add_new_item' => __('Add New Customer Care'),
  //   'edit_item' => __('Edit Customer Care'),
  //   'new_item' => __('New Customer Care'),
  //   'view_item' => __('View Customer Care'),
  //   'search_items' => __('Search Customer Care'),
  //   'not_found' =>  __('No Customer Care found'),
  //   'not_found_in_trash' => __('No Customer Care found in Trash'), 
  //   'parent_item_colon' => '',
  //   'menu_name' => 'Customer Care'
  // );
  // $args = array(
  // 'labels' => $labels,
  //   'public' => true,
  //   'publicly_queryable' => true,
  //   'show_ui' => true, 
  //   'show_in_menu' => true, 
  //   'query_var' => true,
  //   'rewrite' => true,
  //   'capability_type' => 'post',
  //   'has_archive' => false, 
  //   'hierarchical' => false,
  //   'menu_position' => 20,
  //   'supports' => array('title','editor','custom-fields','thumbnail'),
  
  // ); 
  // register_post_type('customercare',$args);


  // Slides
  
  //    $labels = array(
  // 'name' => _x('Sponsor Drives', 'post type general name'),
  //   'singular_name' => _x('Sponsor Drives', 'post type singular name'),
  //   'add_new' => _x('Add New', 'Sponsor Drive'),
  //   'add_new_item' => __('Add New Sponsor Drive'),
  //   'edit_item' => __('Edit Sponsor Drive'),
  //   'new_item' => __('New Sponsor Drive'),
  //   'view_item' => __('View Sponsor Drive'),
  //   'search_items' => __('Search Sponsor Drive'),
  //   'not_found' =>  __('No Sponsor Drive found'),
  //   'not_found_in_trash' => __('No Sponsor Drive found in Trash'), 
  //   'parent_item_colon' => '',
  //   'menu_name' => 'Sponsor Drive'
  // );
  // $args = array(
  // 'labels' => $labels,
  //   'public' => true,
  //   'publicly_queryable' => true,
  //   'show_ui' => true, 
  //   'show_in_menu' => true, 
  //   'query_var' => true,
  //   'rewrite' => true,
  //   'capability_type' => 'post',
  //   'has_archive' => 'sponsor-drives', 
  //   'hierarchical' => false,
  //   'menu_position' => 6,
  //   'supports' => array('title','editor','custom-fields','thumbnail'),
  
  // ); 
  // register_post_type('sponsor-drives',$args);
  
  
  // // Slides
  
  //    $labels = array(
  // 'name' => _x('Education Programs', 'post type general name'),
  //   'singular_name' => _x('Education Program', 'post type singular name'),
  //   'add_new' => _x('Add New', 'Education Program'),
  //   'add_new_item' => __('Add New Education Program'),
  //   'edit_item' => __('Edit Education Program'),
  //   'new_item' => __('New Education Program'),
  //   'view_item' => __('View Education Program'),
  //   'search_items' => __('Search Education Program'),
  //   'not_found' =>  __('No Education Program found'),
  //   'not_found_in_trash' => __('No Education Program found in Trash'), 
  //   'parent_item_colon' => '',
  //   'menu_name' => 'Education Program'
  // );
  // $args = array(
  // 'labels' => $labels,
  //   'public' => true,
  //   'publicly_queryable' => true,
  //   'show_ui' => true, 
  //   'show_in_menu' => true, 
  //   'query_var' => true,
  //   'rewrite' => true,
  //   'capability_type' => 'post',
  //   'has_archive' => 'education-program', 
  //   'hierarchical' => false,
  //   'menu_position' => 7,
  //   'supports' => array('title','editor','custom-fields','thumbnail'),
  
  // ); 
  // register_post_type('education-program',$args);
  
  // Add more between here
  
  // and here
  
  } // close custom post type

  // hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_book_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Location', 'taxonomy general name' ),
    'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Locations' ),
    'all_items'         => __( 'All Locations' ),
    'parent_item'       => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item'         => __( 'Edit Location' ),
    'update_item'       => __( 'Update Location' ),
    'add_new_item'      => __( 'Add New Location' ),
    'new_item_name'     => __( 'New Location Name' ),
    'menu_name'         => __( 'Location' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'location' ),
  );

  register_taxonomy( 'location', array( 'post','staff','testimonials', 'sitters', 'page', 'services', 'ownersandmanagement' ), $args );

 
}