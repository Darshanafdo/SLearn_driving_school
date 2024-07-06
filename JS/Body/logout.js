document
  .getElementById("logoutBtn")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default link behavior
    var userConfirmed = confirm(
      "Are you sure you want to logout of this website?"
    );
    if (userConfirmed) {
      // If the user confirms, proceed to the logout page
      window.location.href = "logout.php";
    } // Otherwise, do nothing and stay on the page
  });
