jQuery.noConflict();
jQuery(document).ready(function ($) {
  $(".select2").select2();

  const show_result_fig = $("#Result_in_figures");
  const search_button = $("#search-submit-button");
  const influencers_card_grid = $("#influencer_grid");
  const buttons_section = $("#button_section");
  const tool_blur_section = $("#tool_blur_section");
  const type = $(".influencer-custom-tool").data("type");
  const id = $("#influencer_grid").data("id");
  const cookie_name = "shortcode_cookie_" + type;

  const clear_country_button_tool = $("#clear_country_button_shortcode");
  const clear_follower_range = $("#clear_followers_range_shortcode");
  const clear_follower_youtube = $("#clear_followers_range_youtube");

  let free_searches = getCookie(cookie_name);
  if (free_searches === null) {
    // when a user is searching for the first time in a day
    setCookie(cookie_name, 5, 1);
    free_searches = getCookie(cookie_name);
  }
  let available_free_searches = free_searches; //after completing the task set back from 10 to free_searches
  search_button.html(`Search Influencers (${available_free_searches})`);
  const getInfluencers = () => {
    // disabling search button to avoid multiple calls
    search_button.prop("disabled", true);

    // clearing previously rendered html
    influencers_card_grid.html("");
    show_result_fig.html("");
    buttons_section.html("");
    tool_blur_section.html("");

    // adding loading cards
    for (let index = 0; index < 3; index++) {
      influencers_card_grid.append(new_loader_card); // loading card is defined in form-control.js
    }

    let location_field = $("#InfluencerLocation").val();
    let bio_field = $("#InfluencerKeyword").val();
    let from_field = $("#from").val();
    let to_field = $("#to").val();

    if (location_field == null) {
      location_field = "";
    }
    if (bio_field == null) {
      bio_field = "";
    }
    if (from_field == null) {
      from_field = "5000";
    }
    if (to_field == null) {
      to_field = "100000000";
    }

    var data_to_send = {
      location: location_field,
      bio: bio_field,
      from_followers: from_field,
      to_followers: to_field,
      tool_type: type,
      id_for_post: id,
      action: "shortcode_influencer_cards",
    };
    console.log(data_to_send);
    console.log(localized_data.ajax_url);
    $.ajax({
      url: localized_data.ajax_url,
      type: "POST",
      // contentType: "application/json", // Set the Content-Type header for JSON data
      data: data_to_send,
      success: function (response) {
        // Handle a successful response
        console.log(response.message);
        available_free_searches -= 1;
        search_button.html(`Search Influencers (${available_free_searches})`);
        influencers_card_grid.html(""); // clearing the loading cards
        search_button.prop("disabled", false);
        setCookie(cookie_name, available_free_searches, 1);
        const data_count = response.message.length;
        const random_number = Math.floor(Math.random() * (90 - 30 + 1)) + 30;
        const card_colors = ["", "blue-card", "yellow-card", "green-card"];
        const index_end = data_count >= 6 ? 6 : data_count;
        console.log(data_count);

        if (data_count > 0) {
          show_result_fig.html(
            `<h5>Showing ${
              data_count >= 6 ? "6" : data_count
            } of ${random_number}k profiles.</h5>`
          );
          buttons_section.html(`<p id="Check_box_count" class=" font-bold italic text-[18px] sm:text-[18px] md:text-[20px] text-[#0E2E4D] font-[500] inter">Profiles Selected:</p>
          <button class="custom-plain-link" id="checkAllButton">Select All</button>
                <a class="px-[15px] h-[48px] bg-white border border-[#D0D5DD] rounded-[8px] text-[#344054] inter font-[600] text-[16px] inline-flex items-center justify-center" href="https://influencers.club/signup/" target="_blank">Download CSV</a>`);
        }

        for (let index = 0; index < index_end; index++) {
          // const influencer = response.message[index];
          const influencer_card_ajax = response.message[index];
          // const influencer_card2_ajax = response.message2[index];
          influencers_card_grid.append(influencer_card_ajax);
        }
        if (data_count === 3 || data_count === 6) {
          // if there are 3 or 6 number of results
          tool_blur_section.html(`
                      <!-- Notify Blur Section -->
                      <div class="IG-tool-notify template-tool">
                          <div class="inner-content">
                              <h3>To see all ${random_number}k results, start a free trial</h3>
                          <p>This is just a sneak preview of what Influencers.Club has to offer. Sign up & to search & analyze any creator in the world. TRY FOR FREE</p>
                          <a class="IG-tool-submit bg-[#f0c933] p-[15px] rounded-[5px] text-[17px] shadow-md border border-solid border-2 border-blue-800 rounded-md font-bold uppercas" href="https://influencers.club/signup/" target="_blank">Try For Free</a>
                          </div>
                      </div>
                  `);
        } else if (data_count === 0) {
          not_found_html_string = `
                      <!-- Not found Section -->
                      <div class="IG-tool-notify notFound-section shortcode_tool">
                          <div class="inner-content">
                              <img src="${localized_data.not_found_icon}" alt="">
                              <h3>oops no result found</h3>
                              <p>Try adding only 1 keyword per search or try some of our sample searches</p>
                              <ul id="not_found_search_options">
                              <li data-value="Food" class="sample-search" > <b>Food</b></li>
                              <li data-value="Fashion" class="sample-search"> <b>Fashion</b></li>
                              <li data-value="Technology" class="sample-search"> <b>Technology</b></li>
                              <li data-value="Gaming" class="sample-search"> <b>Gaming</b></li>
                              `;
          if (type === "youtube") {
            not_found_html_string += `
                                  
                              <li data-value="Movies" class="sample-search"> <b>Movies</b></li>
                              </ul>
                          </div>
                      </div>
                  `;
          } else {
            not_found_html_string += `
                                  <li data-value="Lifestyle" class="sample-search" > <b>Lifestyle</b></li>
                                  <li data-value="Dance" class="sample-search"> <b>Dance</b></li>
                              </ul>
                          </div>
                      </div>
                  `;
          }

          influencers_card_grid.html(not_found_html_string);

          sampleSearchOptionsClick("not_found_search_options");
        }
      },
      error: function (xhr, status, error) {
        // Handle errors here
        console.error("Network response was not ok:", error);
      },
      complete: function () {
        // This code runs regardless of success or error
        search_button.prop("disabled", false); // Enable the search button for the next search
      },
    });
  };

  const sampleSearchOptionsClick = (ul_list_id) => {
    $(`#${ul_list_id} li`).on("click", (e) => {
      const current_location = $("#InfluencerLocation").val();
      const keyword_sample = $(e.currentTarget).data("value");
      $("#InfluencerKeyword").val(keyword_sample);
      $("#InfluencerLocation").val(current_location);
      $("#from").val("5000");
      $("#to").val("100000000");
      $("#select2-InfluencerKeyword-container").text(keyword_sample);
      if (available_free_searches > 0) {
        getInfluencers();
      } else {
        show_result_fig.html(out_of_searches_message);
        influencers_card_grid.html("");
        tool_blur_section.html("");
        buttons_section.html("");
      }
    });
  };
  search_button.on("click", (e) => {
    e.preventDefault();
    if (!influencers_card_grid.hasClass("hidden") === false) {
      influencers_card_grid.addClass("hidden");
    }
    if (!$("#result_buttons_section").hasClass("hidden") === false) {
      $("#result_buttons_section").addClass("hidden");
    }
    if (!tool_blur_section.hasClass("hidden") === false) {
      tool_blur_section.addClass("hidden");
    }
    influencers_card_grid.removeClass("hidden");

    $("#result_buttons_section").removeClass("hidden");

    tool_blur_section.removeClass("hidden");

    if (available_free_searches > 0) {
      getInfluencers();
    } else {
      show_result_fig.html(out_of_searches_message);
      influencers_card_grid.html("");
      tool_blur_section.html("");
      buttons_section.html("");
    }
  });

  let isChecked = false;

  jQuery(document).on("click", ".influ-checkbox", function () {
    const check_boxes_for_count = $("input[type='checkbox']:checked").length;
    $("#Check_box_count").text(`Profiles Selected: ${check_boxes_for_count}`);
    const number_of_cards = document.querySelectorAll(
      'input[type="checkbox"]'
    ).length;
    console.log(number_of_cards);
    if (check_boxes_for_count == number_of_cards) {
      $("#checkAllButton").text(`UnSelect All`);
    }
  });

  jQuery(document).on("click", "#checkAllButton", function () {
    const checkboxes = jQuery(".influ-checkbox");

    checkboxes.each(function () {
      jQuery(this).prop("checked", !isChecked);
    });
    const check_boxes_for_count = $("input[type='checkbox']:checked").length;
    $("#Check_box_count").text(`Profiles Selected: ${check_boxes_for_count}`);
    const number_of_cards = document.querySelectorAll(
      'input[type="checkbox"]'
    ).length;
    if (check_boxes_for_count == number_of_cards) {
      $("#checkAllButton").text(`UnSelect All`);
    } else if (check_boxes_for_count == 0) {
      $("#checkAllButton").text(`Select All`);
    }
    isChecked = !isChecked; // Toggle the state
  });

  clear_country_button_tool.on("click", () => {
    $("#InfluencerLocation").val("").trigger("change"); // if you are using the Select2 library for styling, you should trigger the "change"
    // search_form.submit();
  });
  clear_follower_range.on("click", () => {
    $("#to").val("").trigger("change");
    $("#from").val("").trigger("change");
    // search_form.submit();
  });
  clear_follower_youtube.on("click", () => {
    $("#to").val("").trigger("change");
    $("#from").val("").trigger("change");
    // search_form.submit();
  });
});
