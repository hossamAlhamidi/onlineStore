const search_input = document.querySelector("#search");
const search_btn = document.querySelector("#search-btn");


search_input.addEventListener("keyup", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
      // Cancel the default action, if needed
    //   event.preventDefault();
      // Trigger the button element with a click
     search_btn.click();
    //  window.location.href="search.php";
    }
  });

  