<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process the form submission
  $_SESSION['product'] = $_POST['product'];
  $_SESSION['amount'] = $_POST['amount'];

  // Redirect to the checkout page
  header('Location: /checkout');
  exit();
}
?>
@php
$orderQuantity = isset($orderCount) ? $orderCount : 0;
@endphp





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        
        .form-group {
          margin-bottom: 15px;
        }
    
        label {
          display: block;
          margin-bottom: 5px;
        }
    
        input[type="text"], input[type="email"] {
          width: 100%;
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 4px;
        }
            
        .address-dropdown {
          margin-top: 10px;
        }
    
        .address-dropdown label {
          margin-right: 10px;
        }
    
        .submit-btn {
          margin-top: 20px;
        }
      </style>
    <link rel="apple-touch-icon" href="logo.jpeg">
    <link rel="shortcut icon" type="image/jpeg" href="Base/layered.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="Base/layered.jpeg" alt="" width="100" height="100">
            <h2>Checkout</h2>
            <p class="lead">Please fill up the following before to proceed to the payment.</p>
            
        </div>
        <div class="row">
            <div class="col-md-12 order-md-1">
                    <div class="col-md-12 order-md-1">
                        <h4 class="mb-3">Personal Information</h4>
                            <div class="row">
                              <form id="checkout-form" action="/pay" method="POST">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" required>
                                    <div class="invalid-feedback"> Valid name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address:</label>
                                <input type="email" class="form-control" name="email" >
                                <div class="invalid-feedback"> Email address is required. </div>
                            </div>
                            <h4 class="mb-3">Product Information</h4>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="Product">Product:</label>
                                    <input type="text" class="form-control" name="product" value=" <?php echo $_SESSION['product'];?> " readonly>
                                    <div class="invalid-feedback"> Please fill up. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="flavor">Flavor</label>
                                    <select class="custom-select d-block w-100" name="flavor" required>
                                        <option value=" ">Choose...</option>
                                        <option value="Chocolate" selected="true">Chocolate</option>
                                        <option value="Red Velvet" selected="true">Red Velvet</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min=1 max=3 required>
                            </div>
                            <div class="mb-3">
                                    <label for="amount">Amount:</label>
                                    <input type="text" class="form-control" name="amount" value="<?php echo $_SESSION['amount'];?>" readonly>
                                </div>
                            <div class="mb-3">
                                <label for="reservation_date">Reservation Date:</label>
                                <input type="date" id="reservation-date" class="form-control" name="reservation_date" onchange="handleDateChange()" required>
                            </div>
                            
                                </div>
                            <h4 class="mb-3">Delivery Method:</h4>
                                <div class="col-md-6 mb-3">
                      
                                    <label>
                                      <input id="pickup" type="checkbox" class="form-control" name="deliveryMethod" value="pickup" onclick="toggleAddressInput(this)"> Pick-up
                                    </label>
                                    <label>
                                      <input id="delivery" type="checkbox" class="form-control" name="deliveryMethod" value="delivery" onclick="toggleAddressInput(this)"> Delivery
                                    </label>
                                                      </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <select class ="selectAddress" id="address" class="form-control" name="address" required style='display: none;'>
                              <option value="">Select an address</option>
                              <option value="Balucuc, Apalit" selected="true">Balucuc, Apalit</option>
                              <option value="Calantipe, Apalit" selected="true">Calantipe, Apalit</option>
                              <option value="Cansinala, Apalit" selected="true">Cansinala, Apalit</option>
                              <option value="Capalangan, Apalit" selected="true">Capalangan, Apalit</option>
                              <option value="Colgante, Apalit" selected="true">Colgante, Apalit</option>
                              <option value="Paligui, Apalit" selected="true">Paligui, Apalit</option>
                              <option value="Sampaloc, Apalit" selected="true">Sampaloc, Apalit</option>
                              <option value="San Juan, Apalit" selected="true">San Juan, Apalit</option>
                              <option value="San Vicente, Apalit" selected="true">San Vicente, Apalit</option>
                              <option value="Sucad, Apalit" selected="true">Sucad, Apalit</option>
                              <option value="Sulipan, Apalit" selected="true">Sulipan, Apalit</option>
                              <option value="Tabuyuc, Apalit" selected="true">Tabuyuc, Apalit</option>
                            </select>
                            <input class="inputAddress" type="text" id="customAddress" class="form-control" name="customAddress" placeholder="Enter your address" required style='display: none;'>
                          </div>


                            <script>
                                // Function to display the alert message and redirect to /main
                                function showAlertAndRedirect() {
                                alert('Your order is confirmed. Please check your email for further information.');
                                window.location.href = '/main';
                                }
                            </script>
                          <div class="mb-3">


                            



                          <h4 class="mb-3">Payment Method:</h4>
                            <label>
                              <input type="checkbox" name="paymentMethod"  class="form-control" value="cash" onclick="togglePaymentMethod(this)"> Cash
                            </label>
                            <label>
                              <input type="checkbox" name="paymentMethod" class="form-control" value="online" onclick="togglePaymentMethod(this)"> Online-Payment
                            </label>
                          </div>
                          <div class="mb-3">
                          @if(session()->has('reservationLimitReached'))
                              <script>
                            
                                  alert('Reservation limit for this date has been reached. Choose another date.');
                              </script>
                               <?php session()->forget('reservationLimitReached');
                              
                               ?>
              
                        
                              <button id="submit-btn" class="btn btn-secondary btn-lg btn-block"  type="submit" disabled >Confirm</button>
                              
                          @else
                            <button id="submit-btn" class="btn btn-secondary btn-lg btn-block"  type="submit" disabled >Confirm</button>
                          @endif  
                            <button class="btn btn-secondary btn-lg btn-block" type="submit" onclick="window.location.href='{{url('/main')}}'">Cancel</button>
                          </div>
                        </form>
                      
                        <script>
                           document.getElementById('checkout-form').addEventListener('submit', function(event) {
                            // Get the values from the form inputs
                            var name = document.getElementById('name').value;
                            var quantity = document.getElementById('quantity').value;
                            var flavor = document.getElementById('flavor').value;

                            // Set the values of the hidden input fields
                            document.getElementsByName('name')[0].value = name;
                            document.getElementsByName('quantity')[0].value = quantity;
                            document.getElementsByName('flavor')[0].value = flavor;

                            // Submit the form
                            return true;
                        });
                          // JavaScript code for the address input condition
                          function toggleAddressInput(checkbox) {
                            const addressDropdown = document.getElementById('address');
                            const customAddressInput = document.getElementById('customAddress');
                      
                            if (checkbox.value === 'pickup') {
                              
                              addressDropdown.style.display = 'none';
                              customAddressInput.style.display = 'block';
                              addressDropdown.disabled = true;
                              customAddressInput.disabled = false;
                            } else if (checkbox.value === 'delivery') {
                              addressDropdown.style.display = 'block';
                              customAddressInput.style.display = 'none';
                              addressDropdown.disabled = false;
                              customAddressInput.disabled = true;
                            }
                      
                            // Uncheck the other checkbox
                            const checkboxes = document.getElementsByName('deliveryMethod');
                            checkboxes.forEach(function(checkbox) {
                              if (checkbox !== event.target) {
                                checkbox.checked = false;
                              }
                            });
                          }
                      
                          // JavaScript code for the payment method checkbox condition
                          function togglePaymentMethod(checkbox) {
                            const cashCheckbox = document.querySelector('input[value="cash"]');
                            const onlineCheckbox = document.querySelector('input[value="online"]');
                      
                            if (checkbox.value === 'cash') {
                              onlineCheckbox.checked = false;
                            } else if (checkbox.value === 'online') {
                              cashCheckbox.checked = false;
                            }
                          }

                                                      // JavaScript code for the date input onchange event
                          function handleDateChange() {
                            var dateInput = document.getElementById('reservation-date');
                            var submitButton = document.getElementById('submit-btn');
                            var selectedDate = new Date(dateInput.value);

                            // Get the current date
                            var today = new Date();
                            today.setHours(0, 0, 0, 0); // Set the time to midnight for accurate comparison

                            // Compare the selected date with the current date
                            if (selectedDate.getTime() < today.getTime()) {
                              // Disable the submit button if the selected date is before today
                              submitButton.disabled = true;
                              alert('You cannot choose a previous day.');
                            } else {
                              // Enable the submit button if the selected date is today or later
                              submitButton.disabled = false;
                            }
                          }

                            


                       
     

                        </script>
</body>
</html>