<?php

function influencers_search_tool_render( $atts ){
    $args = shortcode_atts(array(
        'tool_type' => 'influencer_search', // Default value if 'tool_type' is not provided
        // the other arg is "ig_search" for instagram search tool
    ), $atts);
    $tool_type_influencer_search = $args['tool_type'];
    // =============== enqueuing scripts, styles, and localizing variables ======================
    wp_enqueue_script('influencer-form-control-script', get_stylesheet_directory_uri() . '/influencers_search_tool/assets/js/form-control.js', array('jquery', 'select2'), null, true);
    wp_enqueue_script('influencer-search-script', get_stylesheet_directory_uri() . '/influencers_search_tool/assets/js/search.js', array('jquery', 'select2'), null, true);
    wp_enqueue_script('influencer-aux-script', get_stylesheet_directory_uri() . '/influencers_search_tool/assets/js/auxiliary.js', array('jquery', 'select2'), null, true);
    
    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), '4.0.13');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array(), '4.0.13', true);
      
    // ==============================================================================================

    ob_start(); // Start output buffering

    $assets_dir = get_stylesheet_directory_uri() . "/influencers_search_tool/assets/";
    global $post;
    
    // Get the post ID
    $post_id = $post->ID;
    $post_type= get_post_type($post_id);
    ?>

    <!-- Form Section -->
    <section class="IG-tool-wrapper" id= "IG_search_tool_for_influencer"data-type="<?php echo $tool_type_influencer_search ?>">
        <div class="IG-tool-row">
            <div class="IG-tool-col">
                <form id="influencers_search_form" class="IG-tool-form">
                <?php if($args['tool_type'] === 'ig_search'){ ?>

                    <h4>Find Instagram Users By Keywords In Bio</h4>
                    <p>Search through 300m Instagram profiles to find accounts with your keywords in their bio</p>
                    <?php }
                    else{?>
                        <h4>Search 200M+ Instagram Influencers by Keywords in Bio</h4>
                        <p>If you want to really narrow your search and access the contact info of your ideal influencers, <a href="https://influencers.club/signup/">sign-up here.</a></p>
                    <?php } ?>
                    <div class="form-field-set">
                        <div class="form-field">

                            <?php if($args['tool_type'] === 'influencer_search'){  ?>
                                
                                <div class="inner">
                                    <div class="label-wrap">
                                        <label>Influencer Location </label>        
                                        <button id="clear_country_button" type="button">Clear</button>
                                    </div>
                                    <!-- Add "select2" class to the select element to initialize Select2 -->
                                    <select id="location" name="location" class="select2 hidden">
                                        <option value="" selected disabled>Select Country</option>
                                    </select>
                                    <div class="selected-countries" id="locations_list"></div>
                                </div>

                            <?php } ?>
                            
                            <div class="inner">
                                <div class="label-wrap">
                                    <label>Bio Keyword <i>  <span>Try adding only 1 keyword per search or try some of our sample searches <em> <u>Crypto</u> </em> <em> <u>Fashion</u> </em> <em> <u>Influencer</u> </em> <em> <u>Pet Owner</u> </em></span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> </i> </label>
                                </div>
                                <div class="add-keywords-field">
                                    <input type="text" id="bio" name="bio" placeholder="Type keyword here...">
                                    <ul id="bio_keywords_list"></ul>
                                </div>


                            </div>
                            <?php if($args['tool_type'] === 'ig_search'){ ?>
                                    <div id="ig_search_sample_options"></div>
                                <?php } ?>
                        </div>

                        <div class="form-field <?php if($args['tool_type'] === 'ig_search'){ ?>ig_search_button<?php } ?>">
                            <div class="inner">

                                <?php if($args['tool_type'] === 'influencer_search'){  ?>
                                
                                    <div class="label-wrap">
                                        <label>Influencer Followers </label>        
                                        <button id="clear_followers_range_button" type="button">Clear</button>
                                    </div>
                                    <div class="form-field-nested">
                                        <select id="from_followers" name="from_followers" class="select2 hidden" data-placeholder="Min">
                                            <option value="" selected disabled>Min</option>
                                        </select>
                                        <div class="selected-countries" id="from_followers_div"></div>
                                        
                                        <select id="to_followers" name="to_followers" class="select2 hidden" data-placeholder="Max">
                                            <option value="" selected disabled>Max</option>
                                        </select>
                                        <div class="selected-countries" id="to_followers_div"></div>
                                    </div>
                                <?php } ?>
                                
                                <div class="form-field-set align-right" style="<?php echo $args['tool_type'] === 'ig_search' ? 'margin: 26px 0 0 0;' : ''?>">
                                    <button id="influencers_search_btn" class="IG-tool-submit" type="submit">Search Influencers</button>
                                </div>
                                
                            </div>
                        </div>
                       
                        
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search results will show here -->
    <section class="IG-tool-wrapper">
        <div class="IG-tool-row">
            <div class="IG-tool-col">
                <div id="show_result_div">
                    <!-- Showing xyz profiles in result => rendered from js code -->
                </div>
                <div id="influencers_card_grid" class="IG-tool-profile-cards blogpost-tool" data-type="<?php echo $post_type ?>">
                    <!-- Influencer's cards will be rendered here -->
                </div>
            </div>
        </div>

        <div class="IG-tool-row">
            <div id="blur_result_section" class="IG-tool-col">
                <!-- Blur section and NOT found section will be rendered -->
            </div>
        </div>
        
    </section>

<?php
    $output = ob_get_clean(); // Get the buffered output and clean the buffer
    return $output; // Return the captured HTML as a string
    
}

add_shortcode( 'influencers-search-tool', 'influencers_search_tool_render' );