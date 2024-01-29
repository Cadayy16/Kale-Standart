(function($) {
    'use strict';
  $(document).ready(function () {
	  // Clients
      $(".partner-carousel").owlCarousel({
        rtl: $("html").attr("dir") == 'rtl' ? true : false,
        loop: true,
        dots: false,
        center: true,
        nav: true,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
        margin: 30,
        autoplay: false,
        autoplayTimeout: 10000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive: {
          0: {
            items: 2
          },
          768: {
            items: 3
          },
          992: {
            items: 5,
          }
        }
      });
	  
  });
})(jQuery);
