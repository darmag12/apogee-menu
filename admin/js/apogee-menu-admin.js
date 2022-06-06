// **** Admin scripts start here **** //
jQuery(document).ready(function ($) {
  $("#apogeeLogoFile").click(function (e) {
    e.preventDefault();
    var image = wp
      .media({
        title: "Upload Image",
        // mutiple: true if you want to upload multiple files at once
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        // This will return the selected image from the Media Uploader, the result is an object
        var uploaded_image = image.state().get("selection").first();
        // We convert uploaded_image to a JSON object to make accessing it easier
        // Output to the console uploaded_image
        // console.log(uploaded_image);
        var image_url = uploaded_image.toJSON().url;
        // Let's assign the url value to the input field
        $("#apogeeLogoFile").val(image_url);
        // Assign logo thumbnail
        $("[data-apogee-logo-thumbnail]").attr("src", `${image_url}`);
      });
  });
});

// Load script after dom has loaded
document.addEventListener("DOMContentLoaded", function () {
  // Declare all variables
  let navBgColor, navItemsColor, removeImgBtn, logoSrc, imgLogoContainer;

  // Set the color defaults
  let defaultNavBgColor = "#0D2A3B";
  let defaultNavItemsColor = "#ffffff";

  // Call init on load
  window.addEventListener("load", init);

  function init() {
    // Get select the elements in the DOM
    navBgColor = document.querySelector("[data-navBgColor]");
    navItemsColor = document.querySelector("[data-navItemsColor]");
    removeImgBtn = document.querySelector("[data-remove-logo-btn]");
    logoSrc = document.querySelector("[data-apogee-logo-thumbnail]");
    imgLogoContainer = document.getElementById("apogeeUploadLogoContainer");
    logoImgInputField = document.querySelector("[data-apogee-logo-img]");

    // Set the default color values if none exists
    !navBgColor.value
      ? (navBgColor.value = defaultNavBgColor)
      : navBgColor.value;
    !navItemsColor.value
      ? (navItemsColor.value = defaultNavItemsColor)
      : navItemsColor.value;

    // Attach a change event on both element
    navBgColor.addEventListener("change", updateNavBgColor);
    navItemsColor.addEventListener("change", updateNavItemsColor);
    // Attach a click handler on submit btn
    removeImgBtn.addEventListener("click", removeLogo);
  }

  // Updates the nav bg color
  function updateNavBgColor(e) {
    navBgColor.value = e.target.value;
    console.log(e.target.value);
  }

  // Updates the nav items color
  function updateNavItemsColor(e) {
    navItemsColor.value = e.target.value;
    console.log(e.target.value);
  }

  // Reloads Front page
  function removeLogo() {
    // Clear image input field
    logoImgInputField.value = "";
    // Clear thumbnail src
    logoSrc.src = "";
    // Hide image logo container
    imgLogoContainer.style.display = "none";
  }
});
