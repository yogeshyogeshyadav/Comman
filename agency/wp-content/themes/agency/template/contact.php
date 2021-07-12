<?php
/*==============================*/
// @package SLICEmyPAGE
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Contact */

get_header();


get_template_part('template-part/inner-banner');
$form_colored_heading = get_field('form_colored_heading');
$form_heading = get_field('form_heading');
$form_text = get_field('form_text');
$id = get_field('choose_form');
?>	
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
    	<?php if(!empty($form_colored_heading ||$form_heading || $form_text)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($form_colored_heading)): echo '<h6>'.$form_colored_heading.'</h6>'; endif; 
                    if(!empty($form_heading)): echo '<h3>'.$form_heading.'</h3>'; endif; 
                    if(!empty($form_text)): echo '<p>'.$form_text.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php 
        endif;
        if(!empty($id)):
        ?>
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-10 offset-md-1">
                <?php echo do_shortcode('[contact-form-7 id="'.$id.'" title="Contact Form"]'); ?>
            </div>
        </div>
    	<?php endif; ?>
    </div>
</div>

<!--============================== Content Section End ==============================-->
<?php 

$address_address = get_field('address_address');
$address_email = get_field('address_email');
$address_other_email = get_field('address_other_email');
$address_phone = get_field('address_phone');
$address_alternate_phone = get_field('address_alternate_phone');
$phone_one = preg_replace('/  */', '', $address_phone);
$phone_two = preg_replace('/  */', '', $address_alternate_phone);
$map_latitude = get_field('map_latitude');
$map_longitude = get_field('map_longitude');
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container contact-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="contact-list">
                        	<?php if(!empty($address_address)): ?>
                            <li>
                                <div class="icon2">
                                    <i class="fa fa-location-arrow"></i></div>
                                <h5>Address</h5>
                                <?php echo $address_address; ?>
                            </li>
                        	<?php 
                        	endif;
                        	if(!empty($address_email)): 
                        	?>
                            <li>
                                <div class="icon2"><i class="fa fa-envelope"></i></div>
                                <h5>Email</h5>
                                <p>
                                	<a href="mailto:<?php echo $address_address; ?>"><?php echo $address_address; ?></a><br>
                                    <a href="mailto:<?php echo $address_other_email; ?>"><?php echo $address_other_email; ?></a>
                                </p>
                            </li>
                        	<?php 
                        	endif;
                        	if(!empty($address_phone)): 
                        	?>
                            <li>
                                <div class="icon2"><i class="fa fa-mobile"></i></div>
                                <h5>Phone</h5>
                                <p>
                                	<a href="tel:<?php echo $phone_one; ?>">+91 - <?php echo $address_phone; ?></a><br>
                                    <a href="tel:<?php echo $phone_two; ?>">+91 - <?php echo $address_alternate_phone; ?></a>
                                </p>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-container">
        <div id="map-canvas"></div>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php get_footer(); ?>
<script>
	if($('#map-canvas').length != 0){
    var map;
    function initialize() {
      var mapOptions = {
        zoom: 18,
        scrollwheel: false,
        center: new google.maps.LatLng(<?php echo $map_latitude; ?>, <?php echo $map_longitude; ?>),
        styles: [
              {"stylers": [{ hue: "#00bcb4" },
              { saturation: 0 },
              { lightness: 0 }]},
              {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{"visibility": "off"}]
              },
              {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{"lightness": 100},
                      {"visibility": "simplified"}]
              }
        ]
      };
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      var image = 'include/images/map-marker.png';
      var myLatLng = new google.maps.LatLng(<?php echo $map_latitude; ?>, <?php echo $map_longitude; ?>);
      var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
       });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  }
</script>