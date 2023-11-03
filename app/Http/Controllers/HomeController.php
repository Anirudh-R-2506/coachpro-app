<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\City;
use App\Models\User;
use App\Models\Courses;
use App\Models\Locality;
use Google\Service\Classroom\Course;
use App\Jobs\SendAccountVerificationMail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $localitites = Locality::all();

        return view('pages.index', ['localities' => $localitites]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function coming_soon()
    {
        return view('pages.coming-soon');
    }

    public function product()
    {
        $courses = Courses::all();
        return view('app.index', [
            'courses' => $courses,
        ]);
    }

    public function signin()
    {

        if (auth()->check()){
            Alert::success('Hey!', 'You are already logged in :D');
            return redirect()->route(auth()->user()->role == '1' ? 'institute.index' : 'frontend.index');
        }

        $localitites = Locality::all();        

        return view('pages.signin', ['localities' => $localitites]);
    }

    public function inst_signin()
    {

        if (auth()->check()){
            Alert::success('Hey!', 'You are already logged in :D');
            return redirect()->route(auth()->user()->role == '1' ? 'institute.index' : 'frontend.index');
        }

        $cities = City::all()->sortBy('name')->pluck('name', 'id')->toArray();
        $localities = Locality::all()->sortBy('name');
        $l = [];
        foreach($localities as $loc){
            $l[$loc->city_id][] = $loc;
        }

        return view('institute.pages.signin', ['localities' => $l, 'cities' => $cities]);
    }
    
    public function institute()
    {
        return view('institute.pages.index');
    }
}
