<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Paymongo\Paymongo;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        
        $product = $request->input('product');
        $email=$request->input('email');
        
        $amount = $request->input('amount');
        $quantity = intval($request->input('quantity'));
        $flavor = $request->input('flavor');
        $price = $amount * $quantity;
        $reservationDate = $request->input('reservation_date');
        $finalDate = $this->getFinalDate($reservationDate); 
        $orderCount = $this->getOrderCount($reservationDate);

         // Check if the reservation limit has been reached
         $reservationLimitReached = ($orderCount >= 3);
    
         if ($reservationLimitReached) {
            // Remove any existing reservationLimitReached flash data
            session()->forget('reservationLimitReached');
                    // Reservation limit reached, store the status in session flash
            session()->flash('reservationLimitReached', true);
            return redirect()->route('checkout');
        }
       
       
        $succesUrl=  route('payment.success', [
            'name' => $request->input('name'),
            'product' => $product,
            'amount' => $amount,
            'quantity' => $quantity,
            'flavor' => $flavor,
            'reservation_date' => $reservationDate=$request ->input('reservation_date'),
            'email' => $email=$request->input('email'),
        ]);
        
        // Check if the payment method is online
        if ($request->input('paymentMethod') === 'online') {
            $data = [
                'data' => [
                    'attributes' => [
                        'line_items' => [
                            [
                                'currency' => 'PHP',
                                'amount' => $amount * 100,
                                'description' => $product . ' ' . $flavor. 'reservation:' .$reservationDate, 
                                'name' => $product,
                                'quantity' => $quantity,
                            ]
                        ],
                        'payment_method_types' => [
                            'card',
                            'gcash'
                        ],
                        'success_url' => $succesUrl,
                        'cancel_url' => 'http://localhost:8000/cancel',
                        'description' => $product
                    ],
                ],
            ];
            

            $handlerStack = HandlerStack::create();
            $handlerStack->push(
                Middleware::mapRequest(function ($request) {
                    return $request->withHeader('User-Agent', 'Your-App');
                })
            );
            $handlerStack->push(
                Middleware::mapResponse(function ($response) {
                    return $response->withHeader('Access-Control-Allow-Origin', '*');
                })
            );

            $client = new Client([
                'handler' => $handlerStack,
                'verify' => false, // Ignore SSL certificate verification
            ]);

            $response = $client->post('https://api.paymongo.com/v1/checkout_sessions', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic ' . env('AUTH_PAY'),
                ],
                'json' => $data,
            ]);

            $responseData = json_decode($response->getBody(), true);
            \Session::put('session_id', $responseData['data']['id']);
            \Session::put('paymongo_response', $responseData);
            return redirect()->to($responseData['data']['attributes']['checkout_url']);
              // Redirect to the success page with the form values
            
          
        } else {
            // Handle cash payment method
            // Display pop-up message and redirect to /main
            $paymentId = 'cs_' . Str::random(30);
            // Get the current date
            $todayDate = Carbon::now()->toDateString();
    
            // Calculate the final and reservation dates
            $finalDate = $this->getFinalDate($reservationDate);
           
           
                // Store the order details in the database
                Product::create([
                    'name' => $product,
                    'amount' => $amount,
                    'quantity' => $quantity,
                    'flavor' => $flavor,
                    'price' => $amount * $quantity,
                    'payment_id' => $paymentId,
                    'today_date' => $todayDate,
                    'final_date' => $finalDate,
                    'reservation_date' => $reservationDate,
                ]);

            // Send email to yourself
            $this->sendEmailToOwner($request->input('name'), $request->input('email'),  $product = $request->input('product'), $amount = $request->input('amount'), $quantity = intval($request->input('quantity')), $flavor = $request->input('flavor'), $price = $amount * $quantity ,$reservationDate, $finalDate);
            
            // Send email to the customer
            $this->sendEmailToCustomerCash($request->input('email'), $reservationDate, $finalDate);
            

            return redirect('/confirmation');
        }
        
    }
    public function checkout(Request $request)
    {
        $reservationLimitReached = $request->session()->get('reservationLimitReached', false);
        return view('checkout', compact('reservationLimitReached'));
}
    public function cancelPayment()
    {
        // Handle cancel payment logic  
        return redirect('/cancel')->with('message', 'Payment canceled.');
    }
    public function success(Request $request, $name, $product, $amount, $quantity, $flavor, $reservationDate, $email)
    {
       // $sessionId = \Session::get('session_id');
       

        // Retrieve the Paymongo response data from the session
        $paymongoResponse = \Session::get('paymongo_response');


        
        // Check if the Paymongo response data is available
        if (!$paymongoResponse) {
            return redirect('/errorpage')->with('message', 'Paymongo response data not found.');
        }
    
        // Extract the payment information from the Paymongo response
        $paymentId = $paymongoResponse['data']['id'];
        
        $paymentStatus = $paymongoResponse['data']['attributes']['status'];
        
        // ... extract other relevant payment information
    
        // Check if the payment was successful
        if ($paymentStatus === 'active') {
            
              // Get the current date
              $todayDate = Carbon::now()->toDateString();
    
              // Calculate the final and reservation dates
              $finalDate = $this->getFinalDate($reservationDate);


                // Store the order details in the database
                Product::create([
                    'name' => $product,
                    'amount' => $amount,
                    'quantity' => $quantity,
                    'flavor' => $flavor,
                    'price' => $amount * $quantity,
                    'payment_id' => $paymentId,
                    'today_date' => $todayDate,
                    'final_date' => $finalDate,
                    'reservation_date' => $reservationDate,
                ]);
                           // Get the necessary data from the request
                
                $price = $amount * $quantity;
                $subject = 'Order Confirmation';
                $message = "Thank you for the purchase. Your order has been confirm.\n\n"
                    ."Reservation Date: $reservationDate\n"
                    . "Final Date: $finalDate";
        
            // Send email to customer
            Mail::raw($message, function ($mail) use ($email, $subject) {
                $mail->to($email)
                    ->subject($subject);
                });
        
                
                $subject = 'New Order Received';
                $message = "A new order has been received.\n\n"
                    . "Name: $name\n"
                    . "Email: $email\n"
                    . "Product Name: $product\n"
                    . "Product Price: $amount\n"
                    . "Quantity: $quantity\n"
                    . "Flavor: $flavor\n"
                    . "Total Price: $price\n"
                    . "Reservation Date: $reservationDate\n"
                    . "Final Date: $finalDate\n\n\n"
                    . "Please reply to the customer if you accept or not the order. Thank You";

                // Send email to owner
                Mail::raw($message, function ($mail) use ($subject) {
                    $mail->to('layeredbyingrid2021@gmail.com')
                        ->subject($subject);
                });

                
    
                // Proceed with further actions and redirect to success page
                return view('success');
            
        } 
        else {
            // Payment was not successful, handle the error scenario
            return redirect('/errorpage')->with('message', 'Payment failed. Please try again.');
        }
    }
        
    

    public function cancel()
    {
        // Add your code to handle the cancellation
        // Add your code here

        return redirect('/cancel')->with('message', 'Payment canceled.');
    }
    private function processPayment($amount)
    {
        // Payment processing logic goes here
        // Return the payment ID if successful, otherwise return false
        $paymongo = new Paymongo(env('PAYMONGO_SECRET_KEY'));

    // Create a payment intent
        $paymentIntent = $paymongo->paymentIntent()->create([
        'amount' => $amount * 100, // Convert amount to cents
        'currency' => 'PHP',
        'description' => 'Payment for your product',
        // Additional parameters as required by PayMongo
        ]);

    // Check if the payment intent was successfully created
        if ($paymentIntent->status === 'succeeded') {
        // Retrieve the payment ID from the payment intent response
        $paymentId = $paymentIntent->id;

        // Perform any additional actions or store payment details as needed
        // ...

        // Return the payment ID
        return $paymentId;
    } else {
        // Handle failed payment scenario
        // Log error, display error message, or take appropriate action
        return false;
    }
    
    }



    private function getFinalDate($reservationDate)
    {
       return $finalDate = Carbon::parse($reservationDate)->addDays(2)->toDateString();
    }

    private function getOrderCount($reservationDate)
    {
        return DB::table('products')
        ->where('reservation_date', $reservationDate)
        ->sum('quantity');
    }  
    private function sendEmailToOwnerOnline($name, $email,$product,$amount,$quantity, $flavor, $price, $reservationDate, $finalDate)
    {
        $subject = 'New Order Received';
        $message = "A new order has been received.\n\n"
            . "Name: $name\n"
            . "Email: $email\n"
            . "Product Name: $product\n"
            . "Product Price: $amount\n"
            . "Quantity: $quantity\n"
            . "Flavor: $flavor\n"
            . "Total Price: $price\n"
            . "Reservation Date: $reservationDate\n"
            . "Final Date: $finalDate\n\n\n"
            . "Please reply to the customer if you accept or not the order. Thank You";
            

        
        // Send email to owner
        Mail::raw($message, function ($mail) use ($subject) {
            
            $mail->to('layeredbyingrid2021@gmail.com')
                ->subject($subject);
            
        });
    }
    private function sendEmailToOwner($name, $email,$product,$amount,$quantity, $flavor, $price, $reservationDate, $finalDate)
    {
        $subject = 'New Order Received';
        $message = "A new order has been received.\n\n"
            . "Name: $name\n"
            . "Email: $email\n"
            . "Product Name: $product\n"
            . "Product Price: $amount\n"
            . "Quantity: $quantity\n"
            . "Flavor: $flavor\n"
            . "Total Price: $price\n"
            . "Reservation Date: $reservationDate\n"
            . "Final Date: $finalDate\n\n\n"
            . "Please reply to the customer if you accept or not the order. Thank You";
            

        
        // Send email to owner
        Mail::raw($message, function ($mail) use ($subject) {
            $mail->to("layeredbyingrid2021@gmail.com")
                ->subject($subject);
        });
    }
    
    private function sendEmailToCustomerCash($email, $reservationDate, $finalDate)
    {
        $subject = 'Order Confirmation';
        $message = "Thank you for the purchase. Your order has been received.\n\n"
            . "Reservation Date: $reservationDate\n"
            . "Final Date: $finalDate";
        
        // Send email to customer
        Mail::raw($message, function ($mail) use ($email, $subject) {
            $mail->to($email)
                ->subject($subject);
        });
    }
    


}
