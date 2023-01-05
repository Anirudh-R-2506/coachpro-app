<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
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

        Contact::create(
            $request->only('full_name', 'email', 'phone', 'subject', 'message')
        );

        return redirect()->route('frontend.contact')->with('success', 'Message sent successfully.');
    }
    

    
    
}
