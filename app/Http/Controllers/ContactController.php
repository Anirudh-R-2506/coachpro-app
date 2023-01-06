<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ContactStatus;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Contact;


class ContactController
{

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try{
            Contact::create(
                [
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'status' => ContactStatus::PENDING,
                ]
            );
            Alert::success('Success', 'Message sent successfully.');
            return redirect()->route('frontend.contact');
        }catch(\Exception $e){
            Alert::error('Oops!', 'Could not send message. Please try again later.');
            return redirect()->route('frontend.contact');
        }
    }
    
    
}
