<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

function enqueue_scripts() {

    wp_enqueue_script('form-control-script', get_stylesheet_directory_uri() . '/influencers_search_tool/assets/js/form-control.js', array('jquery'), null, true);
    wp_enqueue_script('search-script', get_stylesheet_directory_uri() . '/influencers_search_tool/assets/js/search.js', array('jquery'), null, true);
  
    wp_localize_script('form-control-script', 'localized_data', array(
      'not_found_icon' => get_stylesheet_directory_uri() . "/influencers_search_tool/assets/images/notFound.svg", // WordPress AJAX URL
    ));
  
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

include(get_stylesheet_directory() . "/influencers_search_tool/shortcode.php");


function influencers_render_function() {
    // Your PHP logic here
    die();
}

add_action('wp_ajax_custom_action', 'influencers_render_function'); // For logged-in users
add_action('wp_ajax_nopriv_custom_action', 'influencers_render_function'); // For non-logged-in users