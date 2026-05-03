<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function submitForm(Request $request)
    {
        // Retrieve form data
        $flavors = $request->input('flavors');
        $sizes = $request->input('sizes');
        $dedication = $request->input('dedication');
        $additionalDetails = $request->input('additionalDetails');
        $customerEmail = $request->input('customerEmail');

        // Validate form data
        if (empty($dedication) || empty($additionalDetails) || empty($customerEmail)) {
            return redirect()->back()->withInput()->withErrors('Please fill in all the required fields.');
        }

        // Validate flavors and sizes
        if (empty($flavors) || empty($sizes)) {
            return redirect()->back()->withInput()->withErrors('Please select at least one flavor and one size.');
        }

        // Convert arrays to strings
        $flavorsStr = implode(', ', $flavors);
        $sizesStr = implode(', ', $sizes);

        // Retrieve and process the uploaded file
        $file = null; // Initialize the variable
        // Retrieve and process the uploaded file
        if ($request->hasFile('referencePhoto')) {
            $file = $request->file('referencePhoto');
            // You can handle the file here, such as saving it to a storage location or attaching it to the email
        }

        if ($file !== null && $file->isValid()) {
            // You can handle the file here, such as saving it to a storage location or attaching it to the email
            $filePath = $file->path();

            // Send email to the owner shop
            $ownerEmail = 'layeredbyingrid2021@gmail.com';
            $ownerSubject = 'New order from the website';
            $ownerMessage = "Flavors: $flavorsStr\nSizes: $sizesStr\nDedication: $dedication\nAdditional Details: $additionalDetails";

            Mail::send([], [], function ($message) use ($ownerEmail, $ownerSubject, $file, $ownerMessage) {
                $message->to($ownerEmail)
                    ->subject($ownerSubject)
                    ->setBody($ownerMessage);

                if ($file !== null && $file->isValid()) {
                    $message->attach($file->getRealPath(), [
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType()
                    ]);
                }
            });
        } else {
            return redirect()->back()->withInput()->withErrors('Invalid file upload.');
        }

        // Send email to the customer
        $customerSubject = 'Order confirmation';
        $customerMessage = 'Your order has been sent to the owner shop and is waiting for confirmation. Please wait for the reply.';
        Mail::raw($customerMessage, function ($message) use ($customerEmail, $customerSubject) {
            $message->to($customerEmail)->subject($customerSubject);
        });

        // Redirect to a thank you page
        return redirect('/confirmation');
    }
}
