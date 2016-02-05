<?php
/**
 * Template Name: Overview
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

// Which Location for Blog
$parent = array_reverse(get_post_ancestors($post->ID));
$first_parent = get_post($parent[0]);
$pid = $first_parent;

// If is owners and managmenet main page, use get_terms to get all of them
if( is_page(2) ) { 
	// all terms
	$region = get_terms( 'location' );
	// create array
	$IDarray = array();
	// cycle through
	foreach( $region as $myIds ) {
		$IDarray[] = $myIds->term_id;
	}
	// put ID's in comma separated list
	$ID = implode(",", $IDarray);
	
// Else, we'll pull only the owners attached to the particular owner.
} else {
	$region = get_the_terms( $pid, 'location' );
	// Term ID
	$ID = $region[0]->term_id;
}
// Page link
  $link = get_page_link($pid);
// Schedule a service
  $sas = get_field('s_a_s','option');

?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<?php while( have_posts() ) : the_post(); ?>
			<div class="entry-content">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div><!-- entry contnet -->

			<?php endwhile; // End of the loop. ?>
			<?php 

			wp_reset_postdata();

			?>
		</main><!-- #main -->
	</div><!-- #primary -->



<div class="service-side-area">
	<div class="sidebar">

		<?php if( !is_page(2)) : // if is not the main ownwers and management page?>
			<div class="ownerssigns">
				<div class="sign sign-top ">
		            <div class="sign-info">
		                <a href="<?php echo $sas; ?>" target="_blank">Schedule a Service</a>
		            </div><!-- sign info -->
		        </div><!-- sign -->

		        <div class="sign sign-top ">
		            <div class="sign-info">
		                <a href="<?php echo $link; ?>new-client-registration">New Client Registration</a>
		            </div><!-- sign info -->
		        </div><!-- sign -->
		    </div><!-- ownerssign -->
		<?php endif; ?>


	<div class="sidebar-featured-news">
        
			<?php
			$pageLink = get_field('post_to_feature', 'option');
            $post_object = $pageLink;
             
            if( $post_object ): 
             // override $post
                $post = $post_object;
                setup_postdata( $post ); 
				$date = DateTime::createFromFormat('Ymd', get_field('date_of_event'));
				
             ?>
                <div class="sidebar-newsitem">
                	   <?php if(get_field('date_of_event')!="") : ?>
                       <div class="sidebar-date"><?php echo $date->format('n.j.Y'); ?></div>
                     <?php endif; ?>
                     
                    <div class="sidebar-title">
                    	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="sidebar-excerpt"><?php echo sidebarexcerpt(25); ?></div>
                </div><!-- sidebar newsitem -->
                <?php wp_reset_postdata();  ?>
            <?php endif; ?>
        </div><!-- sidebar-featured-news -->
        
        
        <div class="sidebar-testimonial">
        <?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'testimonials',
				'posts_per_page' => 1,
				'meta_key' => 'list_as_featured',
				'meta_value' => 'yes',
				'orderby' => 'rand', 
				'order' => 'ASC'
			));
			if ($wp_query->have_posts()) : ?>
             <?php while ($wp_query->have_posts()) : ?>
             
             
             
        	<div class="to-card">To: Little Friends Pet Sitting</div>
            
           
            <?php $wp_query->the_post(); ?>
            
            <div class="from"><?php the_field('re:'); ?></div>
            <div class="test-content"><?php the_content(); ?></div>
            <div class="test-name"><?php the_title(); ?></div>
            
            <?php endwhile; ?>
          <?php wp_reset_postdata();  ?>  
        <?php endif ?>
        
        </div><!-- sidebar testimonial -->
    
    
    </div><!-- sidebar -->
	<!-- <div class="sidebar-more"><a href="<?php bloginfo('url'); ?>/what-sets-us-apart/">More</a></div>sidebar more -->
	<div class="thelatest"><a href="<?php bloginfo('url'); ?>/blog/">The Latest</a></div><!-- sidebar more -->

</div><!-- sidebar -->
</div><!-- service side area -->


</div><!-- wrapper -->
<?php

get_footer();
