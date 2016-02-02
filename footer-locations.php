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
  } 

 
  // Our Region
  $region = get_the_terms( $pageID, 'location' );
  // Term ID
  $ID = $region[0]->term_id;
  $cities = get_field('cities', 'location_' . $ID);
  $num = count($cities);
  $i = 0;
  $link = get_page_link($pageID);

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


// Social
$napps = get_field('napps_link', 'option');
$cpps = get_field('cpps_link', 'option');
$psi = get_field('psi_link', 'option');
$bbb = get_field('bbb', 'option');
?>

<div id="logolinks">
  <ul>
    <?php if( $napps != '' ) {echo '<li class="napps"><a href="'.$napps.'" target="_blank">Napps</a></li>';} ?>
    <?php if( $cpps != '' ) {echo '<li class="cpps"><a href="'.$cpps.'" target="_blank">CPPS</a></li>';} ?>
    <?php if( $psi != '' ) {echo '<li class="psi"><a href="'.$psi.'" target="_blank">PSI</a></li>';} ?>
    <?php if( $bbb != '' ) {echo '<li class="bbb"><a href="'.$bbb.'" target="_blank">BBB</a></li>';} ?>
  </ul>
</div><!-- sociallinks -->

 <div id="sociallinks-footer"><?php acc_social_links(); ?></div>


<div class="city-stuff">
<h4><?php echo $region[0]->name; ?></h4>

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
</div><!-- city stuff -->