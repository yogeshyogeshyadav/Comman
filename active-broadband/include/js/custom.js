jQuery(document).ready(function($){

/*==========================*/ 
/* sliders */ 
/*==========================*/
if($('.simple-slider').length > 0){
jQuery('.simple-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows: true, 
  infinite: true, 
  centerMode: false, 
  responsive: [
     {
      breakpoint: 768,
      settings: {
        arrows: false,
      }
    }
  ]
   
});
}
 
/*==========================*/  
/* Mobile Slider */  
/*==========================*/ 
if($('.mobile-slider').length > 0){
jQuery('.mobile-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows: false, 
  infinite: true, 
  centerMode: false, 
  responsive: [
    {
      breakpoint: 5000,
      settings: "unslick"
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,  
        adaptiveHeight: false
      }
    }
  ]
});
}
 

/*==========================*/  
/* Scroll on animate */  
/*==========================*/
function onScrollInit( items, trigger ) {
  items.each( function() {
    var osElement = $(this),
        osAnimationClass = osElement.attr('data-os-animation'),
        osAnimationDelay = osElement.attr('data-os-animation-delay');
        osElement.css({
          '-webkit-animation-delay':  osAnimationDelay,
          '-moz-animation-delay':     osAnimationDelay,
          'animation-delay':          osAnimationDelay
        });
        var osTrigger = ( trigger ) ? trigger : osElement;
        osTrigger.waypoint(function() {
          osElement.addClass('animated').addClass(osAnimationClass);
          },{
              triggerOnce: true,
              offset: '95%',
        });
// osElement.removeClass('fadeInUp');
  });
}
onScrollInit( $('.os-animation') );
onScrollInit( $('.staggered-animation'), $('.staggered-animation-container'));


/*==========================*/
/* Header fix */
/*==========================*/
var scroll = jQuery(window).scrollTop();
if (scroll >= 10) {
    jQuery("body").addClass("fixed");
} else {
    jQuery("body").removeClass("fixed");
}


});


jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 10) {
        jQuery("body").addClass("fixed");
    } else {
        jQuery("body").removeClass("fixed");
    }
});

/*==========================*/
//jQuery for page scrolling feature - requires jQuery Easing plugin
jQuery(function() {
    jQuery('.menu-item-type-custom  a').bind('click', function(event) {
      var headerHeight = jQuery('#header').outerHeight()
        var jQueryanchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top - headerHeight
       }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
   jQuery(".navbar-nav li a").click(function (event) {
    var toggle = jQuery(".navbar-toggle").is(":visible");
    if (toggle) {
      jQuery(".navbar-collapse").collapse('hide');
    }
  });

jQuery(function() {
    jQuery('a.page-scroll').bind('click', function(event) {
      var headerHeight = jQuery('#header').outerHeight()
        var jQueryanchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top - headerHeight
       }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
  /*==========================*/