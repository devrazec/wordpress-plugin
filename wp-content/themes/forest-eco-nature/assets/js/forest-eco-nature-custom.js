/**
  * Theme Js file.
**/

jQuery('document').ready(function($){
  setTimeout(function () {
    jQuery(".loader").fadeOut("slow");
  },1000);
});

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

// ===== Mobile responsive Menu ====

function forest_eco_nature_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function forest_eco_nature_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(document).ready(function($) {
    // Handle click event on previous button to move the slider upwards
    $('.carousel-control-prev').click(function(event) {
        event.preventDefault();
        $('#carouselExampleIndicators').carousel('prev');
    });

    // Handle click event on next button to move the slider downwards
    $('.carousel-control-next').click(function(event) {
        event.preventDefault();
        $('#carouselExampleIndicators').carousel('next');
    });
});



