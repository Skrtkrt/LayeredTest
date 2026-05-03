// popup.js
// Show the pop-up message
function showPopup(productName, amount) {
    // Check if the transaction count exceeds the limit
    if (transactionCount >= 10) {
      var currentDate = new Date();
      var nextAvailableDate = new Date(currentDate.setDate(currentDate.getDate() + 3)).toDateString();
      var message = "The limit is reached. If you want to order, your order will be made on " + nextAvailableDate + ".";
      document.getElementById("popup-message").textContent = message;
      document.getElementById("popup").style.display = "block";
    } else {
      // Redirect to the payment gateway
      window.location.href = '/pay?product=' + encodeURIComponent(productName) + '&amount=' + encodeURIComponent(amount);
    }
  }
  

// Show the pop-up message
function showPopup() {
    document.getElementById("popup").style.display = "block";
  }
  
  // Hide the pop-up message
  function hidePopup() {
    document.getElementById("popup").style.display = "none";
  }
  
  // Handle the confirm order button click
  function confirmOrder() {
    hidePopup();
    alert("Your order is confirmed!");
  }
  
  // Handle the cancel order button click
  function cancelOrder() {
    hidePopup();
  }

