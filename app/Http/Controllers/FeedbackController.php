<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function sendEmail (Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $messagetxt =$request->input('messagetxt');
        $subject = 'Feedback';
        
        $message = "You received a feedback from customer.\n\n"
            . "Name: $name\n"
            . "Email: $email\n"
            . "Message: $messagetxt";
            
        // Send email to owner
        Mail::raw($message, function ($mail) use ($subject) {
            $mail->to('layeredbyingrid2021@gmail.com')
                ->subject($subject);
        });
        return redirect ('/main');
    }
}
