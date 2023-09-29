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
    wp_enqueue_script('search-script', get_stylesheet_directory_uri() . '/influencers_search_tool/assets/js/search.js', array('jquery', 'select2'), null, true);
  
    wp_localize_script('form-control-script', 'localized_data', array(
      'not_found_icon' => get_stylesheet_directory_uri() . "/influencers_search_tool/assets/images/notFound.svg", // WordPress AJAX URL
    ));

    // wp_enqueue_script('jquerymin', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array(), '4.0.13', true);

  
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

include(get_stylesheet_directory() . "/influencers_search_tool/shortcode.php");
