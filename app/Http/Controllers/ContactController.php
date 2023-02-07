<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ContactStatus;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Contact;
use App\Helpers\DiscordHelper;
use App\Rules\ReCaptchaRule;


class ContactController
{

    public function store(Request $request)
    {
        $request->validate([
            //'recaptcha_token' => env('APP_ENV') == 'local' ? '' : ['required', new ReCaptchaRule($request->recaptcha_token)],
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try{
            $contact = Contact::create(
                [
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'status' => ContactStatus::PENDING,
                ]
            );
            DiscordHelper::newContact($contact); 
            Alert::success('Success', 'Message sent successfully.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Oops!', 'Could not send message. Please try again later.');
            return redirect()->back();
        }
    }
    
    
}
