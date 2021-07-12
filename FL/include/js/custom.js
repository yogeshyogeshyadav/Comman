var $ = jQuery.noConflict();
jQuery(document).ready(function($){

$('#mainNav')
  .on('hide.bs.collapse', function () {
      $('body').removeClass('menu-overlay');
  })
  .on('show.bs.collapse', function () {
      $('body').addClass('menu-overlay');
  });



/*==========================*/ 
/* sliders */ 
/*==========================*/
if($('.hero-slider').length > 0){
jQuery('.hero-slider').slick({
   dots: true,
  infinite: true,
       arrows:false,
       autoplay: false,
       autoplaySpeed: 4000,
       speed: 300,
       infinite: true,
       responsive: [
         
         {
           breakpoint: 768,
           settings: {
             arrows: false,
             slidesToShow: 1,
             slidesToScroll: 1,
             dots: true,
           }
         }
       ]
        
     });
}


if($('.simple-slider').length > 0){
jQuery('.simple-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: false,
  arrows: false, 
  infinite: true, 
  centerMode: false, 
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 300,
   
});
}


if($('.service-slider > div').length > 1){
jQuery('.service-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows: false, 
  infinite: true, 
  centerMode: false, 
   
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
  infinite: false, 
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
var scroll = $(window).scrollTop();
if (scroll >= 10) {
    $("body").addClass("fixed");
} else {
    $("body").removeClass("fixed");
}


});


$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
        $("body").addClass("fixed");
    } else {
        $("body").removeClass("fixed");
    }
});


