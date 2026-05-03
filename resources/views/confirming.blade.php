<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>
  <style>
    .confirmation {
      text-align: center;
      margin-top: 100px;
    }

    .confirmation h1 {
      color: green;
      font-size: 48px;
    }

    .confirmation p {
      font-size: 24px;
    }
  </style>
  <script>
    // Countdown timer variables
    var count = 5; // Number of seconds to countdown from
    var redirectUrl = "/main"; // Redirect URL after countdown

    // Function to update the countdown timer
    function updateCountdown() {
      var countdownElement = document.getElementById("countdown");
      countdownElement.textContent = count;

      if (count === 0) {
        // Redirect after countdown
        window.location.href = redirectUrl;
      } else {
        // Decrease count and update after 1 second
        count--;
        setTimeout(updateCountdown, 1000);
      }
    }

    // Start the countdown on page load
    window.onload = function() {
      updateCountdown();
    };
  </script>
</head>
<body>
  <div class="confirmation">
    <h1>CONFIRM ORDER</h1>
    <p>Your order is confirmed. Please check your email for your order details.</p>
    <p>Redirecting to the main page in <span id="countdown">5</span> seconds...</p>
  </div>
</body>
</html>
