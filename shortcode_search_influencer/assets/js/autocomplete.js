jQuery.noConflict();
jQuery(document).ready(function ($) {
  function autocomplete(inp, arr) {
    var currentFocus;

    inp.on("input", function (e) {
      var a,
        b,
        i,
        val = inp.val();
      closeAllLists();

      if (!val) {
        return false;
      }

      currentFocus = -1;
      a = $("<div>")
        .attr("id", inp.attr("id") + "autocomplete-list")
        .addClass("autocomplete-items");
      inp.parent().append(a);

      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = $("<div>")
            .html(
              "<strong>" +
                arr[i].substr(0, val.length) +
                "</strong>" +
                arr[i].substr(val.length)
            )
            .append("<input type='hidden' value='" + arr[i] + "'>")
            .on("click", function (e) {
              inp.val($(this).find("input").val());
              closeAllLists();
            });

          a.append(b);
        }
      }
    });

    inp.on("keydown", function (e) {
      var x = $("#" + inp.attr("id") + "autocomplete-list").find("div");

      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) {
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          x.eq(currentFocus).click();
        }
      }
    });

    function addActive(x) {
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = x.length - 1;
      x.eq(currentFocus).addClass("autocomplete-active");
    }

    function removeActive(x) {
      x.removeClass("autocomplete-active");
    }

    function closeAllLists(elmnt) {
      $(".autocomplete-items").not(elmnt).remove();
    }

    $(document).on("click", function (e) {
      closeAllLists(e.target);
    });
  }

  var countries = [
    "Music",
    "Christian music",
    "Classical music",
    "Country",
    "Electronic music",
    "Hip hop music",
    "Independent music",
    "Jazz",
    "Music of Asia",
    "Music of Latin America",
    "Pop music",
    "Reggae",
    "Rhythm and blues",
    "Rock music",
    "Soul music",
    "Gaming",
    "Action game",
    "Action-adventure game",
    "Casual game",
    "Music video game",
    "Puzzle video game",
    "Racing video game",
    "Role-playing video game",
    "Simulation video game",
    "Sports game",
    "Strategy video game",
    "Sports",
    "American football",
    "Baseball",
    "Basketball",
    "Boxing",
    "Cricket",
    "Football",
    "Golf",
    "Ice hockey",
    "Mixed martial arts",
    "Motorsport",
    "Tennis",
    "Volleyball",
    "Entertainment",
    "Humor",
    "Movies",
    "Performing arts",
    "Professional wrestling",
    "TV shows",
    "Lifestyle",
    "Fashion",
    "Fitness",
    "Food",
    "Hobby",
    "Pets",
    "Physical attractiveness",
    "Beauty",
    "Technology",
    "Tourism",
    "Vehicles",
    "Society",
    "Business",
    "Health",
    "Military",
    "Politics",
    "Religion",
    "Knowledge",
  ];
  autocomplete($("#myInput"), countries);

  const listItems = countries.map((item) =>
    $("<li>")
      .addClass(
        "cursor-pointer py-[10px] hover:bg-[#ffd60f] hover:text-black rounded-[5px] px-[10px]"
      )
      .text(item)
  );
  const dropdownContainer = $("<div>")
    .addClass(
      "w-full max-h-[200px] min-h-[200px] overflow-auto absolute top-[66px] left-0 right-0 bg-[#0d1117] border border-[#232e41] z-[99] rounded-[10px] p-[20px]"
    )
    .append(
      $("<ul>")
        .attr("id", "keyword_dropdown_list")
        .addClass("flex flex-col text-white text-[14px]")
        .append(listItems)
    );

  const dropdown_list_html = `
  <div class="w-full max-h-[200px] min-h-[200px] overflow-auto absolute top-[66px] left-0 right-0 bg-[#0d1117] border border-[#232e41] z-[99] rounded-[10px] p-[20px]">
  <ul id= "keyword_dropdown_list" class="flex flex-col text-white text-[14px]">
  <li class="cursor-pointer py-[10px] hover:bg-[#ffd60f] hover:text-black rounded-[5px] px-[10px]">ction-adventure game</li> 
  </ul>
  </div>`;

  //   $("#dropdown_option_keyword").on("click", () => {
  //     $("#keyword_dropdown_list").show();
  //     $("#keyword_dropdown_list").append(dropdownContainer);
  //     $("#keyword_dropdown_list li").on("click", function () {
  //       // Get the text value of the clicked list item
  //       const selectedItemText = $(this).text();

  //       // Log or use the selectedItemText as needed
  //       console.log("Selected Item: ", selectedItemText);
  //       $("#myInput").val(selectedItemText);
  //       console.log($("#myInput").val());
  //       $("#keyword_dropdown_list").hide();
  //     });
  //   });
  //   $("#myInput").on("focus", function () {
  //     $("#keyword_dropdown_list").hide();
  //   });
  //   $("#myInput").on("input", function () {
  //     if ($(this).val().trim() !== "") {
  //       $("#keyword_dropdown_list").hide();
  //     }
  //   });
});
