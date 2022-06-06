// ALL PUBLIC SCRIPTS START HERE
document.addEventListener("DOMContentLoaded", init);
function init() {
  // Declare variables
  let navCloseBtn, hideApogeeNav, navContainer, loadApogeeAsync;

  // Select elements form the dom
  navCloseBtn = document.querySelector("[data-apogee-close-nav]");
  navContainer = document.getElementById("public-top-nav-apogee");

  apogeeNavSetTimer();
  // Delay loading the nav to sync with the website
  function apogeeNavSetTimer() {
    loadApogeeAsync = setTimeout(apogeeNavAsync, 100);
  }
  // Display the nav
  function apogeeNavAsync() {
    // Get the saved data from sessionStorage
    hideApogeeNav = sessionStorage.getItem("apogeeNavDisplay");
    // Display nav
    hideApogeeNav
      ? (navContainer.style.display = hideApogeeNav)
      : (navContainer.style.display = "flex");
  }
  // Attatch eventlistener
  navCloseBtn.addEventListener("click", closeApogeeNavigation);

  // Hides nav bar
  function closeApogeeNavigation() {
    // Save display value to sessionStorage
    sessionStorage.setItem("apogeeNavDisplay", "none");
    // Hide nav
    navContainer.style.display = "none";
  }
}
