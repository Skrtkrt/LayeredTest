<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)

    {
        $product=$request->input('product');
        $amount=$request->input('amount');
        return view('/checkout');
    }
    public function index(Request $request)
{
    $product = $request->query('product');
    // Use the $product variable as needed in your controller logic
    // Pass the $product variable to the view when returning the response
    return view('checkout', ['product' => $product]);
}
}
