<?php 


if ( ! function_exists( 'activebroadband_setup' ) ) :

    function activebroadband_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //add_theme_support( 'post-thumbnails' );

        add_theme_support( 'responsive-embeds' );

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
              'footer_menu' => 'Footer Menu',
            )
        ); 
    }

endif;
add_action( 'after_setup_theme', 'activebroadband_setup' );


// Register css and js
function add_activebroadband() {
  
    wp_enqueue_style('font-awesome', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;900&display=swap'); 
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/include/css/bootstrap.min.css', array(), 'v4.5.2', 'all');
    wp_enqueue_style( 'stylecss', get_stylesheet_uri() );



    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/include/js/bootstrap.min.js', array ( 'jquery' ), 'v4.5.2', true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/include/js/main.js', array ( 'jquery' ), 'v1.1.1', true);
    wp_enqueue_script( 'easing','https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js');
    wp_enqueue_script( 'fontawesome','https://kit.fontawesome.com/20dd01c86d.js');
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/include/js/custom.js?=1.0', array ( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_activebroadband' );


// Hide default editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// Theme option setting
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'  => 'Theme Options',
        'menu_title'  => 'Theme Options',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));
}

// Resistor activebroadband nav menu
function activebroadband_theme_setup() { 
  
}
add_action( 'init', 'activebroadband_theme_setup' );

// Current Year Short Code
function activebroadband_year_shortcode () {
    $year = date_i18n ('Y');
    return $year;
}
add_shortcode ('current_year', 'activebroadband_year_shortcode');


// Remove default post type

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Removes comments from admin menu
add_action( 'admin_menu', 'activebroadband_remove_admin_menus' );
function activebroadband_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'activebroadband_remove_comment_support', 100);

function activebroadband_remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function activebroadbandtheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'activebroadbandtheme_admin_bar_render' );
