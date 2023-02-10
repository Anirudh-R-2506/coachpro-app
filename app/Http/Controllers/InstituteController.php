<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Institutes;
use App\Models\User;
use App\Models\City;
use App\Models\Locality;
use Alert;

class InstituteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.institute');
        $this->middleware('verified');
    }

    public function index()
    {
        return view('institute.admin.index');
    }

    public function profile()
    {

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        $city = City::all();
        $locality = Locality::all();

        return view('institute.admin.profile.index', [
            'institute' => $institute,
            'cities' => $city,
            'localities' => $locality,
        ]);
    }
    
    public function profile_update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|integer|exists:cities,id',
            'locality' => 'required|integer|exists:localities,id',
            'address' => 'required|string|max:255'
        ]);

        $inst_id = auth()->user()->institute_id;
        $institute = Institutes::find($inst_id);
        if ($institute == null){
            Alert::error('Oops!', 'Something went wrong :(');
            return redirect()->back()->withInput();
        }
        $institute->name = $request->name;
        $institute->email = $request->email;
        $institute->phone = $request->phone;
        $institute->city_id = $request->city;
        $institute->locality_id = $request->locality;
        $institute->address = $request->address;
        $institute->save();

        Alert::success('Success!', 'Profile updated successfully :D');
        return redirect()->route('institute.dashboard.profile.index');
    }
}
