


<div class="flexslider">

<?php get_template_part('template-parts/signs-mobile'); ?>

  <div class="hanger">
      <div class="service-signs-vertical-hanger">
        <?php get_template_part('template-parts/signs-vertical'); ?>
      </div><!-- service-signs-vertical-hanger -->
  </div><!-- hanger -->

<div class="slider-inner">
  <?php
  // We're on the main location page, so we can get the ID
  $pageID = get_the_ID();
  // Our Region
  $region = get_the_terms( $pageID, 'location' );
  // Term ID
  $ID = $region[0]->term_id;
  $petOfTheMonth = get_field('pet_or_sitter_of_the_month', 'location_' . $ID);
  $urlParam = sanitize_title_with_dashes($region[0]->name);
   
    $post_object = $petOfTheMonth;
     
    if( $post_object ): 
     
      // override $post
      $post = $post_object;
      setup_postdata( $post ); 

      $petOrSitter = get_field('pet_or_sitter');
      if( $petOrSitter == 'pet' ) {
        $featTitle = 'Pet';
      } else {
        $featTitle = 'Sitter';
      }
     
      ?>
        


        <div class="tv">
          
          <div class="tv-title">
            <h2><?php echo $featTitle . '<br> of the Month'; ?></h2>
            <div class="tv-title-paw-prints"></div>
          </div>

          <div id="meet-title">
              <h3>
                <a href="<?php echo get_permalink() . '?location=' . $urlParam;?>">
                  Meet <?php the_title(); ?>
                </a>
              </h3>
          </div><!-- meet title -->
        
          <div class="tv-set">
            <div class="tv-pic">
              <?php 
            $image = get_field('picture');
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];
            $caption = $image['caption'];
           
            // thumbnail
            $size = 'tv-thumb';
            $thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ];
              
            ?>
              <a href="<?php echo get_permalink() . '?location=' . $urlParam; ?>"><img src="<?php echo $thumb; ?>" /></a>

            </div><!-- tv-pic -->
            
        </div><!-- tv set -->
        
        </div><!-- tv -->
        
        
     <?php 
     wp_reset_postdata();
     
     endif;

     wp_reset_query();
     ?>


    <div class="location-main-news">
      <?php get_template_part('template-parts/location-news'); ?>
    </div><!-- locaiton main news -->

  <div class="divider-location"></div>

 </div><!-- .slider inner -->             
</div><!-- .flexslider -->


   

