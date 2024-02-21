
<?php
/*
Template Name: Batch 2
Template Post Type: post, page
*/
?>
<style>

    * {
        box-sizing: border-box;
    }
    section.influ-card-container {
    max-width: 1100px;
    margin: 50px auto;
    display: flex;
    flex-flow: column;
    gap: 25px;
    font-family: arial;
}
section.influ-card-container article {
    display: flex;
    border: 1px solid #f1f1f1;
    border-radius: 10px;
    box-shadow: 0 0 4px rgb(0 0 0 / 13%);
    padding: 25px;
}
section.influ-card-container article .card-sidebar {
    max-width: 200px;
    width: 100%;
    display: flex;
    flex-flow: column;
    gap: 15px;
}
section.influ-card-container article .profile-detail i {
    width: 80px;
    height: 80px;
    display: block;
    overflow: hidden;
    border-radius: 100%;
    border: 4px solid #e6e6e6;
}
section.influ-card-container article .profile-detail i img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
section.influ-card-container article .card-sidebar ul {
    padding: 0;
    margin: 0;
    display: flex;
    flex-flow: column;
    gap: 15px;
    list-style: none;
}
section.influ-card-container article .card-sidebar ul li a svg {
    width: 20px;
}
section.influ-card-container article .card-sidebar ul li a {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    text-decoration: none;
    color: dimgrey;
}
section.influ-card-container article .card-sidebar ul li a:hover {
    text-decoration: underline;
}
section.influ-card-container article .card-content {
flex: 1;
padding-left: 30px;
}
section.influ-card-container article .card-content .card-grid-container {
    display: grid;
    grid-template-columns: 33.333333% 33.333333% 33.333333%;
    margin: 0 -8px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item {
    padding: 8px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content {
    display: flex;
    flex-flow: column;
    justify-content: center;
    gap: 10px;
    border: 1px solid #e8e8e8;
    padding: 20px;
    border-radius: 10px;
    height: 100%;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content p {
    margin: 0;
    font-size: 16px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content span {
    color: #9b9b9b;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content span svg {
    height: 20px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content span svg path {
    fill: #517dec;
}
section.influ-card-container article .card-content ul.tags-list {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    flex-flow: wrap;
    align-items: center;
    gap: 10px;
}
section.influ-card-container article .card-content ul.tags-list li a {
    background: #517dec;
    color: #fff;
    padding: 5px 10px;
    font-size: 12px;
    text-decoration: none;
    display: flex;
    border-radius: 100px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content .icon-group svg {
    height: 24px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content .icon-group svg.check-icon path {
    fill: #44b648;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content .icon-group svg.cross-icon path {
    fill: #F44336;
}

@media all and (max-width: 991px) {
section.influ-card-container article .card-content .card-grid-container {
    display: grid;
    grid-template-columns: 50% 50%;
}
}
@media all and (max-width: 667px) {
section.influ-card-container article {
    flex-flow: column;
}
section.influ-card-container article .card-content {
padding: 20px 0 0 0;
}
section.influ-card-container article {
    padding: 15px;
}
section.influ-card-container article .card-sidebar {
    max-width: inherit;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content span {
    font-size: 12px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content {
    padding: 10px;
    border-radius: 5px;
}
section.influ-card-container article .card-content .card-grid-container .card-grid-item .card-grid-item-content p {
    font-size: 14px;
}
}
</style>
<body>
    <section class="influ-card-container">
        <!-- Card Item -->
        <?php 
          $count =1;
          $pageID = get_the_ID();
      
          if (have_rows('cards', $pageID)) {
           
              while (have_rows('cards', $pageID)) { 
                  the_row(); 
                  $content_card = '';
                  $content_card .='
             <article>';
             $content_card .= '
            <div class="card-sidebar">
                <div class="profile-detail">
                    <i> <img src= "'.get_sub_field('profile_picture').'" alt=""> </i>
                    <h3>'.get_sub_field('full_name').'</h3>
                </div>
                <ul>
                    <li class="youtube"> <a href="'.get_sub_field('youtube_link').'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#c90e10" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg> Youtube</a> </li>
                    <li class="instag"> <a href="'.get_sub_field('instagram_url').'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#C0317F" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>'.get_sub_field('username').'</a> </li>
                    <li class="email"> <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#517dec" d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg> View Email</a> </li>
                </ul>
            </div>
            <!-- Content -->
            <div class="card-content">
                <div class="card-grid-container">
                    <div class="card-grid-item">
                        <div class="card-grid-item-content">
                            <span>Subscribers</span>
                            <p>'.get_sub_field('follower_count').'</p>
                        </div>
                    </div>
                    <div class="card-grid-item">
                        <div class="card-grid-item-content">
                            <span>Engagement rate</span>
                            <p>'.get_sub_field('engagement_percent').'%</p>
                        </div>
                    </div>
                    <div class="card-grid-item">
                        <div class="card-grid-item-content">
                            <span>Number of videos</span>
                            <p>'.get_sub_field('media_count').'</p>
                        </div>
                    </div>
                    <div class="card-grid-item">
                        <div class="card-grid-item-content">
                            <span>Verified</span>
                            <div class="icon-group">';
                            if(get_sub_field('is_verified') === true)
                            {
                                $content_card.='
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>';
                            }
                                else {
                                    $content_card.= '
                                <svg class="cross-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>';
                                }
                                $content_card.= '
                            </div>
                        </div>
                    </div>
                    <div class="card-grid-item">
                        <div class="card-grid-item-content">
                            <span>Niche</span>
                            <p>'.get_sub_field('niche_sub_class').'</p>
                        </div>
                    </div>
                    <div class="card-grid-item">
                        <div class="card-grid-item-content">
                            <span>Location <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg></span>
                            <p>'.get_sub_field('country').'</p>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <ul class="tags-list">';
                $wordsArray = explode(" ", get_sub_field('hashtags'));
                foreach($wordsArray as $hashtag)
                {
                    $content_card.= '
                    <li> <a href="#">#'.$hashtag.'</a> </li>';
                   
                }
                $content_card .= '
                </ul>
            </div>
        </article>';
      echo $content_card;
    }
    }
    ?>
    </section>
 

      