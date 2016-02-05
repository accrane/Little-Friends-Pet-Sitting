<?php
/**
 * Custom theme functions.
 *
 * 
 *
 * @package ACStarter
 */
/*-------------------------------------
  Image Sizes
---------------------------------------*/
add_image_size( 'sitter', 160, 181, array("center", "center") ); //300 pixels wide (and unlimited height)
add_image_size('tv-thumb', 245, 180, true );

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	/*background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/css/images/logo.png);*/
    background-image: url(<?php echo get_field('logo', 'option'); ?>);
  	background-size: 280px 139px;
  	width: 280px;
  	height: 139px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

/*-------------------------------------
	Adds Options page for ACF.
---------------------------------------*/
if( function_exists('acf_add_options_page') ) {acf_add_options_page();}


/*-------------------------------------
  Is Tree function for Locations
---------------------------------------*/
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  $cpid = get_the_ID();
  $parents = get_post_ancestors( $post->ID ); // get the ancestors
  $ancestorid = ($parents) ? $parents[count($parents)-1]: $post->ID;
  if(($post->post_parent==$pid||$cpid==$pid||$ancestorid==$pid))
      return true;   // we're at the page or at a sub page
  else
        return false;  // we're elsewhere
};
/*-------------------------------------
  Custom Excerpt function for Advanced Custom Fields
---------------------------------------*/
 
function custom_tv_excerpt() {
  global $post;
  $fun = get_field('pet_bio_short_descripton'); //Replace 'your_field_name'
  if ( '' != $fun ) {
    $fun = strip_shortcodes( $fun );
    $fun = apply_filters('the_content', $fun);
    $fun = str_replace(']]>', ']]>', $fun);
    $excerpt_length = 26; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $fun = wp_trim_words( $fun, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $fun);
}
/*-------------------------------------
  My Pets Excerpt for the Sitters page
---------------------------------------*/
function sitter_pets_excerpt() {
  global $post;
  $text = get_field('pets'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 8; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}
/*-------------------------------------
  Fun Facts Excerpt for the Sitters page
---------------------------------------*/
function sitter_funfact_excerpt() {
  global $post;
  $text = get_field('fun_facts'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 15; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}
/*-------------------------------------
  Bio Excerpt for the Sitters page
---------------------------------------*/
function sitter_field_excerpt() {
  global $post;
  $text = get_field('bio'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 20; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}
/*-------------------------------------
  Hometown Excerpt for the Sitters page
---------------------------------------*/
function hometown_field_excerpt() {
  global $post;
  $text = get_field('hometown'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 10; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}
/*-------------------------------------
  Owners page sidebar excerpt
---------------------------------------*/
function sidebarexcerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
/*-------------------------------------
  Services Page Short Description
---------------------------------------*/
function short_desc_excerpt() {
  global $post;
  $text = get_field('short-description'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 15; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}
/*-------------------------------------
  Custom WYSIWYG Styles
---------------------------------------*/
function acc_custom_styles($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'acc_custom_styles');
/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
  $style_formats = array(  
    // Each array child is a format with it's own settings
    array(  
      'title' => 'Purple Text',  
      'block' => 'span',  
      'classes' => 'purple-text',
      'wrapper' => true,
      
    )
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 
// Add styles to WYSIWYG in your theme's editor-style.css file
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// Parent Link Function
function my_location_function() {
    // global $post;
    // $parentLink = add_query_arg(array(),$post->request);

    // return $parentLink;

}
add_action( 'init', 'my_location_function' );




