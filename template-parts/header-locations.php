<?php 
//wp_reset_postdata();
global $post;
// Need to get the location
if( is_single() ) {
  // get url parameters
  //$search = $_GET['location-name'];

  $mylocal = $_GET['location'];

  if( $mylocal == 'charlotte' ) {
    $pageID = '2273';
  } elseif( $mylocal == 'gaston-county' ) {
    $pageID = '2285';
  } elseif( $mylocal == 'south-carolina' ) {
    $pageID = '2283';
  } elseif( $mylocal == 'southeast-charlotte' ) {
    $pageID = '2281';
  } elseif( $mylocal == 'south-charlotte' ) {
    $pageID = '2279';
  } elseif( $mylocal == 'northeast' ) {
    $pageID = '2277';
  } elseif( $mylocal == 'lake-norman-area' ) {
    $pageID = '2275';
  } else {
    $pageID = 'non-location';
  }

 
  // Our Region
  $region = get_the_terms( $pageID, 'location' );
  // Term ID
  $ID = $region[0]->term_id;
  $cities = get_field('cities', 'location_' . $ID);
  $num = count($cities);
  $i = 0;

  if( $pageID == 'non-location') {
    $link = get_bloginfo('url') . '/';
    $pageType = 'non-location';
  } else {
    $link = get_page_link($pageID);
  }
  

} else { // else if not single

  // Get Page ID
  $pageID = get_the_ID();

  // If is child page
  if( $post->post_parent ) {

    $parent = array_reverse(get_post_ancestors($post->ID));
    $first_parent = get_post($parent[0]);
    $pid = $first_parent;

  // Else, get this page ID
  } else {
    $pid = $pageID;
  }

  // Our Region
  $region = get_the_terms( $pid, 'location' );
 
  $i = 0;
  
  // Term ID
  $ID = $region[0]->term_id;
   // Count cities
  $cities = get_field('cities', 'location_' . $ID);
  $num = count($cities);
  // Page link
  $link = get_page_link($pid);
  // echo '<pre>';
  // print_r($cities);

  if( is_page(2273) ||is_page(2285) || is_page(2275) || is_page(2277) || is_page(2283) || is_page(2279) || is_page(2281) ) {
    $location = 'mainlocation';
    $locationClass = 'location-slider';
  } else {
    $location = 'locationsub';
    $locationClass = 'locationsub';
  }
} // end else
?>

<div class="static-header">

  <div class="wrapper">

    <?php  
    if( is_page(2273) ||is_page(2285) || is_page(2275) || is_page(2277) || is_page(2283) || is_page(2279) || is_page(2281) ) { ?>
        <div class="location-tab">
          <h2><?php echo $region[0]->name; ?></h2>
          <div class="not-your-location">
            <a href="<?php bloginfo('url'); ?>/location">not your location?</a>
          </div><!-- not your location -->
          <p>
            <?php // Get our cities
              if( have_rows('cities','location_' . $ID) ) :
                while( have_rows('cities','location_' . $ID) ) : the_row(); $i++;

                  $cName = get_sub_field('city');
                  if( $i < $num ) {
                    echo $cName . ', ';
                  }else{
                    echo $cName;
                  }
                  
                   
                endwhile;
              endif;
              ?>
          </p>
        </div><!-- location tab -->
    <?php } ?>

    <div class="location-nav">
        <ul>
          <li><a href="<?php echo $link . 'blog'; ?>">Blog</a></li>
          <li><a href="<?php echo $link . 'join-our-team'; ?>">Join Our Team</a></li>
          <li><a href="<?php echo $link . 'contact-us'; ?>">Contact Us</a></li>
        </ul>
      </div><!-- location nav -->

    </div><!-- wrapper -->

    <div class="clear"></div>

  <div class="wrapper locations-second-tier">
    
    <div id="sociallinks-header"><?php acc_social_links(); ?></div>
    

    <?php $phone = get_field('phone_number', 'option');

    ?>

      <div class="header-call">
       <?php echo 'Call: ' . $phone; ?>
      </div><!-- header-call -->
    
    </div><!-- wrapper -->


  
            <div class="logo">
              <a href="<?php bloginfo('url'); ?>">
                <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>"/>
              </a>
            </div>


      

</div><!-- static header -->

  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

<header id="masthead" class="site-header <?php echo $locationClass; ?>" role="banner">

  <div class="header-call-mobile">
        <?php echo 'Call: ' . $phone; ?>
      </div><!-- header-call -->


    <div class="wrapper-nav">
      
      <div class="nav-bar">

        <?php if( $location != 'mainlocation' ) { ?>
          <div class="leash"></div>
        <?php  } ?>
        
        <div class="friends"></div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
          <?php 
            if( is_tree(2273) || $mylocal == 'charlotte' ) {
                wp_nav_menu( array( 'theme_location' => 'charlotte', 'menu_id' => 'charlotte-menu' ) ); 
            } elseif( is_tree(2285) || $mylocal == 'gaston-county' ) {
                wp_nav_menu( array( 'theme_location' => 'gaston', 'menu_id' => 'gaston-menu' ) ); 
            } elseif( is_tree(2275) || $mylocal == 'lake-norman-area' ) {
                wp_nav_menu( array( 'theme_location' => 'lakenorman', 'menu_id' => 'lakenorman-menu' ) ); 
            } elseif( is_tree(2277) || $mylocal == 'northeast' ) {
                wp_nav_menu( array( 'theme_location' => 'northeast', 'menu_id' => 'northeast-menu' ) );
            } elseif( is_tree(2283) || $mylocal == 'south-carolina' ) {
                wp_nav_menu( array( 'theme_location' => 'southcarolina', 'menu_id' => 'southcarolina-menu' ) ); 
            } elseif( is_tree(2279) || $mylocal == 'south-charlotte' ) {
                wp_nav_menu( array( 'theme_location' => 'southcharlotte', 'menu_id' => 'southcharlotte-menu' ) ); 
            } elseif( is_tree(2281) || $mylocal == 'southeast-charlotte' ) {
                wp_nav_menu( array( 'theme_location' => 'southeastcharlotte', 'menu_id' => 'southeastcharlotte-menu' ) ); 
            } else {
                wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
            }
          
          ?>
        </nav><!-- #site-navigation -->
        <?php if( $location == 'mainlocation' ) { 
            get_template_part('template-parts/locations-main');
         } else { ?>
          <div class="nav-bar-image">
            <?php if ( function_exists('yoast_breadcrumb') ) {
              if(!is_singular( 'sitters' ) ) {
                yoast_breadcrumb('<p class="breadcrumbs">','</p>');
              }

            } ?>
          </div><!-- nav bar image -->
        <?php } ?>
      </div><!-- nav bar -->

  </div><!-- wrapper -->
  </header><!-- #masthead -->