<?php 

function shortcode_influencer_cards()
{
    $location = $_POST['location'];
	$bio = $_POST['bio'];
	$from_followers = $_POST['from_followers'];
	$to_followers = $_POST['to_followers'];
    $tool_type = $_POST['tool_type'];
    $id_for_post= $_POST['id_for_post'];
    
if ($tool_type == "instagram")
{
    $param = array(
        
        "bio" => $_POST['bio'],
        "location" => $_POST['location'],
        "from_followers" => $_POST['from_followers'],
        "to_followers" => $_POST['to_followers']
    );
    
    $api_url = 'https://search-api.influencers.club/search/ig/';
}
else if($tool_type =="tiktok")
{
    $param = array(
        
        "bio" => $_POST['bio'],
        "location" => $_POST['location'],
        "from_followers" => $_POST['from_followers'],
        "to_followers" => $_POST['to_followers']
    );

    $api_url = 'https://search-api.influencers.club/search/tt/';
}
else 
{
    $param = array(
        
        "topic" => $_POST['bio'],
        "location" => $_POST['location'],
        "from_subs" => $_POST['from_followers'],
        "to_subs" => $_POST['to_followers']
    );

    $api_url = 'https://search-api.influencers.club/search/yt/';
}
    $request_args = array(
        'method'      => 'POST', 
        'headers'     => array(
            'Content-Type' => 'application/json', 
        ),
        'body' => json_encode($param), 
    );
    $response = wp_remote_get($api_url, $request_args);
    $api_data = json_decode(wp_remote_retrieve_body($response));
    $user_placeholder= get_stylesheet_directory_uri() . "/shortcode_search_influencer/assets/images/user.png";
    $data_count = count($api_data);
    $random_number = mt_rand(30, 90);
    $card_colors = array("", "blue-card", "yellow-card", "green-card");
    $index_end = ($data_count >= 6) ? 6 : $data_count;
    $assets_dir = get_stylesheet_directory_uri() . "/shortcode_search_influencer/assets/";
    $cards=[];
    for ($index = 0; $index < $index_end; $index++) {
        $influencer = $api_data[$index];
        if (get_post_type($id_for_post) === 'post') {
            $influencer_card= " <div class='w-full md:w-1/2 lg:w-1/2 p-[15px] influencer_card'>";
        }
        else {
            $influencer_card= " <div class='w-full md:w-1/2 lg:w-1/3 p-[15px] influencer_card'>";
        }
        $influencer_card.= " <div class='w-full bg-[#f0f0f0] border border-[#dbdbdb] border-b-[5px] border-b-[#dbdbdb] hover:border-b-[#dbdbdb] hover:shadow-xl transition duration-300 ease-in-out rounded-[8px] p-[15px] relative'>
            <input id='item".($index+1)."' type='checkbox' class='hidden influ-checkbox'>
            <label for='item".($index+1)."' class='custom-checkbox w-[20px] h-[20px] border border-[#D0D5DD] rounded-[6px] absolute right-[20px] top-[30px] bg-white cursor-pointer flex items-center justify-center'></label>
            <div class='flex flex-col'>";
            if ($tool_type == "instagram"){
            $influencer_card.= "
                <div class='w-[84px] h-[84px] mx-auto rounded-full overflow-hidden'> <img src='". ($influencer->instagram->profile_picture ?? $user_placeholder). "' alt='' > </div>
                <h4 class='flex flex-col text-[20px] inter font-[500] text-center'>".($influencer->first_name ?? "@" . $influencer->instagram->username)." <small class='text-[14px] leading-[18px] font-[300]'>".($influencer->instagram->category ?? "No Category Specified").",". ($influencer->location ?? "No Location Specified")."</small> </h4>
            </div>";
        }
        else if($tool_type == "tiktok")
        {
            $influencer_card.= "<div class='w-[84px] h-[84px] mx-auto rounded-full overflow-hidden'> <img src='". ($influencer->tiktok->profile_picture ?? $user_placeholder). "' alt='' > </div>
            <h4 class='flex flex-col text-[20px] inter font-[500] text-center'>".($influencer->tiktok->full_name ?? "No Name")." <small class='text-[14px] leading-[18px] font-[300]'>". ($influencer->location ?? "No Location Specified")."</small> </h4>
        </div>";
        }
        else if ($tool_type == "youtube")
        {
            $influencer_card.= "<div class='w-[84px] h-[84px] mx-auto rounded-full overflow-hidden'> <img src='". ($influencer->youtube->profile_picture ?? $user_placeholder). "' alt='' > </div>
            <h4 class='flex flex-col text-[20px] inter font-[500] text-center'>".($influencer->youtube->title ?? "No Title")." <small class='text-[14px] leading-[18px] font-[300]'>". ($influencer->location ?? "No Location Specified")."</small> </h4>
        </div>";
        }

        $influencer_card.= "<ul class='flex justify-center items-center gap-[10px] md:gap-[30px] text-[14px] font-[300] inter text-[#0E2E4D] mt-[30px] mb-[20px]'>
        <li>";
        if ($tool_type =="instagram")
        {
        $influencer_card.= "<a href='https://instagram.com/".$influencer->instagram->username."' target='_blank' class='flex items-center gap-[10px]'> <img src='".$assets_dir ."images/InstagramLogo2.svg' alt=''> Instagram</a> </li>";
        }
        else if ($tool_type =="tiktok")
        {
        $influencer_card.= "<a href='".$influencer->tiktok_link."' target='_blank' class='flex items-center gap-[10px]'> <img src='".$assets_dir ."images/tiktok-fill-card.svg' alt=''> Tiktok</a> </li>";
        }
        else if ($tool_type =="youtube")
        {
        $influencer_card.= "<a href='".$influencer->youtube_link."' target='_blank' class='flex items-center gap-[10px]'> <img src='".$assets_dir ."images/youtube-fill-card.svg' alt=''> Youtube</a> </li>";
        }
        $influencer_card.= "<li> <a href='https://influencers.club/signup/' target='_blank' class='flex items-center gap-[10px]'> <img src='". $assets_dir ."images/Envelope2.svg' alt=''> Email</a> </li>";
            if (count($influencer->external_urls) > 0) {
               $influencer_card .= " <li> <a href='".$influencer->external_urls[0]."' target='_blank' class='flex items-center gap-[10px]'> <img src='". $assets_dir ."images/GlobeSimple2.svg' alt=''> Website</a> </li>";}
        $influencer_card.= " </ul>
        <div class='flex flex-wrap mx-[-8px]'>
            <div class='w-1/3 p-[8px]'>
                <div class='w-full h-[70px] bg-white rounded-[12px] flex flex-col justify-center items-center'>
                    <p class='text-[14px] text-[#B3B3B3] inter font-[400]'>";
                    if($tool_type == "instagram"){
                    $influencer_card.= "Fans </p>";
                    }
                    else if($tool_type == "tiktok"){
                        $influencer_card.= "Followers </p>";
                        }
                     else if($tool_type == "youtube"){
                            $influencer_card.= "Subscribers </p>";
                        }
                    if($tool_type == "instagram")
                    {
                    $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".shortenNumberFormat($influencer->instagram->follower_count)."</h4>";
                    }
                    else if($tool_type == "tiktok")
                    {
                    $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".shortenNumberFormat($influencer->tiktok->follower_count)."</h4>";
                    }
                    else if ($tool_type == "youtube")
                    {
                        $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".shortenNumberFormat($influencer->youtube->subscriber_count)."</h4>";
                    }
                    $influencer_card.= " </div> </div>

            <div class='w-1/3 p-[8px]'>
                <div class='w-full h-[70px] bg-white rounded-[12px] flex flex-col justify-center items-center'>
                    <p class='text-[14px] text-[#B3B3B3] inter font-[400]'>Eng Rate</p>";
                    if ($tool_type == "instagram")
                    {
                    $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".($influencer->instagram->engagement_percent ?? "")."%</h4>";
                    }
                    else if ($tool_type == "tiktok")
                    {
                    $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".($influencer->tiktok->engagement_percent ?? "")."%</h4>";
                    }
                    else if ($tool_type == "youtube")
                    {
                    $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".($influencer->youtube->engagement_percent ?? "")."%</h4>";
                    }
                    $influencer_card.= "
                </div>
            </div>
            <div class='w-1/3 p-[8px]'>
                <div class='w-full h-[70px] bg-white rounded-[12px] flex flex-col justify-center items-center'>
                    <p class='text-[14px] text-[#B3B3B3] inter font-[400]'>";
                    if($tool_type == "instagram")
                    { $influencer_card.= "Posts</p>";}
                   else if($tool_type == "tiktok")
                    { $influencer_card.= "Videos</p>";}
                    else if($tool_type == "youtube")
                    { $influencer_card.= "Views</p>";}
                    if($tool_type == "instagram")
                    {
                    $influencer_card.= "
                    <h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".($influencer->instagram->media_count ?? "")."</h4>";
                    }
                    else if($tool_type == "tiktok")
                    {
                        $influencer_card.= " <h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".shortenNumberFormat($influencer->tiktok->video_count)."</h4>";
                    }
                    else if ($tool_type == "youtube")
                    {
                        $influencer_card.= "<h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".shortenNumberFormat($influencer->youtube->view_count)."</h4>";
                    }
               $influencer_card.= "</div>
            </div>";
        if ($tool_type == "instagram")
        {
        if (!empty($influencer->instagram->hashtags)){
                    $influencer_card .= "<div class='w-full h-[75px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
                    
                    foreach ($influencer->instagram->hashtags as $hashtag) {
                        if ($hashtag !== ']' && $hashtag !== '[') {
                            $influencer_card .= "<span class='p-[4px_8px] rounded-full bg-[#0E2E4D] text-[14px] text-white font-[300] poppins'>#" . $hashtag . "</span>";
                        }
                    }
                }
        else{
            $influencer_card .= "<div class='w-full h-[75px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
                    
        }
    }
    else if ($tool_type == "tiktok")
    {
        if (!empty($influencer->tiktok->hashtags)){
            $influencer_card .= "<div class='w-full h-[75px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
            
            foreach ($influencer->tiktok->hashtags as $hashtag) {
                if ($hashtag !== ']' && $hashtag !== '[') {
                    $influencer_card .= "<span class='p-[4px_8px] rounded-full bg-[#0E2E4D] text-[14px] text-white font-[300] poppins'>#" . $hashtag . "</span>";
                }
            }
        }
else{
    $influencer_card .= "<div class='w-full h-[75px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
            
}
    }
    else if ($tool_type == "youtube")
    {
        if (!empty($influencer->youtube->topic_details)){
            $influencer_card .= "<div class='w-full h-[75px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
            
            foreach ($influencer->youtube->topic_details as $topic) {
                if ($topic !== ']' && $topic !== '[') {
                    $influencer_card .= "<span class='p-[4px_8px] rounded-full bg-[#0E2E4D] text-[14px] text-white font-[300] poppins'>" . $topic . "</span>";
                }
            }
        }
else{
    $influencer_card .= "<div class='w-full h-[75px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
            
}
    }

    $influencer_card.=" </div> </div>
    </div>
</div>";
        $cards[]= $influencer_card;
    
    
    
    
    }

  
    wp_send_json(['message'=>$cards]);
    wp_die();
}

add_action('wp_ajax_shortcode_influencer_cards','shortcode_influencer_cards');
add_action('wp_ajax_nopriv_shortcode_influencer_cards','shortcode_influencer_cards');

