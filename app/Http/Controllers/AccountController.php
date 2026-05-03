<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function showAccount()
    {
        $user = auth()->user();
        $editing = false; // Add this line to define the $editing variable
        return view('account', compact('user', 'editing'));
    }

    public function update(Request $request)
    {
        
        $user = auth()->user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'contact_number' => ['nullable', 'string'],
            'age' => ['nullable', 'integer'],
            'gender' => ['required', 'string'],
            // Your other validation rules
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_number = $request->input('contact_number');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');

        // Update other user fields

        if ($request->hasFile('profile_image')) {
            // Delete the old profile image if it exists
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

        // Store the new profile image
            
        
            $imageFile = $request->file('profile_image');
            $imagePath = $imageFile->store('profile_images','public');
            $user->profile_image = $imagePath;
        
        
        }
        $user->save();
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('message', 'Profile updated successfully.');
    }
}
