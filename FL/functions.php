<?php 
if(! function_exists('fl_theme_support')) :
	function fl_theme_support() {

		// Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Add theme support title tag.
        add_theme_support( 'title-tag' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        //add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'post-thumbnails' );


        load_theme_textdomain( 'fl' );

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
add_action( 'after_setup_theme', 'fl_theme_support' );

// Get Current Year Short Code
function fl_current_year(){
	$year = date_i18n('Y');
	return $year;
}
add_shortcode('current_year','fl_current_year');

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



// Register css and js
function add_fl() {
  
    //css
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap'); 
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/include/css/bootstrap.min.css', array(), 'v4.5.2', 'all');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/include/css/bootstrap.min.css', array(), 'v4.5.2', 'all');
    wp_enqueue_style( 'stylecss', get_stylesheet_uri() );
    //wp_enqueue_style('fontawesome', 'https://kit.fontawesome.com/20dd01c86d.js'); 



    //js
    //wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/include/js/bootstrap.min.js', array ( 'jquery' ), 'v4.5.2', true);
    //wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/include/js/jquery.waypoints.min.js', array ( 'jquery' ), '4.0.1', true);
    //wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/include/js/slick.min.js', array ( 'jquery' ), '', true);
    //wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/include/js/custom-js.js', array ( 'jquery' ), '', true);
}
add_action( 'wp_enqueue_scripts', 'add_fl' );



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


// REGISTER CTA POST TYPES
if ( ! function_exists( 'fl_cta_post_type' ) ) :

function fl_cta_post_type() {
  $labels = array(
    'name'               => _x( 'CTA', 'post type general name','fl'),
    'singular_name'      => _x( 'CTA', 'post type singular name','fl' ),
    'add_new'            => _x( 'Add New', 'CTA','fl' ),
    'add_new_item'       => __( 'Add New CTA','fl' ),
    'edit_item'          => __( 'Edit CTA','fl' ),
    'new_item'           => __( 'New CTA','fl' ),
    'all_items'          => __( 'All CTA','fl' ),
    'view_item'          => __( 'View CTA','fl' ),
    'search_items'       => __( 'Search CTA','fl' ),
    'not_found'          => __( 'No CTA found','fl' ),
    'not_found_in_trash' => __( 'No CTA found in the Trash','fl' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'CTA'
  );
  $args = array(
    'labels'        => $labels,
    'public' => true,
    'supports' => array ('custom-fields','title'),
    'hierarchical' => true,
    'menu_icon' => 'dashicons-embed-generic',
    'menu_position' =>99,
    'rewrite' => array ( 'slug' => __( 'cta' ) )
  );
  register_post_type( 'cta', $args ); 
}
add_action( 'init', 'fl_cta_post_type' );

endif;



// REGISTER SERVICES POST TYPES
if ( ! function_exists( 'fl_services_post_type' ) ) :
function fl_services_post_type() {
  $labels = array(
    'name'               => _x( 'Services', 'post type general name','fl'),
    'singular_name'      => _x( 'Services', 'post type singular name','fl' ),
    'add_new'            => _x( 'Add New', 'Services','fl' ),
    'add_new_item'       => __( 'Add New Services','fl' ),
    'edit_item'          => __( 'Edit Services','fl' ),
    'new_item'           => __( 'New Services','fl' ),
    'all_items'          => __( 'All Services','fl' ),
    'view_item'          => __( 'View Services','fl' ),
    'search_items'       => __( 'Search Services','fl' ),
    'not_found'          => __( 'No Services found','fl' ),
    'not_found_in_trash' => __( 'No Services found in the Trash','fl' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Services'
  );
  $args = array(
    'labels'        => $labels,
    'public' => true,
    'supports' => array ('title','excerpt','editor','thumbnail','post-formats','custom-fields'),
    'hierarchical' => true,
    'menu_icon' => 'dashicons-admin-plugins',
    'menu_position' =>99,
    'rewrite' => array ( 'slug' => __( 'services' ) )
  );
  register_post_type( 'services', $args ); 
}
add_action( 'init', 'fl_services_post_type' );

endif;



// Add active class in current nav
add_filter('nav_menu_css_class' , 'lf_current_menu_item' , 10 , 2);
function lf_current_menu_item ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

?>