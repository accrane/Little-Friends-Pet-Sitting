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
	
	
/*
	Flexslider
__________________________________________
*/
$('.flexslider').flexslider({
	animation: "slide",
	smoothHeight: true
}); // end register flexslider

$('.inline').colorbox({
	inline:true,
	width: '80%', 

 });

/*
	Image Map highlight
__________________________________________
*/
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

/*
	Owner Read more with Bone
__________________________________________
*/
$( ".owner-readmore" ).click(function() {   
	//$(this).empty();
  	//$(this).html("read less");
  	$(this).parent('.owner-container').find('.owner-content').toggleClass('owner-closed owner-open');
});
/*
	Makes side by side divs equal heights
__________________________________________
*/
// Equal heights divs
$('.blocks').matchHeight();


$(function(){	
	$("html").niceScroll();
});

});// END #####################################    END