  // JavaScript code for the pop-up message
  function showLoginModal() {
    if (confirm("You need to login before proceeding to checkout. Do you want to login now?")) {
      window.location.href = "/login";
    }
  }