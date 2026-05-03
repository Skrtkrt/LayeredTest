<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Exception;
class FacebookController extends Controller
{
    public function facebookpage()
    {
        return Socialite::driver ('facebook')-> redirect ();
    }

    public function facebookredirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            
            // Check if the user already exists in your database
            $existingUser = User::where('email', $user->getEmail())->first();
            
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                // Create a new user record in your database
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    // You may need to adjust this based on your user table structure
                    'password' => bcrypt('password'), // Set a default password
                ]);
                
                Auth::login($newUser);
            }
            
            // Redirect the user to the desired page after successful login
            return redirect('/main');
        } catch (Exception $e) {
            dd($e->getMessage()); // Display the exception message
            // Handle the exception or display an error message
            return back()->with('error', 'Failed to authenticate with Facebook.');
        }
        
          }
}
