// Menu Functions
function expert_gardener_openNav() {
  jQuery(".sidenav").addClass('show');
}

function expert_gardener_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

/////////////////////// Focus handling ///////////////////////
(function(window, document) {
  function expert_gardener_handleMobileMenuNavigation() {
    document.addEventListener('keydown', function(e) {
      if (window.innerWidth > 991) return;
      const nav = document.querySelector('.sidenav.show');
      if (!nav) return;
      const focusableElements = Array.from(nav.querySelectorAll(
        'a, button, [tabindex="0"], input, [tabindex]:not([tabindex="-1"])'
      )).filter(el => el.offsetParent !== null);

      if (focusableElements.length === 0) return;

      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];
      const activeElement = document.activeElement;

      if (e.key === 'Tab') {
        if (!e.shiftKey && activeElement === lastElement) {
          e.preventDefault();
          firstElement.focus();
        } 
        else if (e.shiftKey && activeElement === firstElement) {
          e.preventDefault();
          lastElement.focus();
        }
        else if (!nav.contains(activeElement)) {
          e.preventDefault();
          firstElement.focus();
        }
        return;
      }

      if (e.key === 'Tab' && e.shiftKey) {
        const activeElement = document.activeElement;

        if (activeElement.closest('.dropdown-menu')) {
          e.preventDefault();
          
          //current submenu
          const currentSubmenu = activeElement.closest('.dropdown-menu');
          const submenuItems = Array.from(currentSubmenu.querySelectorAll('a, button, [tabindex="0"]'))
            .filter(el => el.offsetParent !== null);
          const currentIndex = submenuItems.indexOf(activeElement);
          if (currentIndex > 0) {
            submenuItems[currentIndex - 1].focus();
          } else {
            const parentDropdown = currentSubmenu.closest('.dropdown, .page_item_has_children');
            if (parentDropdown) {
              // Find all focusable elements in parent
              const allFocusable = Array.from(parentDropdown.querySelectorAll('a, button, [tabindex="0"]'))
                .filter(el => el.offsetParent !== null);
              
              // Filter to only direct children of parentDropdown
              const parentItems = allFocusable.filter(el => el.parentElement === parentDropdown);
              
              if (parentItems.length > 0) {
                parentItems[0].focus();
              }
            }
          }
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    expert_gardener_handleMobileMenuNavigation();

    document.addEventListener('focusin', function(e) {
      if (window.innerWidth > 991) return;
      
      const focusedItem = e.target;
      const submenu = focusedItem.closest('.dropdown-menu');
      if (submenu) {
        submenu.style.display = 'block';
        submenu.classList.add('show');
      }
    });
  });
})(window, document);

/////////////////////// end ///////////////////////

jQuery(function($) {
  "use strict";

  // Search focus handler
  ExpertGardenerSearchFocusHandler();

  // Scroll to top button
  let scrollTopButton = $('#scrolltop');
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      scrollTopButton.addClass('scroll');
    } else {
      scrollTopButton.removeClass('scroll');
    }
  });
  scrollTopButton.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
  });

  // Loading screen (preloader)
  window.addEventListener('load', function() {
    $(".loading").delay(2000).fadeOut("slow");
  });

  /////////////////////// Menu events binding ///////////////////////

  $(document).ready(function () {
    /*--- adding dropdown class to menu -----*/
    $("ul.sub-menu,ul.children").parent().addClass("dropdown");
    $("ul.sub-menu,ul.children").addClass("dropdown-menu");
    $("ul#menuid li.dropdown a,ul.children li.dropdown a").addClass("dropdown-toggle");
    $("ul.sub-menu li a,ul.children li a").removeClass("dropdown-toggle");
    $('nav li.dropdown > a, .page_item_has_children a').append('<span class="caret"></span>');
    $('a.dropdown-toggle').attr('data-toggle', 'dropdown');

    /*-- Mobile menu --*/
    if ($('#site-navigation').length) {
        $('#site-navigation .menu li.dropdown,li.page_item_has_children').append(function () {
            return '<i class="fas fa-caret-down abc" aria-hd="true"></i>';
        });
        $('#site-navigation .menu li.dropdown .fas,li.page_item_has_children .fas').on('click', function () {
            $(this).parent('li').children('ul').slideToggle().toggleClass('show');
        });
    }

    /*-- tooltip --*/
    $('[data-toggle="tooltip"]').tooltip();

    /*-- Button Up --*/
    var btnUp = $('<div/>', { 'class': 'btntoTop' });
    btnUp.appendTo('body');
    $(document).on('click', '.btntoTop', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 700);
    });

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 200)
            $('.btntoTop').addClass('active');
        else
            $('.btntoTop').removeClass('active');
    });

    /*-- Reload page when width is between 320 and 768px and only from desktop */
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
    $(window).on('resize', function () {
        var win = $(this); //this = window
        if (win.width() > 320 && win.width() < 991 && isMobile == false && !$("body").hasClass("elementor-editor-active")) {
            location.reload();
        }
    });
    });

  /////////////////////// end ///////////////////////

  // Search focus handler function
  function ExpertGardenerSearchFocusHandler() {
    const searchFirstTab = $('.inner_searchbox input[type="search"]');
    const searchLastTab = $('button.search-close');

    $(".open-search").click(function(e) {
      e.preventDefault();
      e.stopPropagation();
      $('body').addClass("search-focus");
      searchFirstTab.focus();
    });

    $("button.search-close").click(function(e) {
      e.preventDefault();
      e.stopPropagation();
      $('body').removeClass("search-focus");
      $(".open-search").focus();
    });

    // Redirect last tab to first input
    searchLastTab.on('keydown', function(e) {
      if ($('body').hasClass('search-focus') && e.which === 9 && !e.shiftKey) {
        e.preventDefault();
        searchFirstTab.focus();
      }
    });

    // Redirect first shift+tab to last input
    searchFirstTab.on('keydown', function(e) {
      if ($('body').hasClass('search-focus') && e.which === 9 && e.shiftKey) {
        e.preventDefault();
        searchLastTab.focus();
      }
    });

    // Allow escape key to close menu
    $('.inner_searchbox').on('keyup', function(e) {
      if ($('body').hasClass('search-focus') && e.keyCode === 27) {
        $('body').removeClass('search-focus');
        searchLastTab.focus();
      }
    });
  }
});

// Owl Carousel initialization
jQuery(document).ready(function($) {
  $('#slider .owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    items: 1,
    navText: ['<span class="vertical-nav pre">PREV</span>', '<span class="vertical-nav next">NEXT</span>']
  });
});

//sticy header js

jQuery(window).scroll(function () {
  var sticky = jQuery('.sticky-header'),
  scroll = jQuery(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed-header');
  else sticky.removeClass('fixed-header');
});