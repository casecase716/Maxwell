<?php
/*  Load Wordpress Options
--------------------------------*/
    // Add Custom Menus
        function theme_menus() {
            register_nav_menus(
                array(
                    'left-main-menu'     =>  __( 'Left Main Menu' ),
                    'right-main-menu'     =>  __( 'Right Main Menu' ),
                    'mobile-menu'   =>  __('Mobile Menu'),
                )
            );
        }
        add_action( 'init', 'theme_menus' );
    // Add Custom Background
        add_theme_support( 'custom-background' );
    
    // Add Title Tag Support
    add_theme_support( 'title-tag' );

/*  Load Foundation Scripts
--------------------------------*/
    function foundation_scripts() {
        // De-Register Default jQuery
        wp_deregister_script('jquery');
        // Register Latest version of jQuery
        wp_register_script('jquery','https://code.jquery.com/jquery-2.1.1.min.js',false,null);
        // Load Latest version of jQuery
        wp_enqueue_script('jquery');
        /* Load Foundation JS */
        wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/bower_components/foundation/js/foundation.min.js', array( 'jquery' ), false, true );
    }

    // Activate jQuery and Foundation Scripts when not in the Admin section
        if(!is_admin()){
            add_action('wp_enqueue_scripts','foundation_scripts');
        }

/*  Load Wordpress CSS
--------------------------------*/
    // Load Theme Stylesheet
    function theme_styles(){
        wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css');
    }
    // Activate Stylesheet
    add_action('wp_enqueue_scripts', 'theme_styles');

/*  Hide Wordpress Admin on Front-End
-------------------------------------*/
    add_filter('show_admin_bar', '__return_false');

/*  Modify Wordpress Menu to Work with Foundation
*   Thanks to http://garethcooper.com/2014/01/zurb-foundation-5-and-wordpress-menus/
------------------------------------------------------------------------------------*/
    class GC_walker_nav_menu extends Walker_Nav_Menu {
        // add classes to ul sub-menus
        function start_lvl(&$output, $depth) {
            // depth dependent classes
            $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
            // build html
            $output .= "\n" . $indent . '<ul class="left-submenu">' . "\n";
        }
    }
/*  Modify Wordpress Drop-Down Menu to Work with Foundation
*   Thanks to http://garethcooper.com/2014/01/zurb-foundation-5-and-wordpress-menus/
-------------------------------------------------------------------------------------*/
    // First, create a function to change from dropdown to has-dropdown
    if (!function_exists('GC_menu_set_dropdown')) :
        function GC_menu_set_dropdown($sorted_menu_items, $args) {
            $last_top = 0;
            foreach ($sorted_menu_items as $key => $obj) {
                // it is a top lv item?
                if (0 == $obj->menu_item_parent) {
                    // set the key of the parent
                    $last_top = $key;
                } else {
                    $sorted_menu_items[$last_top]->classes['dropdown'] = 'has-submenu';
                }
            }
            return $sorted_menu_items;
        }
    endif;
    // Apply filter to implement change
    add_filter('wp_nav_menu_objects', 'GC_menu_set_dropdown', 10, 2);

/*  Wordpress Sticky Class
*   Thanks to http://garethcooper.com/2014/01/zurb-foundation-5-and-wordpress-menus/
---------------------------------------------------------------------------------------*/
    // The following function will stop WordPress from using the sticky class, and style WordPress sticky posts using the wordpress-sticky class instead.
    function remove_sticky_class($classes) {
        $classes = array_diff($classes, array("sticky"));
        $classes[] = 'wordpress-sticky';
        return $classes;
    }
    // Apply filter to implement change
    add_filter('post_class','remove_sticky_class');

/*  Add featured images to post
--------------------------------*/
add_theme_support('post-thumbnails');

/*  Override default image sizes
--------------------------------*/

update_option( 'thumbnail_size_w', 150); // thumbnail width
update_option( 'thumbnail_size_h', 150); // thumbnail height
update_option( 'thumbnail_crop', true ); // thumbnail crop
update_option( 'medium_size_w', 300 ); // medium width
update_option( 'medium_size_h', 169 ); // medium height
update_option( 'medium_crop', false ); // medium crop
update_option( 'large_size_w', 1024 ); // large width
update_option( 'large_size_h', 576 ); // large height
update_option( 'large_crop', false ); // large crop

/*  Add custom image sizes
--------------------------------*/
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
    add_image_size( 'additional-size-1', 300 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'additional-size-2', 220, 180, true ); // (cropped)
}
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'additional-size-1' => __('Additional Size 1'),
        'additional-size-2' => __('Additional Size 2'),
    ) );
}

/*  Enable custom editor style sheet
-------------------------------------*/
add_editor_style( 'editor-style.css' );

/*  Define custom colors for editors
-------------------------------------*/
function my_mce4_options( $init ) {
    $default_colours = '
        "000000", "Black",
        "FFFFFF", "White"
        ';

    $custom_colours = '
        "191A0D", "Custom Color 1",
        "B88753", "Custom Color 2",
        "7EAECF", "Custom Color 3",
        "FFFAF4", "Custom Color 4"
        ';
    $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
    $init['textcolor_rows'] = 6; // expand colour grid to 6 rows
    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');


/*  Add ACF Options link
--------------------------------*/
if( function_exists('acf_add_options_page') ) {
   acf_add_options_page();
}

/*  Add Sidebar to Admin Page
--------------------------------*/
if ( function_exists('register_sidebar') )
    register_sidebar();

function mytheme_setup() {
    // Set default values for the upload media box
    update_option('image_default_link_type', 'none' );

}
add_action('after_setup_theme', 'mytheme_setup');


add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {

    return current_user_can('manage_options');

}

function my_excerpt_length($length) {
    return 50;
}

add_filter('excerpt_length', 'my_excerpt_length');