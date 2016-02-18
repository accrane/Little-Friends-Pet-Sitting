
<?php 
$children = get_pages('child_of='.$post->ID);
if( count( $children ) != 0 ) {
  $masthead = 'masthead';
} else {
  $masthead = 'masthead-main-pages';
}

$phone = get_field('phone_number', 'option');
$sas = get_field('s_a_s', 'option');
$link = get_bloginfo('url') . '/' .'new-client-registration/';
?>

<div class="static-header">

  <div class="clear"></div>

 <div class="wrapper">
    <div id="sociallinks-header"><?php acc_social_links(); ?></div>

    <div class="btn-contact">
        <a href="<?php bloginfo('url'); ?>/contact-us/">Contact Us</a>
      </div><!-- contact -->

       <div class="welcomesigns">
        <div class="sign-small sign-top-small ">
                <div class="sign-info-small">
                    <a href="<?php echo $link; ?>new-client-registration">New Client Registration</a>
                </div><!-- sign info -->
            </div><!-- sign -->
        <div class="sign-small sign-top-small ">
                <div class="sign-info-small">
                    <a href="<?php echo $sas; ?>" target="_blank">Schedule a Service</a>
                </div><!-- sign info -->
            </div><!-- sign -->
    </div><!-- welcomesigns -->

        
    </div><!-- wrapper -->

  <div class="logo">
    <a href="<?php bloginfo('url'); ?>">
      <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>"/>
    </a>
  </div>

</div><!-- static header -->

  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

<header id="<?php echo $masthead; ?>" class="site-header <?php echo $locationClass; ?>" role="banner">

  <div class="header-call-mobile">
        <?php echo 'Call: ' . $phone; ?>
      </div><!-- header-call -->


     


    <div class="wrapper-nav">
      
      <div class="nav-bar">


        <?php 
        // Hide leash if you're searching your location
        //wp_reset_query();
        if(  !is_page(2933) ) { ?>
          <div class="leash"></div>
        <?php  } ?>

        <div class="friends"></div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
          <?php 
            wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
           
          
          ?>
        </nav><!-- #site-navigation -->
        
          <div class="nav-bar-image"></div>
       
      </div><!-- nav bar -->

  </div><!-- wrapper -->
  </header><!-- #masthead -->