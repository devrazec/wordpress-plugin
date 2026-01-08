jQuery(function($){
  "use strict";
  jQuery('.main-menu-navigation > ul').superfish({
    delay:       0,                            
    animation:   {opacity:'show',height:'show'},  
    speed:       'fast'                        
  });
});

// scroll
jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#scroll-top').fadeIn();
    } else {
      jQuery('#scroll-top').fadeOut();
    }
  });
  jQuery(window).on("scroll", function () {
    document.getElementById("scroll-top").style.display = "block";
  });
  jQuery('#scroll-top').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });

  tour_planner_ebooking_MobileMenuInit();
});

(function( $ ) {

  $(window).scroll(function(){
    var sticky = $('.sticky-header'),
    scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed-header');
    else sticky.removeClass('fixed-header');
  });

  $(window).scroll(function(){
    var sticky = $('.logo-sticky-header'),
    scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('header-fixed');
    else sticky.removeClass('header-fixed');
  });

})( jQuery );

// preloader
jQuery(function($){
  setTimeout(function(){
    $("#loader-wrapper").delay(1000).fadeOut("slow");
  });
});

function tour_planner_ebooking_MobileMenuInit() {

  /* First and last elements in the menu */
  var tour_planner_ebooking_firstTab = jQuery('.main-menu-navigation ul:first li:first a');
  var tour_planner_ebooking_lastTab  = jQuery('a.closebtn'); /* Cancel button will always be last */

  jQuery(".mobiletoggle").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("noscroll");
    tour_planner_ebooking_firstTab.focus();
  });

  jQuery("a.closebtn").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("noscroll");
    jQuery(".mobiletoggle").focus();
  });

  /* Redirect last tab to first input */
  tour_planner_ebooking_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('noscroll'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      tour_planner_ebooking_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  tour_planner_ebooking_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('noscroll'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      tour_planner_ebooking_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.sidebar').on('keyup', function(e){
    if (jQuery('body').hasClass('noscroll'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('noscroll');
      tour_planner_ebooking_lastTab.focus();
    };
  });
}
