// let available_free_searches = 0; // this is supposed to be here

jQuery(document).ready(function ($) { 
    $('.select2').select2(); // for styling dropdown menus
    
    const search_form = $("#influencers_search_form");
    const show_result_div = $('#show_result_div');
    const search_button = $('#influencers_search_btn');
    const influencers_card_grid = $('#influencers_card_grid');
    const blur_result_section = $('#blur_result_section');
    
    const clear_followers_range_button = $('#clear_followers_range_button');
    const clear_country_button = $('#clear_country_button');
    
    // handeling available free searches logic
    let free_searches = getCookie('ic_free_searches');
    if(free_searches === null){ // when a user is searching for the first time in a day
        setCookie('ic_free_searches', 5, 1);
        free_searches = getCookie('ic_free_searches');
    }
    let available_free_searches = free_searches;

    search_button.html(`Search Influencers (${available_free_searches})`);
    
    // --------------------------------------------
    const getInfluencers = (e) => {
        search_button.prop("disabled", true);
        influencers_card_grid.html("");
        blur_result_section.html("");
        show_result_div.html("");
        
        // getting form values and making an object
        const form = e.currentTarget;
        const form_data = new FormData(form);
        
        const form_values = {};
        form_data.forEach((value, key) => {
            form_values[key] = value;
        });

        form_values.bio = entered_keywords.length > 0 ? entered_keywords : [""] ;
        form_values.bio = entered_keywords[0];
        
        // adding loading cards
        for (let index = 0; index < 3; index++) {
            influencers_card_grid.append(loading_card); // loading card is defined in form-control.js
        }

        fetch(localized_data.endpoint, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json', // Set the Content-Type header for JSON data
            },
            body: JSON.stringify(form_values), // Convert the data to JSON format
        })
        .then((response) => {
            if (!response.ok) {
            throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((res_data) => {

            // updating available free searches count on Search button
            available_free_searches -= 1;
            search_button.html(`Search Influencers (${available_free_searches})`);
            
            const data_count = res_data.length;
            const random_number = Math.floor(Math.random() * (300 - 100 + 1)) + 100;

            const card_colors = ["", "blue-card", "yellow-card", "green-card"];
            show_result_div.html(`<h5>Showing ${data_count>=6 ? "6" : data_count} of ${random_number}k profiles. To see all results (with even more data), <a href="">start a free trial.</a></h5>`);

            const index_end = (data_count >= 6) ? 6 : data_count;
            
            influencers_card_grid.html(""); // clearing the loading cards
            
            if(data_count > 0){
                for (let index = 0; index < index_end; index++) {
                    const influencer = res_data[index];
                    let influencer_card = `
                    <div class="IG-tool-profile-card ${card_colors[index%4]}">
                        <div class="IG-tool-profile-head">
                            <i> <img src=${influencer.profile_picture} alt=""> </i>
                            <h6>${influencer.username} <small>${influencer.category ? influencer.category + ", " : ""}${influencer.location_unified}</small> </h6>
                        </div>
                        <div class="IG-tool-profile-body">
                            <ul>
                                <li> <a href="https://instagram.com/${influencer.username}" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M16.5 3H7.5C6.30653 3 5.16193 3.47411 4.31802 4.31802C3.47411 5.16193 3 6.30653 3 7.5V16.5C3 17.6935 3.47411 18.8381 4.31802 19.682C5.16193 20.5259 6.30653 21 7.5 21H16.5C17.6935 21 18.8381 20.5259 19.682 19.682C20.5259 18.8381 21 17.6935 21 16.5V7.5C21 6.30653 20.5259 5.16193 19.682 4.31802C18.8381 3.47411 17.6935 3 16.5 3ZM12 15.75C11.2583 15.75 10.5333 15.5301 9.91661 15.118C9.29993 14.706 8.81928 14.1203 8.53545 13.4351C8.25162 12.7498 8.17736 11.9958 8.32205 11.2684C8.46675 10.541 8.8239 9.8728 9.34835 9.34835C9.8728 8.8239 10.541 8.46675 11.2684 8.32205C11.9958 8.17736 12.7498 8.25162 13.4351 8.53545C14.1203 8.81928 14.706 9.29993 15.118 9.91661C15.5301 10.5333 15.75 11.2583 15.75 12C15.75 12.9946 15.3549 13.9484 14.6517 14.6517C13.9484 15.3549 12.9946 15.75 12 15.75Z" fill="#FF225A"/>
                                    <path d="M16.5 2.25H7.5C6.10807 2.25149 4.77358 2.80509 3.78933 3.78933C2.80509 4.77358 2.25149 6.10807 2.25 7.5V16.5C2.25149 17.8919 2.80509 19.2264 3.78933 20.2107C4.77358 21.1949 6.10807 21.7485 7.5 21.75H16.5C17.8919 21.7485 19.2264 21.1949 20.2107 20.2107C21.1949 19.2264 21.7485 17.8919 21.75 16.5V7.5C21.7485 6.10807 21.1949 4.77358 20.2107 3.78933C19.2264 2.80509 17.8919 2.25149 16.5 2.25ZM20.25 16.5C20.25 17.4946 19.8549 18.4484 19.1516 19.1516C18.4484 19.8549 17.4946 20.25 16.5 20.25H7.5C6.50544 20.25 5.55161 19.8549 4.84835 19.1516C4.14509 18.4484 3.75 17.4946 3.75 16.5V7.5C3.75 6.50544 4.14509 5.55161 4.84835 4.84835C5.55161 4.14509 6.50544 3.75 7.5 3.75H16.5C17.4946 3.75 18.4484 4.14509 19.1516 4.84835C19.8549 5.55161 20.25 6.50544 20.25 7.5V16.5ZM12 7.5C11.11 7.5 10.24 7.76392 9.49993 8.25839C8.75991 8.75285 8.18314 9.45566 7.84254 10.2779C7.50195 11.1002 7.41283 12.005 7.58647 12.8779C7.7601 13.7508 8.18868 14.5526 8.81802 15.182C9.44736 15.8113 10.2492 16.2399 11.1221 16.4135C11.995 16.5872 12.8998 16.4981 13.7221 16.1575C14.5443 15.8169 15.2471 15.2401 15.7416 14.5001C16.2361 13.76 16.5 12.89 16.5 12C16.4988 10.8069 16.0243 9.66303 15.1806 8.81939C14.337 7.97575 13.1931 7.50124 12 7.5ZM12 15C11.4067 15 10.8266 14.8241 10.3333 14.4944C9.83994 14.1648 9.45542 13.6962 9.22836 13.1481C9.0013 12.5999 8.94189 11.9967 9.05764 11.4147C9.1734 10.8328 9.45912 10.2982 9.87868 9.87868C10.2982 9.45912 10.8328 9.1734 11.4147 9.05764C11.9967 8.94189 12.5999 9.0013 13.1481 9.22836C13.6962 9.45542 14.1648 9.83994 14.4944 10.3333C14.8241 10.8266 15 11.4067 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15ZM18 7.125C18 7.3475 17.934 7.56501 17.8104 7.75002C17.6868 7.93502 17.5111 8.07922 17.3055 8.16436C17.1 8.24951 16.8738 8.27179 16.6555 8.22838C16.4373 8.18498 16.2368 8.07783 16.0795 7.9205C15.9222 7.76316 15.815 7.56271 15.7716 7.34448C15.7282 7.12625 15.7505 6.90005 15.8356 6.69448C15.9208 6.48891 16.065 6.31321 16.25 6.1896C16.435 6.06598 16.6525 6 16.875 6C17.1734 6 17.4595 6.11853 17.6705 6.3295C17.8815 6.54048 18 6.82663 18 7.125Z" fill="#FF225A"/>
                                    </svg>
                                    Instagram</a> 
                                </li>
                                <li> <a href="#"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M21 5.25L12 13.5L3 5.25H21Z" fill="#FF225A"/>
                                    <path d="M21 4.5H3C2.80109 4.5 2.61032 4.57902 2.46967 4.71967C2.32902 4.86032 2.25 5.05109 2.25 5.25V18C2.25 18.3978 2.40804 18.7794 2.68934 19.0607C2.97064 19.342 3.35218 19.5 3.75 19.5H20.25C20.6478 19.5 21.0294 19.342 21.3107 19.0607C21.592 18.7794 21.75 18.3978 21.75 18V5.25C21.75 5.05109 21.671 4.86032 21.5303 4.71967C21.3897 4.57902 21.1989 4.5 21 4.5ZM12 12.4828L4.92844 6H19.0716L12 12.4828ZM9.25406 12L3.75 17.0447V6.95531L9.25406 12ZM10.3641 13.0172L11.4891 14.0531C11.6274 14.1801 11.8084 14.2506 11.9963 14.2506C12.1841 14.2506 12.3651 14.1801 12.5034 14.0531L13.6284 13.0172L19.0659 18H4.92844L10.3641 13.0172ZM14.7459 12L20.25 6.95438V17.0456L14.7459 12Z" fill="#FF225A"/>
                                    </svg>
                                    Email</a> 
                                </li>
                    `;
                    if(influencer.external_url?.length > 0){
                        influencer_card += `
                            <li> <a href="${influencer.external_url[0]}" target="_blank"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2" d="M21 12C21 13.78 20.4722 15.5201 19.4832 17.0001C18.4943 18.4802 17.0887 19.6337 15.4442 20.3149C13.7996 20.9961 11.99 21.1743 10.2442 20.8271C8.49836 20.4798 6.89472 19.6226 5.63604 18.364C4.37737 17.1053 3.5202 15.5016 3.17294 13.7558C2.82567 12.01 3.0039 10.2004 3.68509 8.55585C4.36628 6.91131 5.51983 5.50571 6.99987 4.51677C8.47991 3.52784 10.22 3 12 3C14.387 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12Z" fill="#FF225A"/>
                                <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM20.2153 11.25H16.4813C16.3491 8.58187 15.5184 6.04969 14.1263 4.03125C15.7568 4.469 17.2142 5.39535 18.3027 6.68582C19.3912 7.97629 20.0587 9.56903 20.2153 11.25ZM9.02157 12.75H14.9784C14.8209 15.6441 13.7597 18.3394 12 20.2397C10.2441 18.3394 9.17907 15.6441 9.02157 12.75ZM9.02157 11.25C9.17907 8.35594 10.2403 5.66062 12 3.76031C13.7559 5.66062 14.8209 8.35406 14.9784 11.25H9.02157ZM9.87375 4.03125C8.48157 6.04969 7.65094 8.58187 7.51875 11.25H3.78469C3.94133 9.56903 4.60876 7.97629 5.69728 6.68582C6.7858 5.39535 8.24325 4.469 9.87375 4.03125ZM3.78469 12.75H7.51875C7.65094 15.4181 8.48157 17.9503 9.87375 19.9688C8.24325 19.531 6.7858 18.6046 5.69728 17.3142C4.60876 16.0237 3.94133 14.431 3.78469 12.75ZM14.1263 19.9688C15.5184 17.9475 16.3491 15.4153 16.4813 12.75H20.2153C20.0587 14.431 19.3912 16.0237 18.3027 17.3142C17.2142 18.6046 15.7568 19.531 14.1263 19.9688Z" fill="#FF225A"/>
                                </svg>
                                Website</a> 
                            </li>
                        `;
                    }
                    influencer_card += `
                        </ul>
                            <ol>
                                <li>
                                    <span>Fans</span>
                                    ${influencer.follower_count}
                                </li>
                                <li>
                                    <span>Eng Rate</span>
                                    ${influencer.engagement_percent}%
                                </li>

                                <li>
                                    <span>Posts</span>
                                    ${influencer.media_count}
                                </li>
                            </ol>
                        </div>
                        <div class="IG-tool-profile-foot">
                            <ul>
                            ${
                                influencer.hashtags.map(hashtag => "<li>#" + hashtag + "</li>").join('')
                            }
                            </ul>
                        </div>
                    </div>
                    `;

                    influencers_card_grid.append(influencer_card);
                    search_button.prop("disabled", false);
                    setCookie('ic_free_searches', available_free_searches, 1);
                }
                
                if(data_count % 3 === 0){   // if there are 3 or 6 number of results
                    blur_result_section.html(`
                        <!-- Notify Blur Section -->
                        <div class="IG-tool-notify">
                            <div class="inner-content">
                                <h3>To see all ${random_number}k results, start a free trial</h3>
                            <p>This is just a sneak preview of what Modash has to offer. Sign up & to search & analyze any creator in the world. TRY FOR FREE</p>
                            <a class="IG-tool-submit" href="#">Try For Free</a>
                            </div>
                        </div>
                    `);
                }

            } else if(data_count === 0) {
                blur_result_section.html(`
                    <!-- Not found Section -->
                    <div class="IG-tool-notify notFound-section">
                        <div class="inner-content">
                            <img src="${localized_data.not_found_icon}" alt="">
                            <h3>oops no result found</h3>
                        <p>Try adding only 1 keyword per search or try some of our sample searches</p>
                        <ul>
                            <li> <b>Crypto</b> - 1200 results</li>
                            <li> <b>Fashion Influnecer</b> - 1200 results</li>
                            <li> <b>Pet Owner</b> - 1200 results</li>
                        </ul>
                        </div>
                    </div>
                `);
            }
        })
        .catch((error) => {
            console.error('Fetch error:', error);
        });
    }

    search_form.on('submit', (e) => {
        e.preventDefault();

        if(available_free_searches > 0){
            getInfluencers(e);
        } else {
            show_result_div.html(`<h5>You are out of your free searches. <a href="">Start a free trial now.</a></h5>`);
        }

    });

    clear_followers_range_button.on('click', () => {
        $('#to_followers').val("").trigger("change");
        $('#from_followers').val("").trigger("change");
        // search_form.submit();
    });

    clear_country_button.on('click', () => {
        $('#location').val("").trigger("change"); // if you are using the Select2 library for styling, you should trigger the "change"
        // search_form.submit();
    });


});

