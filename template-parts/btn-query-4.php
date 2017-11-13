<?php
wp_reset_query();
   //Taxonomy
$taxonomy = 'location';

// Which Location for Service
$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_post($parent[0]);
$pid = $first_parent;
$region = get_the_terms( $pid, 'location' );
// Term ID
$ID = $region[0]->term_id;

// page link of parent for the buttons below
$parentLink = get_page_link($pid);
             /*

                        Button Query = Home Care, Errands, Pet Taxi, Key Dropoff

                */

                $wp_query = new WP_Query();
                $wp_query->query(array(
                'post_type'=>'services',
                'posts_per_page' => -1,
                'post__not_in' => array(
                    '325', // Slumber Party
                    '344',  // Medications
                    '315',  // Pet Sitting
                    '2318',  // Dog Walking
                    ),
                // 'tax_query' => array(
                //     array(
                //         'taxonomy' => $taxonomy, // your custom taxonomy
                //         'field' => 'term_id',
                //         'terms' => array( $ID ) // the terms (categories) you created
                //     )
                // )
            ));
                $i = 0;
            if ($wp_query->have_posts()) : ?>

            <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
                    $i++;

                    $boxColor = get_field('box_color');

                    if( $boxColor == 'Light Blue' ) {
                        $btnClass = 'btn-blue';
                    } elseif( $boxColor == 'Yellow' ) {
                        $btnClass = 'btn-yellow';
                    } elseif( $boxColor == 'Red' ) {
                        $btnClass = 'btn-red';
                    } elseif( $boxColor == 'Green' ) {
                        $btnClass = 'btn-green';
                    } elseif( $boxColor == 'Purple' ) {
                        $btnClass = 'btn-purple';
                    } else {
                        $btnClass = 'btn-dark-blue';
                    }

                    $image = get_field('button');
                    if (!is_array($image)) {
                      $image = acf_get_attachment($image);
                    }
                    if( $image != '' ) {
                        $url = $image['url'];
                        $title = $image['title'];
                        $alt = $image['alt'];
                        $caption = $image['caption'];
                        $size = 'large';
                        $thumb = $image['sizes'][ $size ];
                        $width = $image['sizes'][ $size . '-width' ];
                        $height = $image['sizes'][ $size . '-height' ];
                    }

                    $title = get_the_title();
                    $santiTitle = sanitize_title_with_dashes($title);
                    $link = $parentLink . 'home-care-errand-services/#' . $santiTitle;


            ?>

            <div class="service-btn <?php echo $btnClass; ?>">
                <a href="<?php echo $link ?>">
                    <div class="service-btn-image">
                        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                    </div>
                    <h3 class="small"><?php echo $title; ?></h3>
                </a>
            </div><!-- service btn -->

            <?php 
            endwhile; 
            endif; 
            rewind_posts(); ?>