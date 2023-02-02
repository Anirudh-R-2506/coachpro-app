<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\Education;
use App\Enums\Session;
use App\Enums\Timing;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'string|max:255|unique:users',
            'education' => 'required|in:' . implode(',', Education::getValues()),
            'class' => 'required|integer',
            'year_of_passing' => 'required|integer',
            'session' => 'required|in:' . implode(',', Session::getValues()),
            'timing' => 'required|in:' . implode(',', Timing::getValues()),
            'city' => 'string',
            'locality' => 'string',            
        ]);

        $user = User::find(auth()->user()->id);        

        if (!$user){
            $response = [
                'status' => 'error',
                'message' => 'User not updated',
            ];

            return response()->json($response, 500);
        }

        $user->fill($request->all())->save();

        $response = [
            'status' => 'success',
            'message' => 'User updated successfully',
        ];

        return response()->json($response, 200);

    }
}
