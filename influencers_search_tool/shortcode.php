<?php
function influencers_search_tool_render(){
    ob_start(); // Start output buffering

    $assets_dir = get_stylesheet_directory_uri() . "/influencers_search_tool/assets/";
    ?>
    <!-- Form Section -->
    <section class="IG-tool-wrapper">
        <div class="IG-tool-row">
            <div class="IG-tool-col">
                <form id="influencers_search_form" class="IG-tool-form">
                    <p>Modash is an influencer search tool, with a 200M+ database of creators across Instagram, YouTube, and TikTok. <a href="#">Start a free</a> trial to get more search filters (eg: keywords in bio, growth rate, audience interests), detailed audience analysis, influencer contact emails, and more.</p>
                    <h4>Search 71M+ Instagram profiles by location</h4>
                    <div class="form-field-set">
                        <div class="form-field">
                            <div class="inner">
                            
                            <div class="label-wrap">
                                <label>Influencer Location <i> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> </i> </label>        
                                <button id="clear_country_button" type="button">Clear</button>
                            </div>
                            <!-- Add "select2" class to the select element to initialize Select2 -->
                                <select id="location" name="location" class="select2 hidden">
                                    <option value="" selected disabled>Select Country</option>
                                </select>
                                <div class="selected-countries" id="locations_list"></div>
                            </div>
                            <div class="inner">
                                <div class="label-wrap">
                                    <label>Bio Keyword <i> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> </i> </label>
                                </div>
                                    <div class="add-keywords-field">
                                        <input type="text" id="bio" name="bio" placeholder="Type keyword here and press enter..." onkeydown="handleKeyPress(event)">
                                        <ul id="bio_keywords_list"></ul>
                                    </div>
                            </div>
                        </div>

                        <div class="form-field">
                            
                            <div class="label-wrap">
                                    <label>Influencer Followers <i> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> </i></label>        
                                    <button id="clear_followers_range_button" type="button">Clear</button>
                            </div>
                            <div class="form-field-nested">
                                <select id="from_followers" name="from_followers" class="select2 hidden">
                                    <option value="" selected disabled>Min</option>
                                </select>
                                <div class="selected-countries" id="from_followers_div"></div>
                                
                                <select id="to_followers" name="to_followers" class="select2 hidden">
                                    <option value="" selected disabled>Max</option>
                                </select>
                                <div class="selected-countries" id="to_followers_div"></div>
                            </div>

                            <div class="form-field-set align-right">
                        <button id="influencers_search_btn" class="IG-tool-submit" type="submit">Search Influencers</button>
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
                <div id="influencers_card_grid" class="IG-tool-profile-cards">
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