<?php

function search_tool_for_influencers_render( $atts ){
    $args = shortcode_atts(array(
        'tool_type' => 'instagram', // Default value if 'tool_type' is not provided
        // the other arg is "ig_search" for instagram search tool
    ), $atts);
    $tool_type_keyword= $args['tool_type'];


    ob_start(); // Start output buffering
    $assets_dir = get_stylesheet_directory_uri() . "/shortcode_search_influencer/assets/";
?>
	<?php
    global $post;
    
    // Get the post ID
    $post_id = $post->ID;
    if (get_post_type() === 'post') {
        ?> 
        <section class="influencer-custom-tool max-w-[1550px] 2xl:max-w-[1400px] w-full p-[20px_10px] mx-auto flex flex-col items-start gap-[30px]" data-type="<?php echo $tool_type_keyword ?>">
        <div class="w-full lg:w-[100%] flex flex-col gap-[20px] lg:gap-[36px]"> <?php

} else { ?>
        <section class="influencer-custom-tool max-w-[1550px] 2xl:max-w-[1400px] w-full p-[20px_20px] mx-auto flex flex-col-reverse lg:flex-row items-start gap-[30px]" data-type="<?php echo $tool_type_keyword ?>">
        <div class="w-full lg:w-[75%]"> 
        <div class="flex flex-col items-start gap-[20px] lg:gap-[36px]">
            <ul class="w-auto inline-flex gap-[12px] bg-[#dcdcdc] p-[12px] rounded-[10px]">
                <?php if($args['tool_type'] === 'instagram'){ 
                ?>
                            <li> <a href="https://influencers.club/?page_id=46164&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-gradient-to-r from-indigo-500 via-[#df1eb3] to-[#f6c654] inter rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white active:!text-white focus:!text-white hover:opacity-[0.9]"> <img class="w-[22px]" src="<?php echo $assets_dir . "images/insta.svg";?>" alt=""> Instagram</a></li>
                            <li> <a href="https://influencers.club/?page_id=46169&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#666666] inter rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white focus:text-white active:text-white"> <img class="w-[25px]" src="<?php echo $assets_dir . "images/tiktok-fill.svg";?>" alt=""> Tiktok </a></li>
                            <li> <a href="https://influencers.club/?page_id=46175&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#666666] inter rounded-[5px] lg:rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white focus:text-white active:text-white"> <img class="w-[25px]" src="<?php echo $assets_dir . "images/youtube-fill.svg";?>" alt=""> Youtube</a></li>
                        <?php }
                        else if ($args['tool_type'] === 'tiktok'){?>
                        <li> <a href="https://influencers.club/?page_id=46164&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#666666] inter rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white focus:text-white active:text-white"> <img class="w-[22px]" src="<?php echo $assets_dir . "images/insta.svg";?>" alt=""> Instagram</a></li>
                            <li> <a href="https://influencers.club/?page_id=46169&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#000] inter rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white active:!text-white focus:!text-white hover:opacity-[0.9]"> <img class="w-[25px]" src="<?php echo $assets_dir . "images/tiktok-fill.svg";?>" alt=""> Tiktok </a></li>
                            <li> <a href="https://influencers.club/?page_id=46175&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#666666] inter rounded-[5px] lg:rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white focus:text-white active:text-white"> <img class="w-[25px]" src="<?php echo $assets_dir . "images/youtube-fill.svg";?>" alt=""> Youtube</a></li>
                            <?php
                        } else{?>
                            <li> <a href="https://influencers.club/?page_id=46164&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#666666] inter rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white focus:text-white active:text-white"> <img class="w-[22px]" src="<?php echo $assets_dir . "images/insta.svg";?>" alt=""> Instagram</a></li>
                            <li> <a href="https://influencers.club/?page_id=46169&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#666666] inter rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white focus:text-white active:text-white"> <img class="w-[25px]" src="<?php echo $assets_dir . "images/tiktok-fill.svg";?>" alt=""> Tiktok </a></li>
                            <li> <a href="https://influencers.club/?page_id=46175&preview=true" target="_blank" class="px-[20px] w-full lg:w-[145px] h-[40px] lg:h-[51px] flex items-center justify-center text-[12px] sm:text-[16px] text-white bg-[#d60100] inter rounded-[5px] lg:rounded-[8px] cursor-pointer gap-[5px] font-bold hover:text-white active:!text-white focus:!text-white hover:opacity-[0.9]"> <img class="w-[25px]" src="<?php echo $assets_dir . "images/youtube-fill.svg";?>" alt=""> Youtube</a></li>
                            <?php
                        }
                        ?>
                    </ul> <?php }?>            <!-- accordion item -->
                    <div class="toggle-accordion w-full border border-[#e5e5e5] rounded-[8px] lg:rounded-[12px]">
                        <input type="radio" checked name="accordion" class="hidden" id="basic-info">
                        <label for="basic-info" class="w-full h-[50px] lg:h-[75px] bg-[#f4f4f4] text-black rounded-[8px] flex items-center justify-between px-[15px] lg:px-[28px] cursor-pointer text-[16px] leading-[22px] lg:text-[20px] lg:leading-[30px] font-[500] poppins">
                            Basic Info 
                            <span> <img src="<?php echo $assets_dir . "images/arrow.svg";?>" alt=""> </span>
                        </label>

                        <div class="w-full p-[15px] lg:p-[28px] hidden accordion-content">
                            <div class="flex flex-wrap lg:flex-nowrap gap-0 lg:gap-[52px]">
                                <!-- col item -->
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col gap-[6px] sm:px-[10px] lg:px-[0]">
                                    <div class="label-group">
                                    <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px]">Influencer Location <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> <i>Discover Creators by their location. The Location filter is determined by analyzing the Creator's bio, location tags, and captions.</i> </span> </label>
                                    <button id="clear_country_button_shortcode" type="button">Clear</button>
                                    </div>
                                    <select id="InfluencerLocation" class="select2 hidden" name="InfluencerLocation">
                                    <option value="" selected disabled>Select Country</option>
                                    </select>
                                    <div class="selected-countries" id="InfluencerLocation_div"></div>
                                </div>
                                <!-- col item -->
                                <div class="w-full sm:w-1/2 lg:w-1/3 flex flex-col gap-[6px] sm:px-[10px] lg:px-[0] mt-[5px] sm:mt-0 info_block">
                                    <?php
                                    if($args['tool_type'] === 'youtube'){
                                    ?>
                                    <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px]">Channel Topic <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Try adding only 1 topic per search or try some of our sample searches <em> <u>Food</u> </em> <em> <u>Fashion</u> </em> <em> <u>Technology</u> </em> <em> <u>Movies</u> </em></i> </span> </label>
                                    <select id="InfluencerKeyword" class="select2 hidden" name="InfluencerKeyword">
                                    <option value="" selected disabled>Select Topic</option>
                                    </select>
                                    <!-- <input class="custom-text-field w-full h-[44px] border bg-[#fff] border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0" placeholder="Type Topic" type="text" name="bio_keyword" id="bio_keyword"> -->
                                    <?php } else{
                                        ?>
                                    <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px]">Keyword <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Try adding only 1 keyword per search or try some of our sample searches <em> <u>Food</u> </em> <em> <u>Fashion</u> </em> <em> <u>Lifestyle</u> </em> <em> <u>Dance</u> </em></i> </span> </label>
                                    <select id="InfluencerKeyword" class="select2 hidden" name="InfluencerKeyword">
                                    <option value="" selected disabled>Select Keyword</option>
                                    </select>
                                    <?php
                                }?>
                                </div>

                                <!-- col item -->
                                <div class="w-full lg:w-1/3 flex flex-col gap-[6px] sm:px-[10px] lg:px-[0] mt-[10px] lg:mt-0">
                                <div class="label-group">
                                    <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px]">
                                        <?php if($args['tool_type'] === 'youtube'){ ?> Influencer Subscribers <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> <i> Discover creators based on the Minimum and Maximum Range of subscribers to get the precise results.</i> </span> </label>
                                            <button id="clear_followers_range_youtube" type="button">Clear</button>
                                            <?php } else { ?>
                                        Influencer Followers 
                                        <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> <i> Discover creators based on the Minimum and Maximum Range of followers to get the precise results.</i> </span> </label>
                                        <button id="clear_followers_range_shortcode" type="button">Clear</button>
                                        <?php } ?>
                                        </div>
                                    
                                    <div class="flex gap-[12px]">
                                        <div class="w-1/2">
                                            <select id="from" class="select2 hidden" name= "from">
                                            <option value="" selected disabled>From</option>
                                            </select>
                                            <div class="selected-countries" id="from_div"></div>
                                        </div>
                                        <div class="w-1/2">
                                            <select id="to" class="select2 hidden" name="to">
                                            <option value="" selected disabled>To</option>
                                            </select>
                                            <div class="selected-countries" id="to_div"></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if (get_post_type() === 'post') { }
                    else {
                    ?>
                    <!-- accordion item -->
                    <div class="toggle-accordion w-full border border-[#e5e5e5] rounded-[8px] lg:rounded-[12px]">
                        <input type="radio" class="hidden" name="accordion" id="advance-setting">
                        <label for="advance-setting" class="w-full h-[50px] lg:h-[75px] bg-[#f4f4f4] text-black rounded-[8px] flex items-center justify-between px-[15px] lg:px-[28px] cursor-pointer text-[16px] leading-[22px] lg:text-[20px] lg:leading-[30px] font-[500] poppins">
                        Advanced Settings
                            <span>
                                <img src="<?php echo $assets_dir . "images/arrow.svg";?>" alt="">
                            </span>
                        </label>
                    

                        <div class="w-full p-[15px] lg:p-[28px] hidden accordion-content">
                        <div class="p-4 mb-4 text-base text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                        To use the Advanced Filters you need to <a href="https://influencers.club/signup/" target="_blank" class="text-yellow-800 underline italic font-bold">sign up for a Free Trial.</a>
                    </div>

                    <div class="flex flex-wrap xl:flex-nowrap gap-0 xl:gap-[20px] mt-[20px]">
                        <!-- col item -->
                        <div class="w-full mb-[10px] sm:mb-0 sm:w-[50%] xl:w-[30%] flex flex-col gap-[6px]  px-[10px] xl:px-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Niche <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> <i> Discover Creators based on their Niche. The Niche is determined by analyzing the Creator's post captions, the hashtags they use and specific keywords in their bio.</i></span></label>
                            <div class=" cursor-not-allowed opacity-[0.6] bg-[#ebebeb] w-full h-[44px] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0-transparent border-0"  name="" id="">
                                    <option value="">ex. Artists, Athlete, Author</option>
                                </select>
                            </div>
                        </div>

                        <!-- col item -->
                        <div class="w-full mb-[10px] sm:mb-0 sm:w-[50%] xl:w-[30%] flex flex-col gap-[6px]  px-[10px] xl:px-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <?php if($args['tool_type'] === 'youtube'){ ?> Most Recent Video Date <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creator's last video date. The date is determined by the Creator's last video.</i> </span> </label>
                            <?php } else { ?> 
                                Most Recent Post Date <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creator's last post date. The date is determined by the Creator's last post/video.</i> </span> </label>
                                <?php } ?>
                            <div class="cursor-not-allowed bg-[#ebebeb] opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <!-- col item -->
                        <div class="w-full xl:w-[40%] flex gap-[20px]  mt-[30px] px-[10px] xl:px-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD] bg-[#ebebeb] cursor-not-allowed opacity-[0.6]"></div> Verified Profile <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators with verified accounts.</i> </span></label>
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD] bg-[#ebebeb] cursor-not-allowed opacity-[0.6]"></div> Exclude Private Profiles <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators who have not made their profiles private.</i> </span></label>
                            
                        </div>
                    </div>


                    <div class="flex flex-wrap xl:flex-nowrap gap-0 xl:gap-[20px] mt-[20px]">
                        <!-- col item -->
                        <div class="w-1/2 xl:w-1/4 px-[10px] xl:px-0 flex flex-col gap-[6px] mb-[10px] xl:mb-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Keywords in Bio <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the keywords they use in their bio. The bio field is where Creators share their niche & interests, and enter specific keywords or phrases to find the most targeted Creators.</i> </span> </label>
                            <div class="bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] flex items-center justify-between inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                              
                                <input class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0" placeholder="ex. Coach" type="text">
                                <img src="<?php echo $assets_dir . "images/add-circle-line.svg";?>" alt="">
                            </div>
                        </div>
                        <!-- col item -->
                        <div class="w-1/2 xl:w-1/4 px-[10px] xl:px-0 flex flex-col gap-[6px]  mb-[10px] xl:mb-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Hashtag used <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the hashtags present in either their posts or bio, even if used only once.</i> </span> </label>
                            <div class="bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] flex items-center justify-between inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                              
                                <input class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0" placeholder="ex. fitness" type="text">
                                <img src="<?php echo $assets_dir . "images/add-circle-line.svg";?>" alt="">
                            </div>
                        </div>
                        <!-- col item -->
                        <div class="w-1/2 xl:w-1/4 px-[10px] xl:px-0 flex flex-col gap-[6px]  mb-[10px] xl:mb-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Keywords in Captions <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> <i>Discover Creators based on the keywords present in their post description.</i></span> </label>
                            <div class="bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] flex items-center justify-between inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                              
                                <input class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0" placeholder="Start typing to see more options" type="text">
                                <img src="<?php echo $assets_dir . "images/add-circle-line.svg";?>" alt="">
                            </div>
                        </div>
                        <!-- col item -->
                        <div class="w-1/2 xl:w-1/4 px-[10px] xl:px-0 flex flex-col gap-[6px] mb-[10px] xl:mb-0">
                            <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Link in bio contains <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators who have included links in their bio. Use this field to find other platforms the Creators are using. The field is based on “contains”, so, for example, enter the keyword “linktr.ee” to search for Creators who have a Linktree account.</i> </span> </label>
                            <div class="bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] flex items-center justify-between inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                <input class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0" placeholder="ex. linktr.ee" type="text">
                                <img src="<?php echo $assets_dir . "images/add-circle-line.svg";?>" alt="">
                            </div>
                        </div>
                    </div>
                        <div class="flex flex-wrap xl:flex-nowrap xl:gap-[20px]">
                            <div class="w-full xl:w-1/2 flex flex-wrap sm:flex-row xl:flex-col xl:gap-[25px] mt-[20px]">
                                <!-- col item -->
                                <div class="w-1/2 xl:w-full flex flex-col gap-[6px]  px-[10px] xl:px-0 mb-[10px] xl:mb-0">
                                    <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Gender <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators by their gender. The Gender filter is calculated by analyzing the Creator's name, profile picture, and bio.</i> </span> </label>
                                    <div class=" bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                        <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                            <option value="">Any</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- col item -->
                                    <div class="w-1/2 xl:w-full flex flex-col gap-[6px] px-[10px] xl:px-0 mb-[10px] xl:mb-0">
                                        <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Brand Mentions <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""> <i>Discover Creators who collaborated, tagged, and/or mentioned brands in their bio, posts, or videos. Choose several brands and the filter will find Creators that worked with any of them.</i></span> </label>
                                        <div class="bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] flex items-center justify-between inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                        
                                            <input class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0" placeholder="Start typing to see more options" type="text">
                                            <img src="<?php echo $assets_dir . "images/add-circle-line.svg";?>" alt="">
                                        </div>
                                    </div>

                                    <!-- col item -->
                                    <!-- <div class="w-full flex flex-col gap-[6px]  px-[10px] xl:px-0 mb-[10px] xl:mb-0">
                                        <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Profile Language <span> <img src="" alt=""><i>Discover Creators by their speaking language. The Language filter is determined by analyzing the Creator's bio, post captions, and/or the language they use in their videos.</i> </span> </label>
                                        <div class="bg-[#ebebeb] cursor-not-allowed opacity-[0.6] w-full h-[44px] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                            <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                <option value="">Start typing to see more options</option>
                                            </select>
                                        </div>
                                    </div> -->
                            </div>
                            <div class="w-full xl:w-1/2 flex flex-col lg:gap-[25px] mt-[20px]">
                                <div class="w-full flex flex-col sm:flex-row lg:gap-[20px]">
                                    <!-- col item -->
                                    <div class="w-full flex flex-col gap-[6px] px-[10px] lg:px-0 mb-[10px] lg:mb-0">
                                        <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Average Comments <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the average comments from their audience.</i> </span> </label>
                                        <div class="cursor-not-allowed opacity-[0.6] flex gap-[10px]">
                                            <div class="bg-[#ebebeb] w-full h-[44px] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Min</option>
                                                </select>
                                            </div>

                                            <div class="w-full h-[44px] border bg-[#ebebeb] border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Max</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col item -->
                                    <div class="w-full flex flex-col gap-[6px]  px-[10px] lg:px-0 mb-[10px] lg:mb-0">
                                        <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Engagement Rate <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the engagement from their audience. The engagement level is determined by the ratio of likes and comments divided by followers.</i> </span> </label>
                                        <div class="cursor-not-allowed opacity-[0.6] flex gap-[10px]">
                                            <div class="w-full h-[44px] bg-[#ebebeb] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Min</option>
                                                </select>
                                            </div>

                                            <div class="w-full h-[44px] bg-[#ebebeb] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Max</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col sm:flex-row lg:gap-[20px]">
                                    <!-- col item -->
                                    <div class="w-full flex flex-col gap-[6px] px-[10px] lg:px-0 mb-[10px] lg:mb-0">
                                        <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"><?php if($args['tool_type'] === 'instagram'){ ?> Number of Posts <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the number of posts.</i> </span> </label>
                                        <?php } else { ?> Number of Videos <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the number of videos.</i> </span> </label> <?php } ?>
                                        <div class="cursor-not-allowed opacity-[0.6] flex gap-[10px]">
                                            <div class="w-full h-[44px] bg-[#ebebeb] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Min</option>
                                                </select>
                                            </div>

                                            <div class="w-full h-[44px] bg-[#ebebeb] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Max</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col item -->
                                    <div class="w-full flex flex-col gap-[6px] px-[10px] lg:px-0 mb-[10px] lg:mb-0">
                                        <label class="inter text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed">Average Likes <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators based on the average likes from their audience.</i> </span> </label>
                                        <div class="cursor-not-allowed opacity-[0.6] flex gap-[10px]">
                                            <div class="w-full h-[44px] bg-[#ebebeb] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Min</option>
                                                </select>
                                            </div>

                                            <div class="w-full h-[44px] bg-[#ebebeb] border border-[#D0D5DD] inter text-[16px] text-[#667085] rounded-[8px] px-[14px] outline-0"  name="" id="">
                                                <select class="w-full h-full inter text-[14px] text-[#667085] pointer-events-none bg-transparent border-0"  name="" id="">
                                                    <option value="">Max</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
          

            <!-- accordion item -->
            <div class="toggle-accordion w-full border border-[#e5e5e5] rounded-[8px] lg:rounded-[12px]">
                <input type="radio" name="accordion" class="hidden" id="deep-dive">
                <label for="deep-dive" class="w-full h-[50px] lg:h-[75px] bg-[#f4f4f4] text-black rounded-[8px] flex items-center justify-between px-[15px] lg:px-[28px] cursor-pointer text-[16px] leading-[22px] lg:text-[20px] lg:leading-[30px] font-[500] poppins">
                    Creator Deep Dive
                    <span> <img src="<?php echo $assets_dir . "images/arrow.svg";?>" alt=""> </span>
                </label>

                <div class="w-full p-[15px] lg:p-[28px] hidden accordion-content">
                <div class="p-4 mb-4 text-base text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">To use the Creator Deep Dive Filters you need to <a href="https://influencers.club/signup/" target="_blank" class="text-yellow-800 underline italic font-bold">sign up for a Free Trial.</a></div>
                    <div class="flex flex-wrap gap-y-[25px]">
                      <!-- col item -->
                      <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px]">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> Has TikTok</label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px]">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> Has Partreon</label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px] ">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD] cursor-not-allowed opacity-[0.6]"></div> Has Brand Collaboration <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators that have collaborated with a brand. We determine these Creators by analyzing sponsored content and using keywords/hashtags like #ad, #sponsoredpost, etc.</i> </span></label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px] ">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD] cursor-not-allowed opacity-[0.6]"></div> Uses a link-in-bio tool <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators that use link-in-bio tools like Linktree, Beacons, Milkshake, etc. These Creators are most likely to be on more than one platform so their audience reach is greater.</i> </span> </label>
                    </div>

                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px] ">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD] cursor-not-allowed opacity-[0.6]"></div> Promotes Affiliate link <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators that use affiliate links to promote certain products from which they earn a commission.</i> </span> </label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px]">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> Has Instagram</label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px]">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> Has YouTube</label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px]">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> Has Twitch</label>
                    </div>

                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px]">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6] cursor-not-allowed"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD] cursor-not-allowed opacity-[0.6]"></div> Selling Merch <span> <img src="<?php echo $assets_dir . "images/Helpicon.svg";?>" alt=""><i>Discover Creators that sell their own merchandise. We determine these Creators by analyzing their content for keywords/hashtags like #merch, #merchandise, etc., or by analyzing the platforms they use for selling.</i> </span> </label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px] cursor-not-allowed">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6]"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> LTK Users</label>
                    </div>
                    <!-- col item -->
                    <div class="w-1/2 md:w-1/3 lg:w-1/4 flex gap-[6px] cursor-not-allowed">
                        <label class="inter text-[12px] sm:text-[14px] font-[500] text-[#344054] flex items-center gap-[10px] text-opacity-[0.6]"> <div class="w-[16px] h-[16px] border rounded-[4px] border-[#D0D5DD]"></div> Does Live Stream</label>
                    </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="w-full flex justify-end">
                <button id="search-submit-button" class="custom-btn" type="submit">Search Influencers</button>
            </div>
            <?php  if (get_post_type() === 'post'){ ?> 
                <div id="result_buttons_section" class="w-full flex flex-col sm:flex-row justify-between sm:items-center mt-[10px] gap-[10px] sm:gap-0 hidden">
                <p id="Result_in_figures"class="text-[16px] sm:text-[18px] md:text-[18px] text-[#0E2E4D] font-[500] inter"></p>

                <div id= "button_section" class="flex items-center justify-between gap-[30px]">
                    <!-- <button class="underline text-[#0524C8] text-[16px] leading-[20px] font-[300] inter" id="checkAllButton">Select All</button>
                    <a class="px-[15px] h-[48px] bg-white border border-[#D0D5DD] rounded-[8px] text-[#344054] inter font-[600] text-[16px] inline-flex items-center justify-center" href="#">Download CSV</a> -->
                </div>
            </div> <?php }
            else {
                ?></div>
                  <div class="w-full flex flex-col sm:flex-row justify-between sm:items-center mt-[40px] gap-[15px] sm:gap-0">
                <p id="Result_in_figures"class="text-[16px] sm:text-[18px] md:text-[20px] text-[#0E2E4D] font-[500] inter"></p>

                <div id= "button_section" class="flex items-center justify-between gap-[30px]">
                    <!-- <button class="underline text-[#0524C8] text-[16px] leading-[20px] font-[300] inter" id="checkAllButton">Select All</button>
                    <a class="px-[15px] h-[48px] bg-white border border-[#D0D5DD] rounded-[8px] text-[#344054] inter font-[600] text-[16px] inline-flex items-center justify-center" href="#">Download CSV</a> -->
                </div>
            </div>
                <?php
            }?>
       

          

            <div id="influencer_grid" class="flex flex-wrap mx-[-15px] hidden" data-id="<?php echo $post_id ?>">
                
            </div>
            <div id="tool_blur_section"class="w-full flex flex-wrap hidden">
        
            </div>
        </div>
        <?php  if (get_post_type() === 'post'){ }
        else {
         ?>
        <div class="sticckysidebar w-full lg:w-[25%] rounded-[10px] bg-[#fff] relative lg:sticky top-0 lg:top-[150px] p-[20px] border-2 border-[#e5e5e5] flex gap-[5px] flex-col">
            <h5 class="text-[#000] text-[16px] font-bold mb-[5px]">Influencer Contact Database</h5>
             <p class="text-[12px] text-black flex items-start gap-[10px]"> <i class="min-w-[5px] h-[5px] bg-[#f0c933] rounded-full relative top-[5px]"></i> 80M creators from Instagram, TikTok, and YouTube.</p>
			<p class="text-[12px] text-black flex items-start gap-[10px]"> <i class="min-w-[5px] h-[5px] bg-[#f0c933] rounded-full relative top-[5px]"></i> Find your perfect creators using 100+ filters.</p>
            <p class="text-[12px] text-black flex items-start gap-[10px]"><i class="min-w-[5px] h-[5px] bg-[#f0c933] rounded-full relative top-[5px]"></i> Instantly download their verified email addresses and start your outreach.</p>
            <a class="tool-btn w-full bg-[#f0c933] p-[15px] rounded-[5px] flex justify-center text-[14px] font-bold uppercase mt-[15px]" href="https://influencers.club/signup/" target="_blank">Start Free</a>
        </div>
            <?php } ?>
    </section>
<?php
 $output = ob_get_clean(); // Get the buffered output and clean the buffer
 return $output; // Return the captured HTML as a string
}
add_shortcode( 'search_tool_for_influencers', 'search_tool_for_influencers_render' );


// get_header(); 
// $assets_dir = get_stylesheet_directory_uri() . "/influencers_template_search/assets/";

// <?php get_footer();