jQuery.noConflict();
jQuery(document).ready(function ($) {
  // Event delegation for click event on ".add-pages-button" within a static parent element
  $(document).on("click", ".add-pages-button", function (e) {
    e.preventDefault(); // Prevent the default form submission behavior

    var $button = $(this);
    var $row = $button.closest("tr");
    var batchName = $row.data("batch-name");
    var parentPage = $row.data("parent-page");
    var templateName = $row.data("template-name");
    var fileurl = $row.data("upload-csv-file");
    // Disable the table
    $("#table-div").prop("disabled", true);

    $("#table-div").addClass("spinner-admin-table");
    // Show loader
    // Extract data attributes from the closest row
    // var batchName = $(this).closest("tr").data("batch-name");
    // var parentPage = $(this).closest("tr").data("parent-page");
    // var templateName = $(this).closest("tr").data("template-name");
    // var fileurl = $(this).closest("tr").data("upload-csv-file");
    // Perform your action here, for example, AJAX call to add SEO pages
    $.ajax({
      url: localized_data_admin.ajax_url,
      type: "POST",
      data: {
        action: "add_seo_pages_callback",
        batch_name: batchName,
        parent_page: parentPage,
        template_name: templateName,
        file_url: fileurl,
      },
      success: function (response) {
        // Handle success

        $("#table-div").removeClass("spinner-admin-table");
        // Re-enable the table
        $("#table-div").prop("disabled", false);
        console.log(response);
        alert(response);
      },
      error: function (xhr, status, error) {
        // Remove loader
        $("#table-div").removeClass("spinner-admin-table");
        // Re-enable the table
        $("#table-div").prop("disabled", false);
        // Handle error
        console.log(error);
        alert(error);
      },
    });
  });

  $(document).on("click", ".delete-pages-button", function (e) {
    e.preventDefault(); // Prevent the default form submission behavior

    var $button = $(this);
    var $row = $button.closest("tr");
    var batchName = $row.data("batch-name");
    var parentPage = $row.data("parent-page");
    var templateName = $row.data("template-name");
    var fileurl = $row.data("upload-csv-file");
    // Disable the table
    $("#table-div").prop("disabled", true);

    $("#table-div").addClass("spinner-admin-table");

    $.ajax({
      url: localized_data_admin.ajax_url,
      type: "POST",
      data: {
        action: "delete_seo_pages_callback",
        batch_name: batchName,
        parent_page: parentPage,
        template_name: templateName,
        file_url: fileurl,
      },
      success: function (response) {
        // Handle success

        $("#table-div").removeClass("spinner-admin-table");
        // Re-enable the table
        $("#table-div").prop("disabled", false);
        console.log(response);
        alert(response);
      },
      error: function (xhr, status, error) {
        // Remove loader
        $("#table-div").removeClass("spinner-admin-table");
        // Re-enable the table
        $("#table-div").prop("disabled", false);
        // Handle error
        console.log(error);
        alert(error);
      },
    });
  });

  $(document).on("click", ".update-pages-button", function (e) {
    e.preventDefault(); // Prevent the default form submission behavior

    var $button = $(this);
    var $row = $button.closest("tr");
    var batchName = $row.data("batch-name");
    var parentPage = $row.data("parent-page");
    var templateName = $row.data("template-name");
    var fileurl = $row.data("upload-csv-file");
    // Disable the table
    $("#table-div").prop("disabled", true);

    $("#table-div").addClass("spinner-admin-table");

    $.ajax({
      url: localized_data_admin.ajax_url,
      type: "POST",
      data: {
        action: "update_seo_pages_callback",
        batch_name: batchName,
        parent_page: parentPage,
        template_name: templateName,
        file_url: fileurl,
      },
      success: function (response) {
        // Handle success

        $("#table-div").removeClass("spinner-admin-table");
        // Re-enable the table
        $("#table-div").prop("disabled", false);
        console.log(response);
        alert(response);
      },
      error: function (xhr, status, error) {
        // Remove loader
        $("#table-div").removeClass("spinner-admin-table");
        // Re-enable the table
        $("#table-div").prop("disabled", false);
        // Handle error
        console.log(error);
        alert(error);
      },
    });
  });
  // Similarly, you can handle click events for other buttons like "Delete" and "Update"
});
