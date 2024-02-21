<?php
function enqueue_shortcode_tool_scripts() {


        // Enqueue the main stylesheet
        wp_enqueue_style( 'main-styles', get_stylesheet_directory_uri() . '/style.css' );

        wp_enqueue_style( 'tool-styles', get_stylesheet_directory_uri() . '/tool.css' );
        // Enqueue Select2 CSS
        wp_enqueue_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), null );

       
        // Enqueue Select2 JS
        wp_enqueue_script( 'select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), null, true );
    
        wp_enqueue_script('search-script', get_stylesheet_directory_uri() . '/shortcode_search_influencer/assets/js/shortcode-search-section.js', array('jquery'), null, true);
        wp_enqueue_script('form-control-script', get_stylesheet_directory_uri() . '/shortcode_search_influencer/assets/js/shortcode-form-control.js', array('jquery'), null, true);
        wp_enqueue_script('helper-script', get_stylesheet_directory_uri() . '/shortcode_search_influencer/assets/js/shortcode-helper.js', array('jquery'), null, true);
        wp_enqueue_script('autocomplete-script', get_stylesheet_directory_uri() . '/shortcode_search_influencer/assets/js/autocomplete.js', array('jquery'), null, true);
       

        // Inline scripts - ideally, these should be placed in a separate JS file
        wp_add_inline_script( 'select2-js', "
            jQuery(document).ready(function($) {
                $('.select2').select2();
            });
        ");

        wp_localize_script('search-script', 'localized_data', array('ajax_url' => admin_url( 'admin-ajax.php' ),
        'not_found_icon' => get_stylesheet_directory_uri() . "/shortcode_search_influencer/assets/images/notFound.svg",
        'userplaceholder' => get_stylesheet_directory_uri() . "/influencers_search_tool/assets/images/user.png"));
        // If you have additional inline scripts, you might consider putting them in a separate JS file and enqueue them here.


  
}
add_action( 'wp_enqueue_scripts', 'enqueue_shortcode_tool_scripts' );
