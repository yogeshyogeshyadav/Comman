<?php
/*==============================*/
// @package BKwai - Smarter construction monitoring
// @author Think EQ
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
/* ==============================
** Define Constants
** ============================== */
define('THEMEURI', get_theme_file_uri());
define('IMG', THEMEURI.'/include/images/');
define('THEMEDIR', get_template_directory());
if ( ! function_exists( 'fl_setup' ) ) :
function fl_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'fl' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
    //add_image_size('blog-thumbnails',704,380,array('center','center'));
    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );
    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
        'header' => __( 'Header Navigation', 'fl' ),
        'footer' => __( 'Footer Navigation', 'fl' )
	) );
    // This theme styles the visual editor to resemble the theme style,
    add_editor_style( array( 'editor-style.css', /*fl_fonts_url()*/ ) ); //get_stylesheet_uri()
    $GLOBALS['theme_options'] = array(
        'contact_url' => get_permalink(51),
        'telephone' => get_field('telephone','option'),
        'telephone_strip' => str_replace(' ','',get_field('telephone','option')),
        'email' => get_field('email','option'),
        'address' => get_field('address','option')
    );
    if(!file_exists(get_template_directory().'/class-wp-bootstrap-navwalker.php')){
        // File does not exist... return an error.
        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.','wp-bootstrap-navwalker'));
    }else{
        // File exists... require it.
        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
    }
}
endif;
add_action( 'after_setup_theme', 'fl_setup' );
// Sets the content width in pixels, based on the theme's design and stylesheet.
function fl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fl_content_width', 1170 );
}
add_action( 'after_setup_theme', 'fl_content_width', 0 );
/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function fl_register_post_type() {
    $singular = 'Service';
    $plural = 'Services';
    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New '.$singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit '.$singular,
        'new_item'              => 'New '.$singular,
        'view'                  => 'View '.$singular,
        'view_item'             => 'View '.$singular,
        'search_item'           => 'Search '.$plural,
        'parent'                => 'Parent '.$singular,
        'not_found'             => 'No '.$plural,
        'not_found_in_trash'    => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-post',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'service',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ),
    );
    register_post_type( 'services', $args);
    $singular = 'CTA';
    $plural = 'CTA';
    $labels = array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New '.$singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit '.$singular,
        'new_item'              => 'New '.$singular,
        'view'                  => 'View '.$singular,
        'view_item'             => 'View '.$singular,
        'search_item'           => 'Search '.$plural,
        'parent'                => 'Parent '.$singular,
        'not_found'             => 'No '.$plural,
        'not_found_in_trash'    => 'No '.$plural.' in Trash',
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => false,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => false,
        'menu_position'         => 56,
        'menu_icon'             => 'dashicons-admin-post',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => true,
        'query_var'             => false,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'cta',
            'with_front'=> true,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'              => array(
            'title'
        )
    );
    register_post_type('cta',$args);
    flush_rewrite_rules();
}
add_action( 'init', 'fl_register_post_type' );
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function fl_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Roboto font: on or off', 'acc')){
        $fonts[] = 'family=Roboto:wght@400;700';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
        /*$fonts_url = add_query_arg(array(
            'family' => $fonts[0],
            'family' => $fonts[1],
            'display' => $subsets,
        ),'https://fonts.googleapis.com/css2');*/
    }
    return $fonts_url;
}
/***********************************************************************************************/
/***********************************************************************************************/
if(!is_admin()){
/***********************************************************************************************/
require_once get_template_directory().'/page-modules/module-functions.php';
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function fl_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', fl_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.2', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',array(),'5.15.1', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );

    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery'),'4.5.2',true);
    wp_enqueue_script('waypoint', THEMEURI.'/include/js/jquery.waypoints.min.js',array('jquery'),'4.0.1',true);
    wp_enqueue_script('slick', THEMEURI.'/include/js/slick.min.js',array('jquery'),'1.8.1',true);
    if(function_exists('get_field')){
        wp_register_script('maps-googleapis', 'https://maps.googleapis.com/maps/api/js?key='.get_field('map_api_key','option'),array(),null,true);
    }
    if(function_exists('get_field') && get_field('map')):
        wp_enqueue_script('acf-map', THEMEURI.'/include/js/acf-map.js',array('jquery','maps-googleapis'),'5.8.6',false);
    endif;
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('jquery','ajax_object',array(
        'ajax_url'  =>  admin_url('admin-ajax.php'),
        'home_url'  =>  esc_url(home_url())
    ));
    wp_add_inline_script( 'jquery', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
    if (have_rows('modules',$pageid)):
        while (have_rows('modules',$pageid)) : the_row();
            if (get_row_layout() == 'hero_slider'):
                wp_enqueue_style('hero_slider',THEMEURI.'/page-modules/hero_slider/hero_slider.css',array('theme-style'),'1.0');
                wp_enqueue_script('hero_slider',THEMEURI.'/page-modules/hero_slider/hero_slider.js',array('slick','theme-script'),'1.0',true);
            endif;
        endwhile;
    endif;
}
add_action( 'wp_enqueue_scripts', 'fl_css_scripts' );
/***********************************************************************************************/
function fl_defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer="defer" src', $url );
}
add_filter( 'script_loader_tag', 'fl_defer_parsing_of_js', 10 );
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function fl_add_slug_body_class( $classes ) {
global $wpdb, $post;
if ( isset( $post ) ) {
    $classes[] = $post->post_name;
}
if (is_page()) {
    if ($post->post_parent) {
        $parent  = end(get_post_ancestors($current_page_id));
    } else {
        $parent = $post->ID;
    }
    $post_data = get_post($parent, ARRAY_A);
    $classes[] = $post_data['post_name'];
}
return $classes;
}
add_filter( 'body_class', 'fl_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'fl_active_nav_class' , 10 , 2);
function fl_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'fl_add_active_class', 10, 2 );
function fl_add_active_class($classes, $item) {
    if(is_singular('services') && in_array('menu-item-28', $classes)){
        $classes[] = "active";
    }
    return $classes;
}
function fl_year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'fl_year_shortcode');
// define the gsn_li_attributes callback 
function fl_bootstrap_gsn_li_attributes($li_class){
  // add 'breadcrumb-item' class
  $patterns[0] = '/class="/';
  $replacements[0] = '/class="breadcrumb-item ';
  // change 'current_item' to 'active'
  $patterns[1] = '/current_item/';
  $replacements[1] = 'active';
  return preg_replace( $patterns, $replacements, $li_class);
};
add_filter( "gsn_li_attributes", "fl_bootstrap_gsn_li_attributes", 10, 3);
function ao_get_domain_name($url){
    preg_match('@^(https?://)?([a-z0-9_-]+\.)*([a-z0-9_-]+)\.[a-z]{2,6}(/.*)?$@i',$url,$match);
    return $match[3];
}
/***********************************************************************************************/
/* Filter for CF7 select empty */
/***********************************************************************************************/
function fl_wpcf7_form_elements($html) {
    $text = 'Please select';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'fl_wpcf7_form_elements');
/***********************************************************************************************/
/* Excerpt Settings */
/***********************************************************************************************/
function fl_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'fl_excerpt_more');
function fl_excerpt_length( $length ) {
    return 48;
}
add_filter( 'excerpt_length', 'fl_excerpt_length', 999 );
/***********************************************************************************************/
/* Remove auto p from Contact Form 7 shortcode output */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
/***********************************************************************************************/
/* Get The COntent By ID */
/***********************************************************************************************/
function fl_get_the_content_by_id($pid,$tags=false){
    $content_post = get_post($pid);
    $content = $content_post->post_content;
    if($tags==true){
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
    }
    echo $content;
}
/***********************************************************************************************/
/* Iframe settings */
/***********************************************************************************************/
function ao_iframe($name){
    // get iframe HTML
    $iframe = $name;
    // use preg_match to find iframe src
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    // add extra params to iframe src
    $params = array(
        //'controls'    => 0,
        //'hd'        => 1,
        'autoplay'    => 0,
        'rel'        => 0,
        'enablejsapi'   => 1
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    // add extra attributes to iframe html
    $attributes = 'class="embed-responsive-item"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
    $iframe = str_replace('frameborder="0"', '', $iframe);
    return $iframe;
}
add_action('fl_iframe','fl_iframe');
/* Pull apart OEmbed video link to get thumbnails out*/
function get_video_thumbnail_uri( $video_uri ) {
    $thumbnail_uri = '';
    // determine the type of video and the video id
    $video = parse_video_uri( $video_uri );     
    // get youtube thumbnail
    if ( $video['type'] == 'youtube' )
        /*
        - http://img.youtube.com/vi/I03uuxgpWd8/0.jpg (480x360px)
        - http://img.youtube.com/vi/I03uuxgpWd8/1.jpg (120x90px)
        - http://img.youtube.com/vi/I03uuxgpWd8/2.jpg (120x90px)
        - http://img.youtube.com/vi/I03uuxgpWd8/3.jpg (120x90px)
        - http://img.youtube.com/vi/I03uuxgpWd8/maxresdefault.jpg (1920x1080px)
        - http://img.youtube.com/vi/I03uuxgpWd8/sddefault.jpg (640x480px)
        - http://img.youtube.com/vi/I03uuxgpWd8/hqdefault.jpg (480x360px)
        - http://img.youtube.com/vi/I03uuxgpWd8/mqdefault.jpg (320x180px)
        - http://img.youtube.com/vi/I03uuxgpWd8/default.jpg (120x90px)
        */
        $thumbnail_uri = 'https://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg';
    // get vimeo thumbnail
    if( $video['type'] == 'vimeo' )
        $thumbnail_uri = get_vimeo_thumbnail_uri( $video['id'] );
    // get default/placeholder thumbnail
    if( empty( $thumbnail_uri ) || is_wp_error( $thumbnail_uri ) )
        $thumbnail_uri = ''; 
    //return thumbnail uri
    return $thumbnail_uri;
}
/* Parse the video uri/url to determine the video type/source and the video id */
function parse_video_uri( $url ) {
    // Parse the url 
    $parse = parse_url( $url );
    // Set blank variables
    $video_type = '';
    $video_id = '';
    // Url is http://youtu.be/xxxx
    if ( $parse['host'] == 'youtu.be' ) {
        $video_type = 'youtube';
        $video_id = ltrim( $parse['path'],'/' );    
    }
    // Url is http://www.youtube.com/watch?v=xxxx 
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if ( ( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' ) ) {
        $video_type = 'youtube';
        parse_str( $parse['query'] );
        $video_id = $v; 
        if ( !empty( $feature ) )
            $video_id = end( explode( 'v=', $parse['query'] ) );
        if ( strpos( $parse['path'], 'embed' ) == 1 )
            $video_id = end( explode( '/', $parse['path'] ) );
    }
    // Url is http://www.vimeo.com
    if ( ( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' ) ) {
        $video_type = 'vimeo';
        $video_id = ltrim( $parse['path'],'/' );    
    }
    $host_names = explode(".", $parse['host'] );
    $rebuild = ( ! empty( $host_names[1] ) ? $host_names[1] : '') . '.' . ( ! empty($host_names[2] ) ? $host_names[2] : '');
    // If recognised type return video array
    if ( !empty( $video_type ) ) {
        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );
        return $video_array;
    } else {
        return false;
    }
}
/* Takes a Vimeo video/clip ID and calls the Vimeo API v2 to get the large thumbnail URL.*/
function get_vimeo_thumbnail_uri( $clip_id ) {
    $vimeo_api_uri = 'http://vimeo.com/api/v2/video/' . $clip_id . '.php';
    $vimeo_response = wp_remote_get( $vimeo_api_uri );
    if( is_wp_error( $vimeo_response ) ) {
        return $vimeo_response;
    } else {
        $vimeo_response = unserialize( $vimeo_response['body'] );
        return $vimeo_response[0]['thumbnail_large'];
    }    
}
add_action( 'fl_video_autoplay', 'fl_video_autoplay' );
function ao_video_autoplay($video){
  if($video){
    // Add autoplay functionality to the video code
    if(preg_match('/src="(.+?)"/', $video, $matches)){
      // Video source URL
      $src = $matches[1];
      // Add option to hide controls, enable HD, and do autoplay -- depending on provider
      $params = array(
        'controls'    => 1,
        'hd'        => 1,
        'fs'        => 1,
        'rel'        => 0,
        'modestbranding' => 1,
        'autoplay' => 1,
        'mute' => 1
      );
      $new_src = add_query_arg($params, $src);
      $video = str_replace($src, $new_src, $video);
      // add extra attributes to iframe html
      $attributes = 'frameborder="0"';
      $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
    }
    echo $video;
  }
}
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function ao_edit_page_link(){
    if(is_tax()){
        edit_term_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','<span class="edit-post-link">','</span>',null,'edit-post-link');
    }else{
        edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','','',null,'edit-post-link');
    }
}
add_action('ao_edit_page_link','ao_edit_page_link');
}
/***********************************************************************************************/
/***********************************************************************************************/
if(is_admin()){
/***********************************************************************************************/
/* Adding style css on dashboard */
/***********************************************************************************************/
function fl_admin_enqueue_scripts(){
    wp_enqueue_style( 'gs-admin-css', THEMEURI.'/admin-style.css', array(), 1);
}
add_action( 'admin_enqueue_scripts', 'fl_admin_enqueue_scripts' );
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','fl'),
        'menu_title'    =>  __('Theme Options','fl'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
}
/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'fl_remove_tax');
function fl_remove_tax() {
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'fl_remove_admin_menus' );
function fl_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'fl_remove_comment_support', 100);
function fl_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function fl_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'fl_admin_bar_render' );
/***********************************************************************************************/
/* Register Google Map API */
/***********************************************************************************************/
function fl_acf_google_map_api( $api ){
    $api['key'] = get_field('map_api_key','option');
    return $api;
}
add_filter('acf/fields/google_map/api', 'fl_acf_google_map_api');
function fl_acf_init() {
    acf_update_setting('google_api_key', get_field('map_api_key','option'));
}
add_action('acf/init', 'fl_acf_init');
}
