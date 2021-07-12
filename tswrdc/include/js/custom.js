var $ = jQuery.noConflict();
jQuery(document).ready(function($){

/*==========================*/
/* sliders */
/*==========================*/
if ($('.hero-slider > div').length > 1) {
    jQuery('.hero-slider').slick({
        dots: false,
        infinite: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 300,
        slidesToShow: 1,
         slidesToScroll: 1,
        asNavFor: '.hero-image-slider',
        focusOnSelect: true
    });
    $('.hero-image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 4000,
        speed: 300,
        arrows: true,
        dots:true,
        asNavFor: '.hero-slider'       
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
/* magnific-popup */
/*==========================*/
$(".gallery-thumbnails-item").on("click", function () {
    $(this).find(".gallery-item").magnificPopup("open");
});
$(".gallery-item").each(function () {
    $(this).magnificPopup({
        delegate: "a",
        type: "image",
        gallery: {
            enabled: true,
        },
    });
});



/*==========================*/
/* Homepage blog, events, gallery slider */
/*==========================*/ 
if ($('.post-slider').length > 1) {      
jQuery('.post-slider').slick({
  infinite: false,
  centerMode: true,
  
  arrows: false,
  dots:true,
  slidesToShow: 3,
  slidesToScroll: 3,
  initialSlide:1,
  centerPadding: '0px',
  responsive: [
    {
      breakpoint: 1048,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0',
        slidesToScroll: 2,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 730,
      settings: {
        arrows: false,
        centerMode: false,
        centerPadding: '0px',
        slidesToShow: 1,
        slidesToShow: 1,
        initialSlide:0,
        adaptiveHeight: true
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


$(window).on('scroll', function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
        $("body").addClass("fixed");
    } else {
        $("body").removeClass("fixed");
    }
});

/*==========================*/
/* toggle class*/
/*==========================*/ 
$("#upcoming-event").on('click',function(){
  $("#default-event").addClass("d-none");
});

/*   $("#song-entry").submit(function (event) {
    $.ajax({
      type: "POST",
      url: "process.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);

      if (!data.success) {
        if (data.errors.name) {
          $("#name-group").addClass("has-error");
          $("#name-group").append(
            '<div class="help-block">' + data.errors.name + "</div>"
          );
        }

        if (data.errors.email) {
          $("#email-group").addClass("has-error");
          $("#email-group").append(
            '<div class="help-block">' + data.errors.email + "</div>"
          );
        }

        if (data.errors.superheroAlias) {
          $("#superhero-group").addClass("has-error");
          $("#superhero-group").append(
            '<div class="help-block">' + data.errors.superheroAlias + "</div>"
          );
        }
      } else {
        $("form").html(
          '<div class="alert alert-success">' + data.message + "</div>"
        );
      }

    });
});*/