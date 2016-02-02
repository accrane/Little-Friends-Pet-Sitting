
<?php 
$children = get_pages('child_of='.$post->ID);
if( count( $children ) != 0 ) {
  $masthead = 'masthead';
} else {
  $masthead = 'masthead-main-pages';
}

$phone = get_field('phone_number', 'option')
?>

<div class="static-header">

  <div class="clear"></div>

 <div class="wrapper">
    <div id="sociallinks-header"><?php acc_social_links(); ?></div>

    <div class="btn-contact">
        <a href="<?php bloginfo('url'); ?>/contact-us/">Contact</a>
      </div><!-- contact -->
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
        <a href="<?php echo $phone; ?>"><?php echo 'Call: ' . $phone; ?></a>
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
            wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
           
          
          ?>
        </nav><!-- #site-navigation -->
        
          <div class="nav-bar-image"></div>
       
      </div><!-- nav bar -->

  </div><!-- wrapper -->
  </header><!-- #masthead -->