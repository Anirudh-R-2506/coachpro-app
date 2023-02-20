<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Locality;
use App\Models\User;
use App\Jobs\SendAccountVerificationMail;
use Alert;

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
        return view('app.index');
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

        $localitites = Locality::all();        

        return view('institute.pages.signin', ['localities' => $localitites]);
    }
    
    public function institute()
    {
        return view('institute.pages.index');
    }
}
