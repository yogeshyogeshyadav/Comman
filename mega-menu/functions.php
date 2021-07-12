<?php


if ( ! function_exists( 'mengamenu_setup' ) ) :

    function mengamenu_setup() {

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
        register_nav_menus(
        array(
          'header_menu' => 'Header Menu',
          'footer_menu' => 'Footer Menu',
        )
      ); 
    }
endif;
add_action( 'after_setup_theme', 'mengamenu_setup' );


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


// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


// Hide default editor
add_filter('use_block_editor_for_post', '__return_false', 10);



?>
