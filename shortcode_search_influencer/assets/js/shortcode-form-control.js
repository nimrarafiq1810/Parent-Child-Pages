jQuery.noConflict();
jQuery(document).ready(function ($) {
  const populateSelectOptions = (
    select_id,
    options_list,
    placeholder_text = "",
    same_value_as_name = false
  ) => {
    const select = $(select_id);
    if (placeholder_text !== "") {
      select.append(
        $("<option>", {
          value: "",
          text: placeholder_text,
          disabled: true,
          selected: true,
        })
      );
    }

    options_list.forEach((option) => {
      select.append(
        $("<option>", {
          value: same_value_as_name ? option.name : option.value,
          text: option.name,
        })
      );
    });
  };
  // ====================================================================================================================
  // Handeling keywords adding
  // let entered_keywords = [];

  // const handleKeyPress = (e) => {
  //     // Addding keywords
  //     if (e.key === 'Enter') {
  //         e.preventDefault();
  // //         addToInputList();
  //     }

  // }

  // const addToInputList = () => {
  //     const keywords_input_field = $('#bio')
  //     const keywords_input_field_value = keywords_input_field.val().trim();

  //     if (keywords_input_field_value !== '') {
  //         var input_list = $('#bio_keywords_list');
  // //         var list_item = $('<li>').addClass('listItem'); // Create a new list item

  // //         var textContent = $('<span>').text(keywords_input_field_value); // Text content
  // //         list_item.append(textContent);

  // //         entered_keywords.push(keywords_input_field_value);

  //         var remove_button = $('<span>').addClass('removeButton').text('Remove'); // Remove button
  //         remove_button.on('click', function() {
  //             removeFromInputList(list_item);
  //         });

  //         list_item.append(remove_button);
  //         input_list.append(list_item);

  //         keywords_input_field.val(''); // Clear the input field
  //         keywords_input_field.prop('disabled', true);
  //     }
  // }

  // const removeFromInputList = (item) => {
  //     const keywords_input_field = $('#bio')
  //     let item_text = $(item).find('span').text().replace("Remove", "");
  //     entered_keywords = entered_keywords.filter(el => el !== item_text);

  //     $(item).remove(); // Use jQuery's remove() method
  //     keywords_input_field.prop('disabled', false);

  // }

  // ====================================================================================================================
  // handeling min and max range filter

  const range_min_dropdown = $("#from");
  const range_max_dropdown = $("#to");

  const min_val = 5000;
  const max_val = 200000;
  const step_size = 10000;
  const followers_range = Array.from(
    { length: (max_val - min_val) / 5000 + 1 },
    (_, index) => {
      const value = min_val + index * step_size;
      return { name: value.toString(), value: value };
    }
  );

  populateSelectOptions(range_min_dropdown, followers_range);
  populateSelectOptions(range_max_dropdown, followers_range);

  range_min_dropdown.on("change", () => {
    // if min followers are selected, the max followers options should be greater than min value
    const selected_min = parseInt(range_min_dropdown.val());
    const new_range_for_max = followers_range.filter(
      (val) => val.value > selected_min
    );

    range_max_dropdown.empty();
    populateSelectOptions(
      range_max_dropdown,
      new_range_for_max,
      (placeholder_text = "Max")
    );
  });
  // ====================================================================================================================
  // handeling countries dropdown

  const countries_list = [
    // All countries
    // length 252
    { name: "Afghanistan", value: "AF" },
    { name: "Åland Islands", value: "AX" },
    { name: "Albania", value: "AL" },
    { name: "Algeria", value: "DZ" },
    { name: "American Samoa", value: "AS" },
    { name: "Andorra", value: "AD" },
    { name: "Angola", value: "AO" },
    { name: "Anguilla", value: "AI" },
    { name: "Antarctica", value: "AQ" },
    { name: "Antigua & Barbuda", value: "AG" },
    { name: "Argentina", value: "AR" },
    { name: "Armenia", value: "AM" },
    { name: "Aruba", value: "AW" },
    { name: "Australia", value: "AU" },
    { name: "Austria", value: "AT" },
    { name: "Azerbaijan", value: "AZ" },
    { name: "Bahamas", value: "BS" },
    { name: "Bahrain", value: "BH" },
    { name: "Bangladesh", value: "BD" },
    { name: "Barbados", value: "BB" },
    { name: "Belarus", value: "BY" },
    { name: "Belgium", value: "BE" },
    { name: "Belize", value: "BZ" },
    { name: "Benin", value: "BJ" },
    { name: "Bermuda", value: "BM" },
    { name: "Bhutan", value: "BT" },
    { name: "Bolivia", value: "BO" },
    { name: "Caribbean Netherlands", value: "BQ" },
    { name: "Bosnia & Herzegovina", value: "BA" },
    { name: "Botswana", value: "BW" },
    { name: "Bouvet Island", value: "BV" },
    { name: "Brazil", value: "BR" },
    { name: "British Indian Ocean Territory", value: "IO" },
    { name: "Brunei", value: "BN" },
    { name: "Bulgaria", value: "BG" },
    { name: "Burkina Faso", value: "BF" },
    { name: "Burundi", value: "BI" },
    { name: "Cambodia", value: "KH" },
    { name: "Cameroon", value: "CM" },
    { name: "Canada", value: "CA" },
    { name: "Cape Verde", value: "CV" },
    { name: "Cayman Islands", value: "KY" },
    { name: "Central African Republic", value: "CF" },
    { name: "Chad", value: "TD" },
    { name: "Chile", value: "CL" },
    { name: "China", value: "CN" },
    { name: "Christmas Island", value: "CX" },
    { name: "Cocos (Keeling) Islands", value: "CC" },
    { name: "Colombia", value: "CO" },
    { name: "Comoros", value: "KM" },
    { name: "Congo - Brazzaville", value: "CG" },
    { name: "Congo - Kinshasa", value: "CD" },
    { name: "Cook Islands", value: "CK" },
    { name: "Costa Rica", value: "CR" },
    { name: "Côte d’Ivoire", value: "CI" },
    { name: "Croatia", value: "HR" },
    { name: "Cuba", value: "CU" },
    { name: "Curaçao", value: "CW" },
    { name: "Cyprus", value: "CY" },
    { name: "Czechia", value: "CZ" },
    { name: "Denmark", value: "DK" },
    { name: "Djibouti", value: "DJ" },
    { name: "Dominica", value: "DM" },
    { name: "Dominican Republic", value: "DO" },
    { name: "Ecuador", value: "EC" },
    { name: "Egypt", value: "EG" },
    { name: "El Salvador", value: "SV" },
    { name: "Equatorial Guinea", value: "GQ" },
    { name: "Eritrea", value: "ER" },
    { name: "Estonia", value: "EE" },
    { name: "Ethiopia", value: "ET" },
    { name: "Falkland Islands (Islas Malvinas)", value: "FK" },
    { name: "Faroe Islands", value: "FO" },
    { name: "Fiji", value: "FJ" },
    { name: "Finland", value: "FI" },
    { name: "France", value: "FR" },
    { name: "French Guiana", value: "GF" },
    { name: "French Polynesia", value: "PF" },
    { name: "French Southern Territories", value: "TF" },
    { name: "Gabon", value: "GA" },
    { name: "Gambia", value: "GM" },
    { name: "Georgia", value: "GE" },
    { name: "Germany", value: "DE" },
    { name: "Ghana", value: "GH" },
    { name: "Gibraltar", value: "GI" },
    { name: "Greece", value: "GR" },
    { name: "Greenland", value: "GL" },
    { name: "Grenada", value: "GD" },
    { name: "Guadeloupe", value: "GP" },
    { name: "Guam", value: "GU" },
    { name: "Guatemala", value: "GT" },
    { name: "Guernsey", value: "GG" },
    { name: "Guinea", value: "GN" },
    { name: "Guinea-Bissau", value: "GW" },
    { name: "Guyana", value: "GY" },
    { name: "Haiti", value: "HT" },
    { name: "Heard & McDonald Islands", value: "HM" },
    { name: "Vatican City", value: "VA" },
    { name: "Honduras", value: "HN" },
    { name: "Hong Kong", value: "HK" },
    { name: "Hungary", value: "HU" },
    { name: "Iceland", value: "IS" },
    { name: "India", value: "IN" },
    { name: "Indonesia", value: "ID" },
    { name: "Iran", value: "IR" },
    { name: "Iraq", value: "IQ" },
    { name: "Ireland", value: "IE" },
    { name: "Isle of Man", value: "IM" },
    { name: "Israel", value: "IL" },
    { name: "Italy", value: "IT" },
    { name: "Jamaica", value: "JM" },
    { name: "Japan", value: "JP" },
    { name: "Jersey", value: "JE" },
    { name: "Jordan", value: "JO" },
    { name: "Kazakhstan", value: "KZ" },
    { name: "Kenya", value: "KE" },
    { name: "Kiribati", value: "KI" },
    { name: "North Korea", value: "KP" },
    { name: "South Korea", value: "KR" },
    { name: "Kosovo", value: "XK" },
    { name: "Kuwait", value: "KW" },
    { name: "Kyrgyzstan", value: "KG" },
    { name: "Laos", value: "LA" },
    { name: "Latvia", value: "LV" },
    { name: "Lebanon", value: "LB" },
    { name: "Lesotho", value: "LS" },
    { name: "Liberia", value: "LR" },
    { name: "Libya", value: "LY" },
    { name: "Liechtenstein", value: "LI" },
    { name: "Lithuania", value: "LT" },
    { name: "Luxembourg", value: "LU" },
    { name: "Macao", value: "MO" },
    { name: "North Macedonia", value: "MK" },
    { name: "Madagascar", value: "MG" },
    { name: "Malawi", value: "MW" },
    { name: "Malaysia", value: "MY" },
    { name: "Maldives", value: "MV" },
    { name: "Mali", value: "ML" },
    { name: "Malta", value: "MT" },
    { name: "Marshall Islands", value: "MH" },
    { name: "Martinique", value: "MQ" },
    { name: "Mauritania", value: "MR" },
    { name: "Mauritius", value: "MU" },
    { name: "Mayotte", value: "YT" },
    { name: "Mexico", value: "MX" },
    { name: "Micronesia", value: "FM" },
    { name: "Moldova", value: "MD" },
    { name: "Monaco", value: "MC" },
    { name: "Mongolia", value: "MN" },
    { name: "Montenegro", value: "ME" },
    { name: "Montserrat", value: "MS" },
    { name: "Morocco", value: "MA" },
    { name: "Mozambique", value: "MZ" },
    { name: "Myanmar (Burma)", value: "MM" },
    { name: "Namibia", value: "NA" },
    { name: "Nauru", value: "NR" },
    { name: "Nepal", value: "NP" },
    { name: "Netherlands", value: "NL" },
    { name: "Curaçao", value: "AN" },
    { name: "New Caledonia", value: "NC" },
    { name: "New Zealand", value: "NZ" },
    { name: "Nicaragua", value: "NI" },
    { name: "Niger", value: "NE" },
    { name: "Nigeria", value: "NG" },
    { name: "Niue", value: "NU" },
    { name: "Norfolk Island", value: "NF" },
    { name: "Northern Mariana Islands", value: "MP" },
    { name: "Norway", value: "NO" },
    { name: "Oman", value: "OM" },
    { name: "Pakistan", value: "PK" },
    { name: "Palau", value: "PW" },
    { name: "Palestine", value: "PS" },
    { name: "Panama", value: "PA" },
    { name: "Papua New Guinea", value: "PG" },
    { name: "Paraguay", value: "PY" },
    { name: "Peru", value: "PE" },
    { name: "Philippines", value: "PH" },
    { name: "Pitcairn Islands", value: "PN" },
    { name: "Poland", value: "PL" },
    { name: "Portugal", value: "PT" },
    { name: "Puerto Rico", value: "PR" },
    { name: "Qatar", value: "QA" },
    { name: "Réunion", value: "RE" },
    { name: "Romania", value: "RO" },
    { name: "Russia", value: "RU" },
    { name: "Rwanda", value: "RW" },
    { name: "St. Barthélemy", value: "BL" },
    { name: "St. Helena", value: "SH" },
    { name: "St. Kitts & Nevis", value: "KN" },
    { name: "St. Lucia", value: "LC" },
    { name: "St. Martin", value: "MF" },
    { name: "St. Pierre & Miquelon", value: "PM" },
    { name: "St. Vincent & Grenadines", value: "VC" },
    { name: "Samoa", value: "WS" },
    { name: "San Marino", value: "SM" },
    { name: "São Tomé & Príncipe", value: "ST" },
    { name: "Saudi Arabia", value: "SA" },
    { name: "Senegal", value: "SN" },
    { name: "Serbia", value: "RS" },
    { name: "Serbia", value: "CS" },
    { name: "Seychelles", value: "SC" },
    { name: "Sierra Leone", value: "SL" },
    { name: "Singapore", value: "SG" },
    { name: "Sint Maarten", value: "SX" },
    { name: "Slovakia", value: "SK" },
    { name: "Slovenia", value: "SI" },
    { name: "Solomon Islands", value: "SB" },
    { name: "Somalia", value: "SO" },
    { name: "South Africa", value: "ZA" },
    { name: "South Georgia & South Sandwich Islands", value: "GS" },
    { name: "South Sudan", value: "SS" },
    { name: "Spain", value: "ES" },
    { name: "Sri Lanka", value: "LK" },
    { name: "Sudan", value: "SD" },
    { name: "Suriname", value: "SR" },
    { name: "Svalbard & Jan Mayen", value: "SJ" },
    { name: "Eswatini", value: "SZ" },
    { name: "Sweden", value: "SE" },
    { name: "Switzerland", value: "CH" },
    { name: "Syria", value: "SY" },
    { name: "Taiwan", value: "TW" },
    { name: "Tajikistan", value: "TJ" },
    { name: "Tanzania", value: "TZ" },
    { name: "Thailand", value: "TH" },
    { name: "Timor-Leste", value: "TL" },
    { name: "Togo", value: "TG" },
    { name: "Tokelau", value: "TK" },
    { name: "Tonga", value: "TO" },
    { name: "Trinidad & Tobago", value: "TT" },
    { name: "Tunisia", value: "TN" },
    { name: "Turkey", value: "TR" },
    { name: "Turkmenistan", value: "TM" },
    { name: "Turks & Caicos Islands", value: "TC" },
    { name: "Tuvalu", value: "TV" },
    { name: "Uganda", value: "UG" },
    { name: "Ukraine", value: "UA" },
    { name: "United Arab Emirates", value: "AE" },
    { name: "United Kingdom", value: "GB" },
    { name: "United States", value: "US" },
    { name: "U.S. Outlying Islands", value: "UM" },
    { name: "Uruguay", value: "UY" },
    { name: "Uzbekistan", value: "UZ" },
    { name: "Vanuatu", value: "VU" },
    { name: "Venezuela", value: "VE" },
    { name: "Vietnam", value: "VN" },
    { name: "British Virgin Islands", value: "VG" },
    { name: "U.S. Virgin Islands", value: "VI" },
    { name: "Wallis & Futuna", value: "WF" },
    { name: "Western Sahara", value: "EH" },
    { name: "Yemen", value: "YE" },
    { name: "Zambia", value: "ZM" },
    { name: "Zimbabwe", value: "ZW" },
  ];
  const keywordsList = [
    { name: "Action game", value: "action_game" },
    { name: "Action-adventure game", value: "action_adventure_game" },
    { name: "American football", value: "american_football" },
    { name: "Baseball", value: "baseball" },
    { name: "Basketball", value: "basketball" },
    { name: "Beauty", value: "beauty" },
    { name: "Boxing", value: "boxing" },
    { name: "Business", value: "business" },
    { name: "Casual game", value: "casual_game" },
    { name: "Christian music", value: "christian_music" },
    { name: "Classical music", value: "classical_music" },
    { name: "Country", value: "country" },
    { name: "Cricket", value: "cricket" },
    { name: "Electronic music", value: "electronic_music" },
    { name: "Entertainment", value: "entertainment" },
    { name: "Fashion", value: "fashion" },
    { name: "Fitness", value: "fitness" },
    { name: "Food", value: "food" },
    { name: "Football", value: "football" },
    { name: "Gaming", value: "gaming" },
    { name: "Golf", value: "golf" },
    { name: "Health", value: "health" },
    { name: "Hip hop music", value: "hip_hop_music" },
    { name: "Hobby", value: "hobby" },
    { name: "Humor", value: "humor" },
    { name: "Ice hockey", value: "ice_hockey" },
    { name: "Independent music", value: "independent_music" },
    { name: "Jazz", value: "jazz" },
    { name: "Knowledge", value: "knowledge" },
    { name: "Lifestyle", value: "lifestyle" },
    { name: "Military", value: "military" },
    { name: "Mixed martial arts", value: "mixed_martial_arts" },
    { name: "Motorsport", value: "motorsport" },
    { name: "Movies", value: "movies" },
    { name: "Music", value: "music" },
    { name: "Music of Asia", value: "music_of_asia" },
    { name: "Music of Latin America", value: "music_of_latin_america" },
    { name: "Music video game", value: "music_video_game" },
    { name: "Pets", value: "pets" },
    { name: "Physical attractiveness", value: "physical_attractiveness" },
    { name: "Politics", value: "politics" },
    { name: "Pop music", value: "pop_music" },
    { name: "Professional wrestling", value: "professional_wrestling" },
    { name: "Puzzle video game", value: "puzzle_video_game" },
    { name: "Racing video game", value: "racing_video_game" },
    { name: "Reggae", value: "reggae" },
    { name: "Religion", value: "religion" },
    { name: "Rhythm and blues", value: "rhythm_and_blues" },
    { name: "Rock music", value: "rock_music" },
    { name: "Role-playing video game", value: "role_playing_video_game" },
    { name: "Simulation video game", value: "simulation_video_game" },
    { name: "Society", value: "society" },
    { name: "Soul music", value: "soul_music" },
    { name: "Sports", value: "sports" },
    { name: "Sports game", value: "sports_game" },
    { name: "Strategy video game", value: "strategy_video_game" },
    { name: "Technology", value: "technology" },
    { name: "Tennis", value: "tennis" },
    { name: "TV shows", value: "tv_shows" },
    { name: "Vehicles", value: "vehicles" },
    { name: "Volleyball", value: "volleyball" },
  ];

  const countries_dropdown = $("#InfluencerLocation");
  populateSelectOptions(
    countries_dropdown,
    countries_list,
    (placeholder_text = ""),
    (same_value_as_name = true)
  );
  const keywords_dropdown = $("#InfluencerKeyword");
  populateSelectOptions(
    keywords_dropdown,
    keywordsList,
    (placeholder_text = ""),
    (same_value_as_name = true)
  );
});
