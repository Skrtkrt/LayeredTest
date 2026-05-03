<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FeedbackController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function (){
    return view ('home.index');
}

);

Route::get('/cupcakes', function () {
    return view ('cupcakes.cupcakes');
}) ;
Route::match(['get', 'post'],'/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::get ('/main',[MainController::class,'main']) -> name=('base.main'); 
Route::match(['get', 'post'], '/pay', [PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/success/{name}/{product}/{amount}/{quantity}/{flavor}/{reservation_date}/{email}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/cancel', function() {
    return view ('cancel');
});
Route::get('/confirmation', function (){
    return view ('confirming') ;
});
Route::get('/cake', function (){
    return view ('Cake.cake');
});
Route::get('/customize', function (){
    return view ('customize');
});
Route::get('/about', function (){
    return view ('about-us');
});
Route::get ('/contact', function (){
    return view ('contact');
});
Route::get ('/errorpage', function(){
    return view ('errorpage');
});
Route::get ('/feedback', function (){
    return view ('feedback');
});
Route::post('/feedbacksend', [FeedbackController::class, 'sendEmail'])->name('submit.send');
Route::post( '/submit-form', [OrderController::class, 'submitForm'])->name('submit-form');
// Auth()

Auth::routes();
Route::get('/app', function (){
    return view ('layouts.app');
});

Route::get('/account', [App\Http\Controllers\AccountController::class, 'showAccount'])->middleware('auth');
Route::post('/account/update',[App\Http\Controllers\AccountController::class, 'update'])->name('account.update');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');


//fb-login:

Route::get('/auth/facebook', [FacebookController::class, 'facebookpage']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'facebookredirect']);
