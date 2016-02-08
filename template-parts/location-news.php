<?php 
global $post;
// Need to get the location
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
$urlParam = sanitize_title_with_dashes($region[0]->name);

?>


<div class="home-news">
	<?php
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'post',
		'posts_per_page' => 1,
	));
	if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>	
    
    <h3>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>
    
    <div class="date"><?php echo get_the_date(); ?></div>

    <div class="clear"></div>

    <?php 
		// if ( has_post_thumbnail() ) { 
		// 	the_post_thumbnail('medium');
		// } 
		?>
    	<?php the_excerpt(); ?>

    	<div class="more-bowl home-bowl">
    		<a href="<?php the_permalink(); ?>?location=<?php echo $urlParam ?>">Read More</a>
    	</div>

    <?php 

    endwhile; 

    endif; 

    wp_reset_postdata(); 
    wp_reset_query();
    ?>
</div><!-- home news -->