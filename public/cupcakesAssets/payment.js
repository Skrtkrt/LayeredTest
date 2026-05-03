function buyNow(productName, amount) {
    // Send an AJAX request to the /pay route
    fetch('/pay', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify({
        product_name: productName,
        amount: amount,
      }),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        // Redirect to the checkout URL
        window.location.href = data.checkout_url;
      })
      .catch(function (error) {
        console.error('Error:', error);
      });
  }
  