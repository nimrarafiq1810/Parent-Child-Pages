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


include(get_stylesheet_directory() . "/influencers_search_tool/shortcode.php");
include(get_stylesheet_directory() . "/influencers_email_template/influencers_outreach_email.php");
include(get_stylesheet_directory() . "/main_enqueues.php");
include(get_stylesheet_directory() . "/shortcode_search_influencer/shortcode-card.php");
include(get_stylesheet_directory() . "/shortcode_search_influencer/shortcode-tool.php");

// NOTE: scripts and styles are enqueued in the shortcode.php file


function shortenNumberFormat($number) {
    if ($number >= 1000000) {
        return number_format($number / 1000000, 1) . 'M';
    } else if ($number >= 1000) {
        return number_format($number / 1000, 1) . 'k';
    } else {
        return strval($number);
    }
}

function get_influencer_ajax_call()
{
    $location = $_POST['Location'];
	$bio = $_POST['bio'];
	$from_followers = $_POST['from_followers'];
	$to_followers = $_POST['to_followers'];
    $search_tool_type= $_POST['tool_type'];
 
    $param = array(
        'location' => $_POST['Location'],'bio' => $_POST['bio'],'from_followers' => $_POST['from_followers'],'to_followers' => $_POST['to_followers']);
    $api_url = 'https://search-api.influencers.club/search/ig/';

    $request_args = array(
        'method'      => 'POST', 
        'headers'     => array(
            'Content-Type' => 'application/json', 
        ),
        'body' => json_encode($param), 
    );
    $response = wp_remote_get($api_url, $request_args);
    $api_data = json_decode(wp_remote_retrieve_body($response));
    $user_placeholder= get_stylesheet_directory_uri() . "/influencers_search_tool/assets/images/user.png";
    $data_count = count($api_data);
    $random_number = mt_rand(30, 90);
    $card_colors = array("", "blue-card", "yellow-card", "green-card");
    $index_end = ($data_count >= 6) ? 6 : $data_count;
    $cards=[];
    $cards2=[];


    for ($index = 0; $index < $index_end; $index++) {
        $influencer = $api_data[$index];
        $influencer_card = "<div class='IG-tool-profile-card ". ($card_colors[$index % 4])."'>
        <div class='IG-tool-profile-head'>
            <i> <img src='" . 
            ($influencer->instagram->profile_picture ?? $user_placeholder) . 
            "' alt='' > </i>
            <h6>" . 
            ($influencer->first_name ?? "@" . $influencer->instagram->username) .
            ($influencer->instagram->category ? "<small class='influencer-category'>" . $influencer->instagram->category . "</small>" : "");
if ($influencer->location !== null) {
  $influencer_card .= "<small>".$influencer->location."</small>";
}
$influencer_card .= "</h6>
</div>
<div class='IG-tool-profile-body'>
    <ul>
        <li> <a href='https://instagram.com/".$influencer->instagram->username."' target='_blank'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path opacity='0.2' d='M16.5 3H7.5C6.30653 3 5.16193 3.47411 4.31802 4.31802C3.47411 5.16193 3 6.30653 3 7.5V16.5C3 17.6935 3.47411 18.8381 4.31802 19.682C5.16193 20.5259 6.30653 21 7.5 21H16.5C17.6935 21 18.8381 20.5259 19.682 19.682C20.5259 18.8381 21 17.6935 21 16.5V7.5C21 6.30653 20.5259 5.16193 19.682 4.31802C18.8381 3.47411 17.6935 3 16.5 3ZM12 15.75C11.2583 15.75 10.5333 15.5301 9.91661 15.118C9.29993 14.706 8.81928 14.1203 8.53545 13.4351C8.25162 12.7498 8.17736 11.9958 8.32205 11.2684C8.46675 10.541 8.8239 9.8728 9.34835 9.34835C9.8728 8.8239 10.541 8.46675 11.2684 8.32205C11.9958 8.17736 12.7498 8.25162 13.4351 8.53545C14.1203 8.81928 14.706 9.29993 15.118 9.91661C15.5301 10.5333 15.75 11.2583 15.75 12C15.75 12.9946 15.3549 13.9484 14.6517 14.6517C13.9484 15.3549 12.9946 15.75 12 15.75Z' fill='#FF225A'/>
            <path d='M16.5 2.25H7.5C6.10807 2.25149 4.77358 2.80509 3.78933 3.78933C2.80509 4.77358 2.25149 6.10807 2.25 7.5V16.5C2.25149 17.8919 2.80509 19.2264 3.78933 20.2107C4.77358 21.1949 6.10807 21.7485 7.5 21.75H16.5C17.8919 21.7485 19.2264 21.1949 20.2107 20.2107C21.1949 19.2264 21.7485 17.8919 21.75 16.5V7.5C21.7485 6.10807 21.1949 4.77358 20.2107 3.78933C19.2264 2.80509 17.8919 2.25149 16.5 2.25ZM20.25 16.5C20.25 17.4946 19.8549 18.4484 19.1516 19.1516C18.4484 19.8549 17.4946 20.25 16.5 20.25H7.5C6.50544 20.25 5.55161 19.8549 4.84835 19.1516C4.14509 18.4484 3.75 17.4946 3.75 16.5V7.5C3.75 6.50544 4.14509 5.55161 4.84835 4.84835C5.55161 4.14509 6.50544 3.75 7.5 3.75H16.5C17.4946 3.75 18.4484 4.14509 19.1516 4.84835C19.8549 5.55161 20.25 6.50544 20.25 7.5V16.5ZM12 7.5C11.11 7.5 10.24 7.76392 9.49993 8.25839C8.75991 8.75285 8.18314 9.45566 7.84254 10.2779C7.50195 11.1002 7.41283 12.005 7.58647 12.8779C7.7601 13.7508 8.18868 14.5526 8.81802 15.182C9.44736 15.8113 10.2492 16.2399 11.1221 16.4135C11.995 16.5872 12.8998 16.4981 13.7221 16.1575C14.5443 15.8169 15.2471 15.2401 15.7416 14.5001C16.2361 13.76 16.5 12.89 16.5 12C16.4988 10.8069 16.0243 9.66303 15.1806 8.81939C14.337 7.97575 13.1931 7.50124 12 7.5ZM12 15C11.4067 15 10.8266 14.8241 10.3333 14.4944C9.83994 14.1648 9.45542 13.6962 9.22836 13.1481C9.0013 12.5999 8.94189 11.9967 9.05764 11.4147C9.1734 10.8328 9.45912 10.2982 9.87868 9.87868C10.2982 9.45912 10.8328 9.1734 11.4147 9.05764C11.9967 8.94189 12.5999 9.0013 13.1481 9.22836C13.6962 9.45542 14.1648 9.83994 14.4944 10.3333C14.8241 10.8266 15 11.4067 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15ZM18 7.125C18 7.3475 17.934 7.56501 17.8104 7.75002C17.6868 7.93502 17.5111 8.07922 17.3055 8.16436C17.1 8.24951 16.8738 8.27179 16.6555 8.22838C16.4373 8.18498 16.2368 8.07783 16.0795 7.9205C15.9222 7.76316 15.815 7.56271 15.7716 7.34448C15.7282 7.12625 15.7505 6.90005 15.8356 6.69448C15.9208 6.48891 16.065 6.31321 16.25 6.1896C16.435 6.06598 16.6525 6 16.875 6C17.1734 6 17.4595 6.11853 17.6705 6.3295C17.8815 6.54048 18 6.82663 18 7.125Z' fill='#FF225A'/>
            </svg>
            Instagram</a> 
        </li>
        <li> <a href='https://influencers.club/signup/' target='_blank'> <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
            <path opacity='0.2' d='M21 5.25L12 13.5L3 5.25H21Z' fill='#FF225A'/>
            <path d='M21 4.5H3C2.80109 4.5 2.61032 4.57902 2.46967 4.71967C2.32902 4.86032 2.25 5.05109 2.25 5.25V18C2.25 18.3978 2.40804 18.7794 2.68934 19.0607C2.97064 19.342 3.35218 19.5 3.75 19.5H20.25C20.6478 19.5 21.0294 19.342 21.3107 19.0607C21.592 18.7794 21.75 18.3978 21.75 18V5.25C21.75 5.05109 21.671 4.86032 21.5303 4.71967C21.3897 4.57902 21.1989 4.5 21 4.5ZM12 12.4828L4.92844 6H19.0716L12 12.4828ZM9.25406 12L3.75 17.0447V6.95531L9.25406 12ZM10.3641 13.0172L11.4891 14.0531C11.6274 14.1801 11.8084 14.2506 11.9963 14.2506C12.1841 14.2506 12.3651 14.1801 12.5034 14.0531L13.6284 13.0172L19.0659 18H4.92844L10.3641 13.0172ZM14.7459 12L20.25 6.95438V17.0456L14.7459 12Z' fill='#FF225A'/>
            </svg>
            Email</a> 
        </li>";
        if (isset($influencer->external_url) && strlen($influencer->external_url) > 0) {
  $influencer_card .= " <li> <a href=".$influencer->external_url[0]." target='_blank'> <svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
  <path opacity='0.2' d='M21 12C21 13.78 20.4722 15.5201 19.4832 17.0001C18.4943 18.4802 17.0887 19.6337 15.4442 20.3149C13.7996 20.9961 11.99 21.1743 10.2442 20.8271C8.49836 20.4798 6.89472 19.6226 5.63604 18.364C4.37737 17.1053 3.5202 15.5016 3.17294 13.7558C2.82567 12.01 3.0039 10.2004 3.68509 8.55585C4.36628 6.91131 5.51983 5.50571 6.99987 4.51677C8.47991 3.52784 10.22 3 12 3C14.387 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12Z' fill='#FF225A'/>
  <path d='M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM20.2153 11.25H16.4813C16.3491 8.58187 15.5184 6.04969 14.1263 4.03125C15.7568 4.469 17.2142 5.39535 18.3027 6.68582C19.3912 7.97629 20.0587 9.56903 20.2153 11.25ZM9.02157 12.75H14.9784C14.8209 15.6441 13.7597 18.3394 12 20.2397C10.2441 18.3394 9.17907 15.6441 9.02157 12.75ZM9.02157 11.25C9.17907 8.35594 10.2403 5.66062 12 3.76031C13.7559 5.66062 14.8209 8.35406 14.9784 11.25H9.02157ZM9.87375 4.03125C8.48157 6.04969 7.65094 8.58187 7.51875 11.25H3.78469C3.94133 9.56903 4.60876 7.97629 5.69728 6.68582C6.7858 5.39535 8.24325 4.469 9.87375 4.03125ZM3.78469 12.75H7.51875C7.65094 15.4181 8.48157 17.9503 9.87375 19.9688C8.24325 19.531 6.7858 18.6046 5.69728 17.3142C4.60876 16.0237 3.94133 14.431 3.78469 12.75ZM14.1263 19.9688C15.5184 17.9475 16.3491 15.4153 16.4813 12.75H20.2153C20.0587 14.431 19.3912 16.0237 18.3027 17.3142C17.2142 18.6046 15.7568 19.531 14.1263 19.9688Z' fill='#FF225A'/>
  </svg>
  Website</a> 
</li> 
</ul>";}
$influencer_card .= "</ul>
<ol>";

if ($influencer->instagram->follower_count) {
    $influencer_card .= " <li>
    <span>Fans</span>".shortenNumberFormat($influencer->instagram->follower_count)."
  </li>";
  }
  if ($influencer->instagram->engagement_percent) {
    $influencer_card .= "<li>
    <span>Eng Rate</span>".
    $influencer->instagram->engagement_percent."%
  </li>";
  }
  if ($influencer->instagram->media_count) {
    $influencer_card .= "<li>
    <span>Posts</span>".
    $influencer->instagram->media_count."
    </li>";}

$influencer_card .= " </ol>
</div>

<div class='IG-tool-profile-foot'>";

 // TODO: Either hashtags or bio
if ($search_tool_type === "influencer_search") {
    if (!empty($influencer->instagram->hashtags)) {
        $influencer_card .= "<ul>";
        
        foreach ($influencer->instagram->hashtags as $hashtag) {
            if ($hashtag !== ']' && $hashtag !== '[') {
                $influencer_card .= "<li>#" . $hashtag . "</li>";
            }
        }
    
        $influencer_card .= "</ul>";
    }
} else if ($search_tool_type === "ig_search") {
  $influencer_card .= "<p class='insta-bio'>".($influencer->instagram->biography)? $influencer->instagram->biography
      : "" ."</p>";
}

$influencer_card .= "
                    </div>
                </div>
            ";
$cards[]= $influencer_card;
}

    wp_send_json(['message'=>$cards, 'message2'=>[$search_tool_type]]);
    wp_die();

}
add_action('wp_ajax_get_influencer_ajax_call','get_influencer_ajax_call');
add_action('wp_ajax_nopriv_get_influencer_ajax_call','get_influencer_ajax_call');



function new_influencer_cards()
{
    $location = $_POST['location'];
	$bio = $_POST['bio'];
	$from_followers = $_POST['from_followers'];
	$to_followers = $_POST['to_followers'];
    $param = array(
        'location' => $_POST['location'],'bio' => $_POST['bio'],'from_followers' => $_POST['from_followers'],'to_followers' => $_POST['to_followers']);

    $api_url = 'https://search-api.influencers.club/search/ig/';

    $request_args = array(
        'method'      => 'POST', 
        'headers'     => array(
            'Content-Type' => 'application/json', 
        ),
        'body' => json_encode($param), 
    );
    $response = wp_remote_get($api_url, $request_args);
    $api_data = json_decode(wp_remote_retrieve_body($response));
    $user_placeholder= get_stylesheet_directory_uri() . "/influencers_search_tool/assets/images/user.png";
    $data_count = count($api_data);
    $random_number = mt_rand(30, 90);
    $card_colors = array("", "blue-card", "yellow-card", "green-card");
    $index_end = ($data_count >= 6) ? 6 : $data_count;
    $assets_dir = get_stylesheet_directory_uri() . "/influencers_template_search/assets/";
    $cards=[];
    for ($index = 0; $index < $index_end; $index++) {
        $influencer = $api_data[$index];
        $influencer_card= " <div class='w-full md:w-1/2 lg:w-1/3 p-[15px] influencer_card'>
        <div class='w-full bg-[#f0f0f0] border border-[#dbdbdb] border-b-[5px] border-b-[#dbdbdb] hover:border-b-[#dbdbdb] hover:shadow-xl transition duration-300 ease-in-out rounded-[8px] p-[15px] relative'>
            <input id='item".($index+1)."' type='checkbox' class='hidden influ-checkbox'>
            <label for='item".($index+1)."' class='custom-checkbox w-[20px] h-[20px] border border-[#D0D5DD] rounded-[6px] absolute right-[20px] top-[30px] bg-white cursor-pointer flex items-center justify-center'></label>
            <div class='flex flex-col'>
                <div class='w-[84px] h-[84px] mx-auto rounded-full overflow-hidden'> <img src='". ($influencer->instagram->profile_picture ?? $user_placeholder). "' alt='' > </div>
                <h4 class='flex flex-col text-[20px] inter font-[500] text-center'>".($influencer->first_name ?? "@" . $influencer->instagram->username)." <small class='text-[14px] leading-[18px] font-[300]'>".($influencer->instagram->category ?? "No Category Specified").",". ($influencer->location ?? "No Location Specified")."</small> </h4>
            </div>";

        $influencer_card.= "<ul class='flex justify-center items-center gap-[10px] md:gap-[30px] text-[14px] font-[300] inter text-[#0E2E4D] mt-[30px] mb-[20px]'>
        <li> <a href='https://instagram.com/".$influencer->instagram->username."' target='_blank' class='flex items-center gap-[10px]'> <img src='".$assets_dir ."images/InstagramLogo2.svg' alt=''> Instagram</a> </li>
            <li> <a href='https://influencers.club/signup/' target='_blank' class='flex items-center gap-[10px]'> <img src='". $assets_dir ."images/Envelope2.svg' alt=''> Email</a> </li>";
            if (count($influencer->external_urls) > 0) {
               $influencer_card .= " <li> <a href='".$influencer->external_urls[0]."' target='_blank' class='flex items-center gap-[10px]'> <img src='". $assets_dir ."images/GlobeSimple2.svg' alt=''> Website</a> </li>";}
        $influencer_card.= " </ul>
        <div class='flex flex-wrap mx-[-8px]'>
            <div class='w-1/3 p-[8px]'>
                <div class='w-full h-[70px] bg-white rounded-[12px] flex flex-col justify-center items-center'>
                    <p class='text-[14px] text-[#B3B3B3] inter font-[400]'>Fans</p>
                    <h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".shortenNumberFormat($influencer->instagram->follower_count)."</h4>
                </div>
            </div>

            <div class='w-1/3 p-[8px]'>
                <div class='w-full h-[70px] bg-white rounded-[12px] flex flex-col justify-center items-center'>
                    <p class='text-[14px] text-[#B3B3B3] inter font-[400]'>Eng Rate</p>
                    <h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".($influencer->instagram->engagement_percent ?? "")."%</h4>
                </div>
            </div>
            <div class='w-1/3 p-[8px]'>
                <div class='w-full h-[70px] bg-white rounded-[12px] flex flex-col justify-center items-center'>
                    <p class='text-[14px] text-[#B3B3B3] inter font-[400]'>Posts</p>
                    <h4 class='text-[16px] leading-[20px] font-[500] text-[#0E2E4D] inter'>".($influencer->instagram->media_count ?? "")."</h4>
                </div>
            </div>";
        if (!empty($influencer->instagram->hashtags)){
                    $influencer_card .= "<div class='w-full h-[70px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
                    
                    foreach ($influencer->instagram->hashtags as $hashtag) {
                        if ($hashtag !== ']' && $hashtag !== '[') {
                            $influencer_card .= "<span class='p-[4px_8px] rounded-full bg-[#0E2E4D] text-[14px] text-white font-[300] poppins'>#" . $hashtag . "</span>";
                        }
                    }
                }
        else{
            $influencer_card .= "<div class='w-full h-[70px] items-start flex gap-[10px] flex-wrap mt-[22px] px-[10px] max-h-20 overflow-hidden whitespace-no-wrap overflow-ellipsis'>";
                    
        }
    $influencer_card.=" </div> </div>
    </div>
</div>";
        $cards[]= $influencer_card;
    
    
    
    
    }
    wp_send_json(['message'=>$cards]);
    wp_die();
}

add_action('wp_ajax_new_influencer_cards','new_influencer_cards');
add_action('wp_ajax_nopriv_new_influencer_cards','new_influencer_cards');


function read_csv_from_url_to_array($url) {
    // Read the CSV file contents from the URL
    $file_contents = file_get_contents($url);
    
    // Convert CSV file contents to array
    $lines = explode("\n", $file_contents);
    $header = str_getcsv(array_shift($lines));
    $data = [];
    foreach ($lines as $line) {
        $data[] = (str_getcsv($line));
    }
    
    return $data;
}



function convertStringToBoolean($string_value) {
    return $string_value === "TRUE" ? true : false;
}

// function csv_to_array($file_path) {
//     $csv_data = [];
    
//     // Open the CSV file for reading
//     if (($handle = fopen($file_path, "r")) !== FALSE) {
//         fgetcsv($handle);
//         // Read each line from the CSV file
//         while (($data = fgetcsv($handle, 20000, ",")) !== FALSE) {
//             // Add the data from each line to the array
//             $csv_data[] = $data;
//         }
//         fclose($handle);
//     } else {
//         // Handle file open error
//         die("Error opening file: " . $file_path);
//     }
    
//     return $csv_data;
// }

// // Get the directory of the current script
// $current_directory = __DIR__;

// // Define the relative path to your CSV file
// $csv_file_name = "9.csv";

// // Combine the directory and file name to get the full path
// $csv_file_path = $current_directory . DIRECTORY_SEPARATOR . $csv_file_name;


// Create child pages under a specified parent page
function create_child_pages_and_assign_template($parent_page_id, $benchmark, $template_name, $check_data = null) {
    if ($check_data === null && isset($GLOBALS['csv_array'])) {
        $check_data = $GLOBALS['csv_array'];
    }
    // Array of child page data including template and ACF fields
    $page_flag= 'pages_created_flag_'.str_replace(' ', '', $benchmark);
    
    if ( get_option( $page_flag ) === "1" ){
       
        return "Pages are already created";
    }
    else {
   
        // Loop through each child page data and create child pages
        foreach ($check_data as $child_data) 
        {
            $resultArray = array();
            // Create child page under the specified parent page
            $child_post = array(
                'post_title' => $child_data[0],
                'post_content' => 'This is the content for '. $child_data[0]. ' child page',
                'post_status' => 'publish',
                'post_author' => 24, // Change this to the desired author ID
                'post_type' => 'page',
                'post_parent' => $parent_page_id // Set the parent page ID
            );
            // Insert the child page into the database
            $child_id = wp_insert_post($child_post);

            // Set the template for the child page
            if (!is_wp_error($child_id)) 
            {
                update_post_meta($child_id, '_wp_page_template', $template_name);
                add_post_meta($child_id, 'benchmark_identifier', $benchmark, true);
                update_post_meta($child_id, '_yoast_wpseo_title', 'List of Top 1000 '.$child_data[1].' Influencers [January 2023]');
                update_post_meta($child_id, '_yoast_wpseo_metadesc', 'Find the best 1000 '.$child_data[2].' to follow in 2023. Sourced from our +60M Instagram, TikTok, and Youtube influencer database.');
            }
            // Set ACF fields for the child page
            if (!is_wp_error($child_id)) 
            {
                $template = get_post_meta($child_id, '_wp_page_template', true);
                if ($template === $template_name)
                {
                    $numIterations = ceil((count($child_data) - 12) / 14); // Calculate the number of iterations needed
                    for ($iteration = 0; $iteration < $numIterations; $iteration++) 
                    {
                        $startIndex = $iteration * 14 + 12; // Calculate the start index for this iteration
                        // Extract 14 elements starting from the calculated index
                        if(convertStringToBoolean($child_data[$startIndex + 6]) == true) {
                            $verify = true;
                        }
                        else {
                            $verify = false;
                            }
                            $subArray = array(
                                 "username" => $child_data[$startIndex],
                                 "instagram_url" => $child_data[$startIndex + 1],             
                                 "profile_picture" => $child_data[$startIndex + 2],
                                 "media_count" => $child_data[$startIndex + 3],
                                 "niche_sub_class" => $child_data[$startIndex + 4],
                                 "full_name" => $child_data[$startIndex + 5],
                                 "is_verified" => $verify,
                                 "follower_count" => $child_data[$startIndex + 7],
                                 "country" => $child_data[$startIndex + 8],
                                 "category" => $child_data[$startIndex + 9],
                                 "hashtags" => $child_data[$startIndex + 10],
                                 "engagement_percent" => $child_data[$startIndex + 11],
                                 "youtube_link" => $child_data[$startIndex + 12],
                                 "tiktok" => $child_data[$startIndex + 13]
                                );
                            $row_key = add_row('cards', ($subArray), $child_id);
                    }
                }
                
            }

            
        }
        update_option( $page_flag , "1" );
       return "Child pages are created successfully";
    }
    // Set the option flag to prevent repeated execution
    
}

// function get_parent_page_id() 
// {
//     // Get the parent page by its title
//     $parent_page = get_page_by_title("Top Tiktokers");
//     // Check if the parent page exists
//     if ($parent_page)
//     {
//         // Return the parent page ID
//         $parent_page_id = $parent_page->ID;
//         create_child_pages_and_assign_template($parent_page_id);
//     }
//     else
//     {
//         // Return false if the parent page is not found
//         echo "Parent page not found.";
//     }
// }

// add_action( 'init', 'get_parent_page_id' );

function add_seo_pages_callback() {
    $batch_name = isset($_POST['batch_name']) ? sanitize_text_field($_POST['batch_name']) : '';
    $parent_page = isset($_POST['parent_page']) ? intval($_POST['parent_page']) : 0;
    $template_name = isset($_POST['template_name']) ? sanitize_text_field($_POST['template_name']) : '';
    $file_url = ($_POST['file_url']);

    if ($parent_page)
    {
        global $csv_array;
        $csv_array = read_csv_from_url_to_array($file_url);
        // Return the parent page ID
        $parent_page_id = $parent_page->ID;
        $message = create_child_pages_and_assign_template($parent_page, $batch_name, $template_name);
   
    }
    else
    {
        // Return false if the parent page is not found
        $message = "There is some error in it";
    }
    wp_send_json($message);
}
add_action('wp_ajax_add_seo_pages_callback', 'add_seo_pages_callback');


add_action('admin_menu', 'my_settings_page');
function my_settings_page() {
    add_options_page('My Settings', 'Batch Settings', 'manage_options', 'my-settings', 'my_settings_page_callback');
}

// Callback function to display the settings page content
function my_settings_page_callback() {
    ?>
    <div class="wrap">
        <h2>Batch Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('my_settings_group'); ?>
            <?php do_settings_sections('my-settings'); ?>
            <?php submit_button(); ?>
        </form>
     
    
    </div>
    <?php
}
// Register and define the settings
add_action('admin_init', 'my_settings_init');
function my_settings_init() {
    register_setting('my_settings_group', 'settings_parent_page', 'sanitize_callback');
    register_setting('my_settings_group', 'settings_template_name', 'sanitize_callback');
    register_setting('my_settings_group', 'settings_batch_name', 'sanitize_callback');

    add_settings_section('my_settings_section', 'Settings Section', 'section_callback', 'my-settings');

    add_settings_field('my_setting_field', 'Setting Name', 'setting_callback', 'my-settings', 'my_settings_section');
}

// Callback function for sanitizing input
function sanitize_callback($input) {
    // Sanitize input here if necessary
    return $input;
}

// Callback function to display section description
function section_callback() {
    echo '<p>Section description here.</p>';
}

// Callback function to display setting input field
function setting_callback() {

    // Start the table
echo '<div id ="table-div">';
echo '<table id="settings-table">';
echo '<tr>';
echo '<td>Batch Name</td>';
echo '<td>Template Name</td>';
echo '<td>Parent Page</td>';
echo '<td>Data Source</td>';
echo '<td>Publish Batch</td>';
echo '<td>Delete Batch</td>';
echo '<td>Update Batch</td>';
echo '</tr>';
// Row for the inputs and buttons
if (have_rows('programmatic_seo_batch', 'option')) {
    // Loop through the repeater rows
    while (have_rows('programmatic_seo_batch', 'option')) {
        // Do something with each repeater row
        the_row();

        // Example: Get subfields within the repeater
        $batch_name = get_sub_field('batch_name');
        $parent_page_name_field = get_sub_field('parent_page');
        $template_name_field = get_sub_field('template_name');
        $upload_csv_field = get_sub_field('upload_csv');

        // Output the repeater field values
        echo '<tr data-batch-name="' . esc_attr($batch_name) . '" data-parent-page="' . esc_attr($parent_page_name_field) . '" data-template-name="' . esc_attr($template_name_field) . '" data-upload-csv-file="' . esc_attr($upload_csv_field).'">';
        echo '<td>'.$batch_name.'</td>';
        echo '<td>'.$parent_page_name_field.'</td>';
        echo '<td>'.$template_name_field.'</td>';
        echo '<td>'.$upload_csv_field.'</td>';
        echo '<td><button class="add-pages-button">Add SEO Pages</button></td>';
        echo '<td><button class="delete-pages-button">Delete</button></td>';
        echo '<td><button class="update-pages-button">Update</button></td>';
        echo '</tr>';
    }
} else {
    // No repeater rows found
    echo 'No cards found.';
}


// End the table
echo '</table>';
echo '</div>';

}



// Enqueue custom JavaScript and css file in the admin area
function enqueue_admin_scripts($hook) {
    if ($hook === 'settings_page_my-settings') {
        wp_enqueue_script('custom-admin-scripts', get_stylesheet_directory_uri() . '/wp-settings.js', array('jquery'), '1.0', true);
        wp_enqueue_style('custom-admin-styles', get_stylesheet_directory_uri() . '/setting-page.css');
        wp_localize_script('custom-admin-scripts', 'localized_data_admin', array('ajax_url' => admin_url( 'admin-ajax.php' )));
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');





function delete_seo_pages_callback() {
    $batch_name = isset($_POST['batch_name']) ? sanitize_text_field($_POST['batch_name']) : '';
    $parent_page = isset($_POST['parent_page']) ? intval($_POST['parent_page']) : 0;
    $template_name = isset($_POST['template_name']) ? sanitize_text_field($_POST['template_name']) : '';
    $file_url = ($_POST['file_url']);
    $page_flag= 'pages_created_flag_'.str_replace(' ', '', $batch_name);

    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1, // Get all pages
        'meta_query'     => array(
            array(
                'key'   => 'benchmark_identifier',
                'value' => $batch_name, // Replace with your meta value
            ),
        ),
    );
    $query = new WP_Query($args);
    // Check if there are any pages found
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Get the post ID
            $post_id = get_the_ID();
            // Delete the page
            wp_delete_post($post_id, true); // Set the second parameter to true to force delete
        }
        // Restore original post data
        wp_reset_postdata();
        update_option( $page_flag , "0" );
        // Optionally, you can return a message or perform any other action after deletion
        $message = 'Pages deleted successfully.';

    } else {
        $message = 'No pages found to delete.';
    }
    wp_send_json($message);
}
add_action('wp_ajax_delete_seo_pages_callback', 'delete_seo_pages_callback');


function update_seo_pages_callback() {
    $batch_name = isset($_POST['batch_name']) ? sanitize_text_field($_POST['batch_name']) : '';
    $parent_page = isset($_POST['parent_page']) ? intval($_POST['parent_page']) : 0;
    $template_name = isset($_POST['template_name']) ? sanitize_text_field($_POST['template_name']) : '';
    $file_url = ($_POST['file_url']);
    $page_flag= 'pages_created_flag_'.str_replace(' ', '', $batch_name);

    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1, // Get all pages
        'meta_query'     => array(
            array(
                'key'   => 'benchmark_identifier',
                'value' => $batch_name, // Replace with your meta value
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Get the post ID
            $post_id = get_the_ID();
            // Delete the page
            wp_delete_post($post_id, true); // Set the second parameter to true to force delete
        }
        // Restore original post data
        wp_reset_postdata();
        update_option( $page_flag , "0" );
        global $csv_array;
        $csv_array = read_csv_from_url_to_array($file_url);
        create_child_pages_and_assign_template($parent_page, $batch_name, $template_name);
        $message = 'Batch is updated Successfully';
    }
    else {
        $message = 'Pages are not exist to update';
    }
    wp_send_json($message);


}
add_action('wp_ajax_update_seo_pages_callback', 'update_seo_pages_callback');




