/**
*
* -----------------------------------------------------------------------------
*
* Template : SEO LAB HTML5 Template 
* Author : rs-theme
* Author URI : http://www.rstheme.com/
*
* -----------------------------------------------------------------------------
*
**/

(function($) {
    "use strict";	
	//preloader
	$(window).on( 'load', function() {
		$("#loading").delay(2000).fadeOut(500);
		$("#loading-center").on( 'click', function() {
		$("#loading").fadeOut(500);
		})
	})
	//Slider js
	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#carousel-example-generic'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
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

    // sticky menu 
    var header = $('.menu-sticky');
    var win = $(window);
    if ($(window).width() >= 991) {
        win.on('scroll', function() {

           var scroll = win.scrollTop();
           if (scroll < 150) {
               header.removeClass("sticky");
        	   header.addClass("header2");
           } else {
               header.addClass("sticky");
        	   header.removeClass("header2");
           }
        });
    }


    // video 
    if ($('.player').length) {
        $(".player").YTPlayer();
    }

    // wow init
    new WOW().init();
    
    // image loaded portfolio init
    $('.grid').imagesLoaded(function() {
        $('.portfolio-filter').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-item',
            }
        });
    });        
        
    // portfolio Filter
    $('.portfolio-filter button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});
		
	// Skill bar
	var skillbar = $('.skillbar');
	if(skillbar.length){
		$('.skillbar').skillBars({	
			from: 0,	
			speed: 4000, 	
			interval: 100,	
			decimals: 0,	
		});
	}
	
	// Feature left 
	var featureleft = $('#feature-left');
	if(featureleft.length){
		$('#feature-left').owlCarousel({
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			items: 1,
			mouseDrag: false,
			dotsContainer: '#item-thumb',
		});
	}

    // magnificPopup init
	var imagepopup = $('.image-popup');
	if(imagepopup.length){
		$('.image-popup').magnificPopup({
			type: 'image',
			callbacks: {
				beforeOpen: function() {
				   this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure animated zoomInDown');
				}
			},
			gallery: {
				enabled: true
			}
		});
	}
    
    // Get a quote popup
	var popupquote = $('.popup-quote');
    if(popupquote.length){
		$('.popup-quote').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#qname',
			removalDelay: 500, //delay removal by X to allow out-animation
			// When elemened is focused, some mobile browsers in some cases zoom in
			// It looks not nice, so we disable it:
			callbacks: {
				beforeOpen: function() {
					this.st.mainClass = this.st.el.attr('data-effect');
					if($(window).width() < 700) {
						this.st.focus = false;
					} else {
						this.st.focus = '#qname';
					}
				}
			}
		});
	}

    // team init
	var teamcarousel = $('.team-carousel');
    if(teamcarousel.length){
		$(".team-carousel").owlCarousel({
			margin:30,
			nav:true,
			loop:true,
			items:3,
			autoplay:true,
			autoplayTimeout:1000,
			autoplayHoverPause:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}
	
	// about team
	var teamlist = $('.team-list');
    if(teamlist.length){
		$(".team-list").owlCarousel({
			margin:30,
			loop:true,
			items:3,
			autoplay:3000,
			loop: true,
			dots: false,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			autoplayHoverPause:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}

    // testimonial init
	var testicarousel = $('.testi-carousel');
    if(testicarousel.length){
		$(".testi-carousel").owlCarousel({
			margin:30,
			nav:true,
			loop:true,
			items:2,
			autoplay:true,
			autoplayTimeout:3000,
			slideSpeed : 5000,
			paginationSpeed : 1500,
			rewindSpeed : 1500,
			lazyLoad:true,
			autoplayHoverPause:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:2
				}
			}
		});
	}
	
    // blog init
	var blogcarousel = $('.blog-carousel');
    if(blogcarousel.length){
		$(".blog-carousel").owlCarousel({
			margin:30,
			nav:true,
			loop:true,
			items:3,
			autoplay:false,
			autoplayTimeout:1000,
			autoplayHoverPause:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}


    // partner init
	var partnercarousel = $('.partner-carousel');
    if(partnercarousel.length){
		$(".partner-carousel").owlCarousel({
			margin:0,
			loop:true,
			items:4,
			dots: false,
			autoplay:true,
			autoplayTimeout:1200,
			autoplayHoverPause:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				400:{
					items:2
				},
				750:{
					items:2
				},
				1120:{
					items:4
				}
			}
		});
	}
	
	// RS Customer Review
	var rscustomerreview = $('#rs-customer-review');
    if(rscustomerreview.length){
		$("#rs-customer-review").owlCarousel({
			margin:30,
			nav:false,
			dots:true,
			loop:true,
			items:3,
			dotData: true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:3
				}
			}

		});
	}
	
	// Blog Posts
	var blogposts = $('.blog-posts');
    if(blogposts.length){
		$(".blog-posts").owlCarousel({
			margin:30,
			nav:true,
			dots:false,
			navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			loop:true,
			items:3,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}
	
	// Preloader	
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 3000);
		
    // Counter Up  
	var rscounter = $('.rs-counter');
    if(rscounter.length){
		$('.rs-counter').counterUp({
			delay: 20,
			time: 1500
		});
	}
	
    // scrollTop init
    var totop = $('#scrollUp');    
    win.on('scroll', function() {
        if (win.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    });
	
	/*-------------------------------------
    Main Menu jQuery activation code
    -------------------------------------*/    
   $("#main-nav ul li a")
        .on('click', function(e) {
            var link = $(this);

            var item = link.parent("li");
            
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }

            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                link.attr("href", "#");
                setTimeout(function () { 
                    link.attr("href", href);
                }, 300);
                e.preventDefault();
            }
        })
        .each(function() {
            var link = $(this);
            if (link.get(0).href === location.href) {
                link.addClass("active").parents("li").addClass("active");
                return false;
            }
    });

	
	/*-------------------------------------
		Responsive Menu js
    -------------------------------------*/
	jQuery('.stellarnav').stellarNav({
		theme: 'light'
	});

    //Team Slider
	var sliderstyle1 = $('#slider-style-1');
    if(sliderstyle1.length){
		$("#slider-style-1").owlCarousel({        
			autoPlay:true,
			slideSpeed : 1600,
			paginationSpeed : 1600,
			loop: true,
			dots: false,
			nav: true,
			items:3,
			margin:30,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				650:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});
	}

    //Testimonial Slider
	var rststslider = $('.rs-tst-slider');
    if(rststslider.length){ 	
		$(".rs-tst-slider").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			centerPadding: '60px',
			slidesToShow: 5,
			slidesToScroll: 1,
			variableWidth: true
		});
	}


	if ($.fn.onePageNav) {
		$(".nav-menu, .sidebarnav_menu").onePageNav({
			currentClass: "current-menu-item"
		});
	}

    //CountDown Timer
    var CountTimer = $('.CountDownTimer');
    if(CountTimer.length){ 
        $(".CountDownTimer").TimeCircles({
            fg_width: 0.030,
            bg_width: 0.8,
            circle_bg_color: "#ffffff",
            circle_fg_color: "#ffffff",
            time: {
                Days:{
                    color: "#fff"
                },
                Hours:{
                    color: "#fff"
                },
                Minutes:{
                    color: "#fff"
                },
                Seconds:{
                    color: "#fff"
                }
            }
        }); 
    }
    
    //canvas menu
    $('#nav-expander').on('click',function(e){
        e.preventDefault();
        $('body').toggleClass('nav-expanded'), $(".body-overlay").toggleClass(".overlay-active");
    });
    $('#nav-close').on('click',function(e){
        e.preventDefault();
        $('body').removeClass('nav-expanded'), $(".body-overlay").removeClass(".overlay-active");
    });
    
    $( ".sidebarnav_menu li a.first-parent" ).on('click', function() {
      $(this).parents(".first-parent").children( ".submenu" ).slideToggle( "slow", function() {
      });
    });
    $( ".sidebarnav_menu .submenu li.menu-item-has-children a" ).on('click', function() {
      $(this).parents(".menu-item-has-children").children( "ul.mega-submenu" ).slideToggle( "slow", function() {
      });
    });

    //OnPage Add Class
    $(".rs-onpage-menu ul li a").on('click',function(e){
        e.preventDefault();
        $(document).off("scroll");
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
    });

    //Home Accordion
		
    $(".rs-panel-heading").on('click',function(){
        $(this).parents(".rs-panel").children(".rs-panel-heading, .rs-panel-collapse" ).toggleClass("active");
    });

    //Mobile Menu
    $(".main-menu a.rs-menu-toggle").on('click',function(){
        $(".rs-menu").toggleClass("rs-menu-close");
    });
	
	
})(jQuery);