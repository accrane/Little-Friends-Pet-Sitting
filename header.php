<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- our theme -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<?php 
	// Decide which header to get
/*
	Here is the array key for the header-main-pages
	2266 = services
	665 = sitemap
	13 = getting started
	2010 = new client registration
	2257 = who we are
	2270 = locations
	2713 = paws for giving
	2259 = who we are / overview
	65 = who we are / customer service
	2 = who we are / owners and managment
	2933 = Your location
	2936 = Contact Us
	210 = new client registration
	15 = main blog
*/
	if( is_front_page() ) {
		get_template_part('template-parts/header-with-slider');
	} elseif( is_page( array(2266, 665, 13, 2010, 2257, 2270, 2, 65, 2259, 2713, 2933, 2936, 210, 15) ) ) {
		get_template_part('template-parts/header-main-pages');
    } else {
		get_template_part('template-parts/header-locations');
	}
?>

	<div id="content" class="site-content ">

		
