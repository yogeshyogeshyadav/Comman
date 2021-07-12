<?php
/*==============================*/
// @package SLICEmyPAGE
// @author SLICEmyPAGE
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
if(!function_exists('agency_dialysis_theme_support')) :
    function agency_dialysis_theme_support() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        // Add theme support title tag.
        add_theme_support( 'title-tag' );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        //add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'post-thumbnails' );
        load_theme_textdomain( 'SLICEmyPAGE' );
        set_post_thumbnail_size( 370, 248 );
        add_image_size( 'post-thumb', 420 );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
        // Resistor activebroadband nav menu
        register_nav_menus(
            array(
              'header_menu' => 'Header Menu',
              'sitemap' => 'Sitemap',
              'services' => 'Services',
            )
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
add_action( 'after_setup_theme', 'agency_dialysis_theme_support' );


/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function agency_dialysis_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_register_style('googleapis', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,700i,800' );
    wp_enqueue_style('googleapis');
   
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.css',array(),'4.0.0', 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap'));
    wp_enqueue_style('fontawesome', THEMEURI.'/include/css/fontawesome-all.css',array(),'5.0.8', 'all');
    wp_enqueue_style('jquery-smartmenus-bootstrap-4', THEMEURI.'/include/css/jquery.smartmenus.bootstrap-4.css',array(),'4.0.0', 'all');
    wp_enqueue_style('owl.carousel', THEMEURI.'/include/css/owl.carousel.css',array(),'4.0.0', 'all');
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.css',array(),'2.2.1', 'all');
    wp_enqueue_style('animate', THEMEURI.'/include/css/animate.css',array(),'3.6.0', 'all');
   
    wp_enqueue_script('jquery', THEMEURI.'/include/js/jquery.min',array('jquery'),'3.5.1',false);
    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.0.0',true);
    wp_enqueue_script('smartmenus', THEMEURI.'/include/js/jquery.smartmenus.js',array('bootstrap'),'1.1.0',true);
    wp_enqueue_script('smartmenus-bootstrap', THEMEURI.'/include/js/jquery.smartmenus.bootstrap-4.js',array('bootstrap'),'0.1.0',true);
    wp_enqueue_script('owl-carousel', THEMEURI.'/include/js/owl.carousel.min.js',array('bootstrap'),'2.2.1',true);
    wp_enqueue_script('waypoint', THEMEURI.'/include/js/waypoint.js',array('bootstrap'),'1.1.0',true);
    wp_enqueue_script('countTo', THEMEURI.'/include/js/jquery.countTo.js',array('bootstrap'),'2.0.2',true);
    wp_enqueue_script('theia-sticky-sidebar', THEMEURI.'/include/js/theia-sticky-sidebar.js',array('bootstrap'),'1.4.0',true);
    wp_enqueue_script('jquery-validate', THEMEURI.'/include/js/jquery.validate.js',array('bootstrap'),'1.15.0',true);
    wp_enqueue_script('googleapis','https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDwELtx1ObVuFApUamnBWwoDasU1xHpMoU');
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);

    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'agency_dialysis_css_scripts' );


/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function agency_dialysis_add_slug_body_class( $classes ) {
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
add_filter( 'body_class', 'agency_dialysis_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'agency_dialysis_active_nav_class' , 10 , 2);
function agency_dialysis_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}



/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','Agency'),
        'menu_title'    =>  __('Theme Options','Agency'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'CTA',
        'menu_title'    => 'CTA',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Stats',
        'menu_title'    => 'Stats',
        'parent_slug'   => 'theme-general-settings',
    ));
}

/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function agency_register_post_type() {
    $singular = 'Projects';
    $plural = 'Projects';
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
        'menu_position'         => 22,
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
            'slug'      => 'projects',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ),
    );
    register_post_type('projects',$args);

    $singular = 'Testimonials';
    $plural = 'Testimonials';
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
        'menu_position'         => 23,
        'menu_icon'             => 'dashicons-format-quote',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'testimonials',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'editor',
        ),
    );
    register_post_type('testimonials',$args);


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
        'menu_position'         => 24,
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
            'slug'      => 'services',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'editor',
        ),
    );
    register_post_type('services',$args);

    $singular = 'Case Study';
    $plural = 'Case Studies';
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
        'menu_position'         => 25,
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
            'slug'      => 'case-studies',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail',
            'editor',
        ),
    );
    register_post_type('case-studies',$args);
    register_taxonomy( 'case_studies_category', 'case-studies', array(
        'label'        => __( 'Category', 'Agency'),
        'rewrite'      => array( 'slug' => 'case-studies-category'),
        'hierarchical' => true,
        'show_admin_column'=> true
    ));
}
add_action( 'init', 'agency_register_post_type');



/***********************************************************************************************/
/* Remove br tag from contact form 7 */
/***********************************************************************************************/
add_filter('wpcf7_autop_or_not', '__return_false');


/***********************************************************************************************/
/*Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin*/
/***********************************************************************************************/
function ao_wp_pagination( $custom_query ) {
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999;
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_next'    => true,
            'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
            'next_text'    => __('<i class="fa fa-angle-right"></i>'),
            'type' => 'list'
        ));
    }
}

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}