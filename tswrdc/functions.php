<?php
/*==============================*/
// @package TWSRDC
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
if(!function_exists('twsrdc_theme_support')) :
    function twsrdc_theme_support() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Add theme support title tag.
        add_theme_support('title-tag');
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('responsive-embeds');
        add_theme_support('post-thumbnails');
        load_theme_textdomain('twsrdc');
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
              'header_menu' => __('Header Menu','twsrdc'),
              'footer_menu' => __('Footer Menu','twsrdc')
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
add_action( 'after_setup_theme', 'twsrdc_theme_support');
/***********************************************************************************************/
/* Function for Google Fonts */
/***********************************************************************************************/
function twsrdc_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'swap';
    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if('off' !== _x( 'on', 'Montserrat font: on or off', 'acc')){
        $fonts[] = 'family=Montserrat:wght@300;400;500;600;700;900';
    }
    if('off' !== _x( 'on', 'Poppins font: on or off', 'acc')){
        $fonts[] = 'family=Poppins:wght@400;700';
    }
    if($fonts){
        $fonts_url = 'https://fonts.googleapis.com/css2?'.implode('&',$fonts).'&display='.$subsets;
    }
    return $fonts_url;
}
/***********************************************************************************************/
/* Hide default editor */
/***********************************************************************************************/
//add_filter('use_block_editor_for_post', '__return_false', 10);
/***********************************************************************************************/
/* Proper way to enqueue scripts and styles */
/***********************************************************************************************/
function twsrdc_css_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_enqueue_style('google-fonts', twsrdc_fonts_url(), array(), null );
    wp_enqueue_style('bootstrap', THEMEURI.'/include/css/bootstrap.min.css',array(),'4.5.2', 'all');
    if(is_home() || is_category()){
        wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css',array(),'5.3.1', 'all');
    }
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap') );
    wp_enqueue_script('bootstrap', THEMEURI.'/include/js/bootstrap.min.js',array('jquery-core'),'4.5.2',true);
    wp_enqueue_script('main-script', THEMEURI.'/include/js/main.js',array('bootstrap'),'1.0',true);
    wp_enqueue_script('theme-script', THEMEURI.'/include/js/custom.js',array('bootstrap'),null,true);
    wp_localize_script('theme-script','ajax_object',array('ajax_url'=>admin_url('admin-ajax.php')));
    wp_add_inline_script( 'jquery-core', 'var $ = jQuery.noConflict();' );
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    }
    if(is_page(52)){
        wp_register_script( 'magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', null, null, false );
        wp_enqueue_script('magnific-popup');

    }
}
add_action( 'wp_enqueue_scripts', 'twsrdc_css_scripts' );
function twsrdc_defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.min.js' ) ) return $url;
    return str_replace( ' src', ' defer="defer" src', $url );
}
add_filter( 'script_loader_tag', 'twsrdc_defer_parsing_of_js', 10 );
/***********************************************************************************************/
/* Page Slug Body Class */
/***********************************************************************************************/
function twsrdc_add_slug_body_class( $classes ) {
global $wpdb, $post;
$current_page_id = get_queried_object_id();
if ( isset( $post ) ) {
    $classes[] = $post->post_name;
}
if (is_page()) {
    if ($post->post_parent) {
        $current_page_id_by_post_ancenstors = get_post_ancestors($current_page_id);
        $parent  = end($current_page_id_by_post_ancenstors);
    } else {
        $parent = $post->ID;
    }
    $post_data = get_post($parent, ARRAY_A);
    $classes[] = $post_data['post_name'];
}
if(is_page(147)){
    $classes[] = 'gradient-bg';
}elseif(is_page(46)){
    $classes[] = 'gradient-yellow-bg';
}
return $classes;
}
add_filter( 'body_class', 'twsrdc_add_slug_body_class' );
/***********************************************************************************************/
/* filter for adding class in nav menu */
/***********************************************************************************************/
add_filter('nav_menu_css_class' , 'twsrdc_active_nav_class' , 10 , 2);
function twsrdc_active_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    if((is_singular('post') || is_category()) && in_array('menu-item-59', $classes)){
        $classes[] = 'active ';
    }
    return $classes;
}
/***********************************************************************************************/
// Get Current Year Short Code
/***********************************************************************************************/
function twsrdc_current_year(){
    $year = date_i18n('Y');
    return $year;
}
add_shortcode('current_year','twsrdc_current_year');
/***********************************************************************************************/
/* Theme Option */
/***********************************************************************************************/
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    =>  __('Theme Options','twsrdc'),
        'menu_title'    =>  __('Theme Options','twsrdc'),
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'position'      =>  59,
        'redirect'      =>  false
    ));
}


/***********************************************************************************************/
/* Register Custom Post Type */
/***********************************************************************************************/
function twsrdc_register_post_type() {
    $singular = 'Events';
    $plural = 'Events';
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
            'slug'      => 'events',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt',
            'author',
            'custom-fields'
        ),
    );
    register_post_type('events',$args);
    register_taxonomy( 'events_category', 'events', array(
        'label'        => __( 'Category', 'twsrdc'),
        'rewrite'      => array( 'slug' => 'events-category'),
        'hierarchical' => true,
        'show_admin_column'=> true
    ) );
    $singular = 'Gallery';
    $plural = 'Gallery';
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
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-format-gallery',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'gallary',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail'
        ),
    );
    register_post_type('gallary',$args);


    $singular = 'College Record';
    $plural = 'College Records';
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
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-groups',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => true,
        'has_archive'           => false,
        'query_var'             => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        // 'capabilities'       => array(),
        'rewrite'               => array(
            'slug'      => 'college-record',
            'with_front'=> false,
            'pages'     => true,
            'feeds'     => false
        ),
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail'
        ),
    );
    register_post_type('college-record',$args);
    flush_rewrite_rules();
}
add_action( 'init', 'twsrdc_register_post_type' );
/***********************************************************************************************/

/***********************************************************************************************/
/* Setting rewrite_rule for past and upcoming events */
/***********************************************************************************************/

/*function custom_rewrite_rule() {
    add_rewrite_rule('^events/?([^/]*)/?','index.php?page_id=40&events-category/upcoming-events=$matches[1]','top');
    add_rewrite_rule('^events/?([^/]*)/?','index.php?page_id=40&events-category/past-events=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);*/

/***********************************************************************************************/


/***********************************************************************************************/
/*Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin*/
/***********************************************************************************************/
if ( ! function_exists( 'ao_wp_pagination' ) ) :
    function ao_wp_pagination( $paged = '', $max_page = '' ){
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        if( ! $paged )
            $paged = get_query_var('paged');
        if( ! $max_page )
            $max_page = $wp_query->max_num_pages;

        $posts = paginate_links( array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'prev_next'    => true,
            'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
            'next_text'    => __('<i class="fa fa-angle-right"></i>'),
            'type'       => 'array'
        ) );
        $posts = str_replace('page/1/','', $posts);
        if(is_array($posts)){
            return '<ul class="page-num d-flex justify-content-center"><li>'.implode('</li><li>', $posts).'</li></ul>';
        }
    }
    add_action('init', 'ao_wp_pagination');
endif;

/***********************************************************************************************/
/* Actions for removing category,tags & comments */
/***********************************************************************************************/
// Remove Categories and Tags
add_action('init', 'six_connections_remove_tax');
function six_connections_remove_tax() {
    //register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
    // register_post_type('post', array());
}
// Removes from admin menu
add_action( 'admin_menu', 'six_connections_remove_admin_menus' );
function six_connections_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'six_connections_remove_comment_support', 100);
function six_connections_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function six_connections_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'six_connections_admin_bar_render' );


add_action( 'wp_body_open', 'ao_add_script_after_body_open');
function ao_add_script_after_body_open() {
    echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-J4LMVLR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
}