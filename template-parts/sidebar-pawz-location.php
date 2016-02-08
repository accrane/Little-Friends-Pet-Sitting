<?php
wp_reset_query();
    while ( have_posts() ) : the_post();

       $post_object = get_field('featured_pet'); 

    endwhile; // End of the loop.
            

    if( $post_object ): 

    // override $post
    $post = $post_object;
    setup_postdata( $post ); 

    ?>
    <div class="featured-pet-title">
        <h2>
            <a href="<?php the_permalink(); ?>">Meet <?php the_title(); ?></a>
        </h2>
    </div><!-- featured-pet-title -->
    <div class="service-side-area">
    <div class="featured-pet">
        <div class="featured-pet-inner">
            
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

            $petBio = get_field('pet_bio');
              
            ?>
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb; ?>" /></a>

              <?php echo $petBio; ?>

        </div><!-- slider inner -->
    </div><!-- featured pet -->
    </div><!-- service-side-area -->
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>