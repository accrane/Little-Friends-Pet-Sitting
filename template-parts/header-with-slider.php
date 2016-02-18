<div class="static-header">

  <div class="wrapper">
    <div id="sociallinks-header"><?php acc_social_links(); ?></div>

    <div class="btn-contact">
        <a href="<?php bloginfo('url'); ?>/contact-us/">Contact Us</a>
      </div><!-- contact -->


      <div class="welcomesigns">
        <div class="sign-small sign-top ">
                <div class="sign-info-small">
                    <a href="<?php echo $sas; ?>" target="_blank">Schedule a Service</a>
                </div><!-- sign info -->
            </div><!-- sign -->

            <div class="sign-small sign-top ">
                <div class="sign-info-small">
                    <a href="<?php echo $link; ?>new-client-registration">New Client Registration</a>
                </div><!-- sign info -->
            </div><!-- sign -->
        </div><!-- welcomesigns -->
        
     
    </div><!-- wrapper -->



      <h1 class="logo">
        <a href="<?php bloginfo('url'); ?>">
          <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>"/>
        </a>
      </h1>
        

</div><!-- static header -->

  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

<header id="masthead-home" class="site-header " role="banner">
    

      <div class="header-call-mobile">
        <?php  $phone = get_field('phone_number', 'option'); ?>
        <?php echo 'Call: ' . $phone; ?>
      </div><!-- header-call -->
      
      <div class="nav-bar-home">

        <div class="friends"></div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
          <?php 
           wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
        ?>
        </nav><!-- #site-navigation -->
       
              <?php
                // Some more arguments
                $querySlides = array(
                  'post_type' => 'slides',
                );
                // The Query
                $the_query = new WP_Query( $querySlides );
                
                // The Loop
                 if ( $the_query->have_posts()) : ?>

                <div class="flexslider slider-bg home-slider">
                  
                        <ul class="slides">
                        <?php while ( $the_query->have_posts() ) : ?>
                          <?php $the_query->the_post(); ?>
                            <li> 
                            <div class="slider-inner">
                                <div class="home-banner-pic">
                                
                                <?php if(get_field('slide')!="") { ?>
                                    <img src="<?php the_field('slide'); ?>" />
                                  <?php } ?>
                                  
                                 
                                   <div class="slide-text">
                                    <?php if(get_field('sub_title')!="") { ?>
                                    <div class="subheader"><?php the_field('sub_title'); ?></div>
                                    <?php } ?>
                                      
                                       <?php if(get_field('title')!="") { ?>
                                    <div class="banner-title"><h2><?php the_field('title'); ?></h2></div>
                                    <?php } ?>
                                      
                                   </div><!-- slide text -->

                                   <?php if(get_field('slide_link')!="") { ?>
                                      <div class="banner-link more">
                                        <a href="<?php the_field('slide_link'); ?>">More</a>
                                      </div>
                                    <?php } ?> 
                                 
                                </div><!-- home banner pic -->
                               </div><!-- .slider inner --> 
                           </li>
                     <?php endwhile; ?>
                   </ul><!-- slides -->
            
          </div><!-- .flexslider -->


         <?php endif; // end loop ?>
         
     <?php wp_reset_postdata(); ?>

      </div><!-- nav bar -->


 
  </header><!-- #masthead -->
  <div class="clear"></div>

