;(function($) {
    "use strict";

    //* mainNavbar
    function mainNavbar(){
        if ( $('#main_navbar').length ){
             $('#main_navbar').affix({
                offset: {
                    top: 10,
                    bottom: function () {
                        return (this.bottom = $('.footer').outerHeight(true))
                    }
                }
            });
        };
    };

	 //* nav_searchFrom
    function searchFrom(){
        if ( $('.nav_searchFrom').length ){
             $('.nav_searchFrom').on('click',function(){
                $('.searchForm').toggleClass('show');
                return false
            });
            $('.form_hide').on('click',function(){
                $('.searchForm').removeClass('show')
            });
        };
    };

    //*  Main slider js
    function home_main_slider(){
        if ( $('.slider_inner').length ){
            $('.slider_inner').camera({
                loader: true,
                navigation: true,
                autoPlay:true,
                time: 4000,
                playPause: false,
                pagination: false,
                thumbnails: false,
                overlayer: true,
                hover: false,
                minHeight: '500px',
            });
        }
    }

    //* Isotope Js
    function portfolio_isotope(){
        if ( $('.portfolio_item, .portfolio_2 .portfolio_filter ul li').length ){
            // Activate isotope in container
            $(".portfolio_item").imagesLoaded( function() {
                $(".portfolio_item").isotope({
                    itemSelector: ".single_facilities",
                    layoutMode: 'masonry',
                    percentPosition:true,
                    masonry: {
                        columnWidth: ".grid-sizer, .grid-sizer-2"
                    }
                });
            });

            // Activate isotope in container
            $(".portfolio_2").imagesLoaded( function() {
                $(".portfolio_2").isotope({
                    itemSelector: ".single_facilities",
                    layoutMode: 'fitRows',
                });
            });
            // Add isotope click function
            $(".portfolio_filter ul li").on('click',function(){
                $(".portfolio_filter ul li").removeClass("active");
                $(this).addClass("active");

                var selector = $(this).attr("data-filter");
                $(".portfolio_item, .portfolio_2").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 450,
                        easing: "linear",
                        queue: false,
                    }
                });
                return false;
            });
        }
    };

    //* Blog
    $(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 2,
        itemsDesktop : [1199,2],
        itemsMobile : [600,1],
        pagination :true,
        autoPlay : true
    });
});

    //* Testimonials
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:1,
            itemsDesktop:[1000,2],
            itemsDesktopSmall:[979,2],
            itemsTablet:[768,2],
            itemsMobile:[550,1],
            pagination: true,
            autoPlay:true,
			navigation: true,
        });
    });
    //* Stellar
    $(function(){
        $.stellar({
            horizontalScrolling: false,
            verticalOffset: 40
        });
    });

     //* counterUp JS
    function counterUp(){
        if ( $('.counter').length ){
            $('.counter').counterUp({
                delay: 10,
                time: 900,
            });
        }
    };

    //* Testimonial Carosel
    function testimonialsCarosel(){
        if ( $('.testimonial_carosel').length ){
            $('.testimonial_carosel').owlCarousel({
                loop:true,
                items:1,
                autoplay:false,
            });
        };
    };







    //* Testimonial Carosel
    function partnersCarosel(){
        if ( $('.partners').length ){
            $('.partners').owlCarousel({
                loop:true,
                items:5,
                margin:110,
                autoplay:true,
                response:true,
                responsive:{
                    300:{
                        items:1,
                        margin:0,
                    },
                    500:{
                        items:3,
                    },
                    700:{
                        items:3,
                    },
                    800:{
                        items:4,
                        margin:40,
                    },
                    1000:{
                        items:5,
                    },
                }
            });
        };
    };

    //* waypoint JS
    function ourSkrill(){
         if ( $('.our_skill_inner').length ){
             $(".our_skill_inner").each(function() {
                $(this).waypoint(function() {
                    var progressBar = $(".progress-bar");
                    progressBar.each(function(indx){
                        $(this).css("width", $(this).attr("aria-valuenow") + "%")
                    })
                },
                {
                    triggerOnce: true,
                    offset: 'bottom-in-view'

                });
            });
         }
    };

     //* counterUp 2 JS
    function counterUp2(){
        if ( $('.counter2').length ){
            $('.counter2').counterUp({
                delay: 10,
                time: 200,
            });
        }
    };

    //* Hide Loading Box (Preloader)
     function preloader(){
        if ( $('.preloader').length ){
             $(window).load(function() {
                $('.preloader').delay(500).fadeOut('slow');
                $('body').delay(500).css({'overflow':'visible'});
            });
        }
    };

	//* Scrolling JS(JS Scroll)
     function scrolling(){
        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: (target.offset().top - 100)
            }, 1000, "easeInOutExpo");
            return false;
          }
        }
    });
    };

    /*Function Calls*/
    searchFrom ();
    new WOW().init();
	home_main_slider();
    testimonialsCarosel ();
    portfolio_isotope ();
    counterUp ();
    partnersCarosel ();
    ourSkrill ();
    counterUp2 ();
    mainNavbar ();
    preloader ();
    scrolling ();
})(jQuery);

//Variables on page load
	var $myCarousel = $('#carousel-example-generic'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

	//Initialize carousel
	$myCarousel.carousel();

	//Animate captions in first slide on page load
	//doAnimations($firstAnimatingElems);

	//Pause carousel
	$myCarousel.carousel('pause');
	//Other slides to be animated on carousel slide event
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		//doAnimations($animatingElems);
	});
    $('#carousel-example-generic').carousel({
        interval:3000,
        pause: "false"
    });

	$(window).scroll(function(){
	// Add parallax scrolling to all images in .paralax-image container
		$('#main-banner').each(function(){
			// only put top value if the window scroll has gone beyond the top of the image
			if ($(this).offset().top < $(window).scrollTop()) {
			  // Get ammount of pixels the image is above the top of the window
			  var difference = $(window).scrollTop() - $(this).offset().top;
			  // Top value of image is set to half the amount scrolled
			  // (this gives the illusion of the image scrolling slower than the rest of the page)
			  var half = (difference / 2) + 'px';

			  $(this).find('img').css('top', half);
			} else {
			  // if image is below the top of the window set top to 0
			  $(this).find('img').css('top', '0');
			}
		});
	});
