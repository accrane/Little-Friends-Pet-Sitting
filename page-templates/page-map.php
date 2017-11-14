<?php
/**
 * Template Name: Map
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

$lakeNorman = get_bloginfo('url') . '/'. 'huntersville-northlake-davidson-cornelius-lake-norman/';
$Charlotte = get_bloginfo('url') . '/'. 'dilworth-uptown-southend-southpark-noda/';
$northEast = get_bloginfo('url') . '/'. 'concord-kannapolis-university-cabarrus-harrisburg/';
$SouthCharlotte = get_bloginfo('url') . '/'. 'pineville-ballantyne-waxhaw-weddington/';
$SouthEastCharlotte = get_bloginfo('url') . '/'. 'matthews-indian-trail-monroe-mint-hill/';
$southCarolina = get_bloginfo('url') . '/'. 'rock-hill-fort-mill-lake-wylie-tega-cay-york/';
$gaston = get_bloginfo('url') . '/'. 'gastonia-belmont-mount-holly-mt-island/';
http://littlefriendspetsitting.com/
?>
<div class="wrapper">
	<div id="primary" class="big-map-area">
		<?php 

		while ( have_posts() ) : the_post(); 

			$title = get_the_title();
			$content = get_the_content();

		endwhile; // End of the loop.
		?>
		<main id="main" class="site-main" role="main">

			<article>
				<header class="entry-header">
					<h1 class="entry-title"><?php echo $title; ?></h1>
				</header><!-- .entry-header -->
			</article><!-- #post-## -->

			<div class="maparea">
				<div id="js-lakenorman" class="js-show-city">
					<a href="<?php echo $lakeNorman; ?>">Lake Norman</a>
				</div>
				<div id="js-northeast" class="js-show-city">
					<a href="<?php echo $northEast; ?>">Northeast</a>
				</div>
				<div id="js-southeast-charlotte" class="js-show-city">
					<a href="<?php echo $SouthEastCharlotte; ?>">Southeast Charlotte</a>
				</div>
				<div id="js-southcharlotte" class="js-show-city">
					<a href="<?php echo $SouthCharlotte; ?>">South Charlotte</a>
				</div>
				<div id="js-south-carolina" class="js-show-city">
					<a href="<?php echo $southCarolina; ?>">South Carolina</a>
				</div>
				<div id="js-gaston" class="js-show-city">
					<a href="<?php echo $gaston; ?>">Gaston County</a>
				</div>
				<div id="js-charlotte" class="js-show-city">
					<a href="<?php echo $Charlotte; ?>">Charlotte</a>
				</div>
				<div class="maparea-img">
					<img class="map" src="<?php bloginfo('template_url'); ?>/images/map.png"  usemap="#Map">
				</div><!-- map areaimg -->
			</div><!-- map area -->

		</main><!-- #main -->
	</div><!-- #primary -->


	<div class="map-side">
		
			<article>
				<div class="entry-content">
					<?php echo $content; ?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<div class="find-your-location find-your-location-map left">
				<h3>FIND YOUR LOCATION ></h3>
				<p>Enter your zip code to schedule a service or register as a new client!</p>
			</div><!-- find your location -->

			<?php $action = get_bloginfo('url') . '/your-location/'; ?>
			<form action="<?php echo $action ?>" method="get">
			  <input class="zipsearch" type="text" name="location" placeholder="<?php echo esc_attr_x( 'Enter your zip code', 'placeholder' ) ?>" >
			  <input class="submit" type="submit" value="Submit">
			</form>

			<div class="search-locations-result">
				<h3>Locations: </h3>

					
						<?php 
						$taxonomies = array('location');

						$args = array(
						    'orderby'                => 'name',
						    'order'                  => 'ASC',
						    'hide_empty'             => true,
						    'fields'                 => 'all',
						    'name'                   => '',
						    'slug'                   => '',
						    'hierarchical'           => true,
						    'search'                 => '',
						    'child_of'               => 0,
						    'parent'                 => '',
						    'cache_domain'           => 'core',
						    'update_term_meta_cache' => true,
						    'meta_query'             => ''
						); 
						$terms = get_terms($taxonomies, $args);
						
						 foreach( $terms as $term ) {
							
							$name = $term->name;
							$ID = $term->term_id;
							$link = get_term_link($ID);
							$cities = get_field('cities','location_' . $ID );
							// Region
							$relatedArea = get_field('related_region', 'location_' . $ID);
							
							$num = count($cities);
							$i = 0;

							if( have_rows('cities','location_' . $ID) ) :
								while( have_rows('cities','location_' . $ID) ) : the_row(); $i++;
									
									$cName = get_sub_field('city');


									//echo '<li>';
									echo '<a href="' . $relatedArea . '">';
									echo $cName;
									if( $num > $i ) {echo ', ';}
									echo '</a>';
									//echo '</li>'; 

								endwhile;
							endif;


							
						}
						?>
						
				


				<?php //}	// End if no Match ?>
				</div><!-- search-locations-result -->

	</div><!-- widget-area -->

</div><!-- wrapper -->

<!-- 
	
	Map Coordinates

-->
<map name="Map">
  <area alt="lake-norman" href="<?php echo $lakeNorman; ?>" shape="poly" coords="0,14,99,159,92,161,87,168,90,177,97,183,103,184,108,174,128,202,135,201,142,208,146,204,159,208,166,209,168,207,184,206,210,188,223,190,223,185,247,178,252,184,299,150,310,144,330,116,322,98,326,85,330,62,320,50,315,42,316,40,330,44,342,39,344,48,353,50,350,46,347,41,346,35,338,26,351,13,363,4,1,4" >
  <area alt="northeast" href="<?php echo $northEast; ?>" shape="poly" coords="364,4,366,4,494,4,496,384,492,390,485,385,478,351,424,314,427,305,422,302,418,310,409,304,417,290,414,287,409,288,408,281,398,281,398,271,396,271,392,260,396,258,394,253,387,253,387,248,395,248,394,243,385,243,375,209,362,200,366,195,362,193,358,194,358,188,352,186,350,189,330,168,338,164,340,159,332,158,331,147,326,142,326,134,321,132,330,115,322,97,329,62,314,40,330,44,341,38,344,47,353,50,346,40,346,36,336,26,362,5"  >
  <area alt="southeast-charlotte" href="<?php echo $SouthEastCharlotte; ?>" shape="poly" coords="494,391,494,676,489,686,370,687,376,658,371,616,356,619,350,624,341,622,339,618,330,615,322,605,306,591,300,590,288,585,286,578,298,575,296,536,294,520,290,508,289,474,287,460,272,438,276,428,288,428,294,441,297,450,302,447,324,445,329,432,324,425,330,424,334,428,348,408,343,408,337,400,338,392,342,384,340,366,344,354,352,350,360,353,372,364,378,368,396,368,406,366,403,345,410,341,419,358,430,354,449,354,466,342,478,351,484,384,492,389"  >
  <area alt="south-charlotte" href="<?php echo $SouthCharlotte; ?>" shape="poly" coords="368,687,256,688,258,657,135,488,30,558,22,551,21,545,20,541,16,540,14,535,15,529,19,526,16,520,16,514,20,509,24,504,24,500,32,496,35,496,45,488,42,485,39,473,42,468,40,462,25,455,24,445,31,440,42,441,50,446,50,440,58,434,72,450,75,450,66,438,72,434,66,430,66,424,70,420,71,410,71,400,69,391,68,382,70,377,69,367,71,364,80,356,83,358,87,356,94,360,110,354,113,360,110,366,114,371,114,380,112,388,114,395,112,404,109,416,114,417,120,417,133,422,140,422,151,424,148,433,145,442,156,448,166,455,176,456,186,451,193,454,196,458,190,470,188,482,188,495,196,510,204,512,208,503,215,509,218,502,223,502,248,460,246,454,249,445,262,442,271,438,287,460,290,507,294,522,297,574,286,577,287,584,298,590,304,590,325,608,330,616,338,617,340,622,349,624,356,619,371,616,376,658,368,685"  >
  <area alt="south-carolina" href="<?php echo $southCarolina; ?>" shape="poly" coords="256,688,0,687,0,434,10,435,13,438,14,440,18,445,12,448,11,452,15,455,6,466,19,462,26,466,30,481,27,488,24,491,20,490,20,498,17,496,23,503,16,512,16,518,18,524,14,529,14,535,16,541,19,541,21,550,30,557,134,489,258,657,256,684"  >
  <area alt="gaston-county" href="<?php echo $gaston; ?>" shape="poly" coords="1,18,0,434,10,433,17,434,20,438,26,436,30,430,36,432,40,436,47,436,52,432,54,429,60,429,58,422,62,416,63,414,66,398,62,390,63,383,63,375,64,368,69,366,80,356,88,356,96,360,108,356,117,345,124,346,130,331,136,328,143,328,149,322,147,310,152,303,154,296,155,282,175,284,166,272,154,264,145,260,136,254,133,246,126,238,122,234,127,230,133,225,135,216,134,210,128,201,110,176,106,183,99,184,92,180,88,174,87,168,88,164,92,160,98,158,4,21"  >
  <area alt="charlotte" href="<?php echo $Charlotte; ?>" shape="poly" coords="130,202,135,200,141,208,145,204,164,210,169,206,184,206,210,188,224,190,224,184,245,178,252,184,280,164,310,143,318,130,325,134,326,140,330,146,332,158,339,159,339,165,329,168,349,188,352,186,358,188,358,194,362,193,365,194,362,198,364,202,374,208,384,242,394,242,394,246,386,248,387,253,392,252,395,258,393,260,396,269,398,272,398,280,406,280,408,286,413,287,416,289,409,304,417,310,421,302,426,303,423,314,464,342,449,353,430,353,418,358,410,341,404,345,404,366,377,370,366,358,355,351,347,352,343,356,340,366,341,376,341,385,339,392,337,398,338,406,344,408,348,409,334,427,330,424,324,425,327,432,323,446,308,446,300,447,296,450,294,442,290,429,276,428,272,438,261,443,255,444,248,445,246,453,247,461,223,502,218,501,215,508,208,504,204,512,197,512,192,504,188,497,188,482,190,468,196,460,192,454,185,450,177,454,166,455,145,442,150,425,140,421,136,423,119,418,110,416,112,406,114,395,112,390,114,376,114,371,109,366,114,361,110,354,116,346,125,346,130,331,138,330,144,327,150,322,147,310,154,302,154,282,174,284,166,271,152,262,136,254,132,246,127,238,122,234,133,223,135,214,130,206"  >
</map>


<?php
//get_sidebar();
get_footer();
