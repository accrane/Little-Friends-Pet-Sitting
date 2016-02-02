<?php 
/*____________________________________

			
			Social Media icons

_______________________________________*/
function acc_social_links() {

	$socials = array();
					
	$facebooklink = get_field('facebook_link', 'option');
	$twitterlink = get_field('twitter_link', 'option');
	$instagramlink = get_field('instagram_link', 'option');
	$linkedinlink = get_field('linkedin_link', 'option');
	$youtubelink = get_field('youtube_link', 'option');
	$googlelink = get_field('google_plus_link', 'option');
	$yelplink = get_field('yelp_link', 'option');
	
	$facebook = array(
		'class' => 'facebook',
		'link' => $facebooklink,
		'text' => 'Like us on Facebook',
	);
	$twitter = array(
		'class' => 'twitter',
		'link' => $twitterlink,
		'text' => 'Follow us on Twitter',
	);
	$instagram = array(
		'class' => 'instagram',
		'link' => $instagramlink,
		'text' => 'Follow us on Instagram',
	);
	$linkedin = array(
		'class' => 'linkedin',
		'link' => $linkedinlink,
		'text' => 'Join us on Linkedin',
	);
	$youtube = array(
		'class' => 'youtube',
		'link' => $youtubelink,
		'text' => 'Follow us on YouTube',
	);
	$google = array(
		'class' => 'google',
		'link' => $googlelink,
		'text' => 'Follow us on Google',
	);
	$yelp = array(
		'class' => 'yelp',
		'link' => $yelplink,
		'text' => 'Follow us on Yelp',
	);
	// Add Chosen Social media to the list
	if($facebooklink != "") {
		$socials[] = $facebook;
	}
	if($twitterlink != "") {
		$socials[] = $twitter;
	}
	if($instagramlink != "") {
		$socials[] = $instagram;
	} 
	if($linkedinlink != "") {
		$socials[] = $linkedin;
	}
	if($youtubelink != "") {
		$socials[] = $youtube;
	} 
	if($googlelink != "") {
		$socials[] = $google;
	}
	if($yelplink != "") {
		$socials[] = $yelp;
	} 
	// See what data we have.
	/*echo '<pre>';
	print_r($socials);
	echo '</pre>';*/
	
	// count for width
	$socialcount = count($socials);
	if($socialcount == 1) {
		$snumber = 'socialone';	
	} elseif($socialcount == 2) {
		$snumber = 'socialtwo';	
	} elseif($socialcount == 3) {
		$snumber = 'socialthree';	
	} elseif($socialcount == 4) {
		$snumber = 'socialfour';	
	} elseif($socialcount == 5) {
		$snumber = 'socialfive';	
	} elseif($socialcount == 6) {
		$snumber = 'socialsix';	
	} elseif($socialcount == 7) {
		$snumber = 'socialseven';	
	}
	
	echo '<div id="sociallinks" class="' . $snumber . '">';
	echo '<ul>';
	
	foreach ( $socials as $social ) {
		echo '<li class="'. $social['class'] . '">';
		echo '<a href="' . $social['link'] . '" target="_blank">';
		echo $social['text'];
		echo '</a>';
		echo '</li>';
	}
	
	echo '</ul>';
	echo '</div><!-- social links -->'; 
} // end acc social links 

