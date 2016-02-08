/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	// Make active current page
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	
	// Flexslider
	// front page slider 
	$('.flexslider').flexslider({
		animation: "slide",
		smoothHeight: true
	}); // end register flexslider
	
	// // Colorbox
	// $('a.gallery').colorbox({
	// 	rel:'gal',
	// 	width: '80%', 
	// 	height: '80%'
	// });
	$('.inline').colorbox({
		inline:true,
		width: '80%', 

	 });

// Map Highlight
$('.map').maphilight({
	fade: false,
	fillColor: '000000',
	fillOpacity: 0.4
});

	// $(".inline").colorbox({inline:true, width:"50%"});

 new WOW().init();


// Smooth Scroll Script
 $('a').click(function(){
    $('html, body').animate({
        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
    }, 500);
    return false;
});

/*
		FAQ dropdowns
__________________________________________
*/
$('.question').click(function() {

    $(this).next('.answer').slideToggle(500);
    $(this).toggleClass('close');

});

// $( ".owner-readmore" ).click(function() {     
//     $(this).prev('.owner-content').animate( {'max-height': '1500px', 'paddingBottom': '00px'}, 500);    
//     $(this).css({'display': 'none'});
//     $(this).next('.owner-readless').css({'display': 'block'});
//     //$(this).empty();
//   	//$(this).html("read less");  
//   	//$(this).removeClass('owner-readmore'); 
//   	//$(this).addClass('owner-readless'); 
// });

// $( ".owner-readless" ).click(function() {     
//     $(this).parent('.owner-container').find('.owner-content').animate( {'height': '360px', 'paddingBottom': '00px'}, 500);    
//     $(this).css({'display': 'none'});
//     $(this).parent('.owner-container').find('.owner-readmore').css({'display': 'block'});
// });

$( ".owner-readmore" ).click(function() {   
	//$(this).empty();
  	//$(this).html("read less");
  	$(this).parent('.owner-container').find('.owner-content').toggleClass('owner-closed owner-open');
});
	
	//Isotope with images loaded ...
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});
	
	
	// Equal heights divs
	$('.blocks').matchHeight();
	/*var byRow = $('body').hasClass('test-rows');
		$('.blocks-container').each(function() {
		 $(this).children('.blocks').matchHeight({
			   byRow: byRow
		//property: 'min-height'
		});
	});*/

// $(function() {
//   $('a[href*=#]:not([href=#])').click(function() {
//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//       if (target.length) {
//         $('html,body').animate({
//           scrollTop: target.offset().top
//         }, 1000);
//         return false;
//       }
//     }
//   });
// });

$(function(){	

   $("html").niceScroll();
});

});// END #####################################    END