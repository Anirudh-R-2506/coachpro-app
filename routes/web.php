<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\InstituteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('frontend.')->group(function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/eduhunt', [HomeController::class, 'product'])->name('product');
    Route::get('/signin', [HomeController::class, 'signin'])->name('signin');    

});


Route::name('services.')->group(function () {

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/signin', [LoginController::class, 'login'])->name('login'); 
    Route::post('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    Route::name('password.')->group(function () {

        Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('index');
        Route::get('/password/reset/{token}', [ResetPasswordController::class, 'show_form'])->name('reset.index');
        Route::post('/password/forgot', [ForgotPasswordController::class, 'send_reset_link'])->name('send.reset.link');
        Route::post('/password/reset', [ResetPasswordController::class, 'update'])->name('reset');

    });

    Route::name('verification.')->group(function (){
        
        Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verify');
        //Route::get('/verify/resend', [VerificationController::class, 'resend'])->name('resend');
    
    });
    
});

Route::name('dashboard.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::post('/user/update', [DashboardController::class, 'update'])->name('update');

});

Route::name('institute.')->prefix('/institutes')->group(function (){

    Route::get('/', [HomeController::class, 'institute'])->name('index');
    Route::get('/signin', [HomeController::class, 'inst_signin'])->name('signin'); 

    Route::name('services.')->group(function () {

        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
        Route::post('/signin', [LoginController::class, 'login'])->name('login'); 
        Route::post('/register', [LoginController::class, 'register_inst'])->name('register');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    });

    Route::name('dashboard.')->prefix('/dashboard')->group(function () {

        Route::get('/', [InstituteController::class, 'index'])->name('index');

        Route::name('profile.')->group(function (){
            Route::get('/profile', [InstituteController::class, 'profile'])->name('index');
            Route::post('/profile/update', [InstituteController::class, 'profile_update'])->name('update');
        });

        Route::name('courses.')->group(function (){
            Route::get('/courses', [InstituteController::class, 'courses'])->name('index');
            Route::get('/courses/create', [InstituteController::class, 'create_course'])->name('create');
            Route::post('/courses/store', [InstituteController::class, 'store_course'])->name('store');
            Route::get('/courses/{course}/edit', [InstituteController::class, 'edit_course'])->name('edit');
            Route::post('/courses/{course}/update', [InstituteController::class, 'update_course'])->name('update');
            Route::post('/courses/{course}/delete', [InstituteController::class, 'delete_course'])->name('delete');
        });

        Route::name('faculties.')->group(function(){
            Route::get('/faculties', [InstituteController::class, 'faculties'])->name('index');
            Route::get('/faculties/create', [InstituteController::class, 'create_faculty'])->name('create');
            Route::post('/faculties/store', [InstituteController::class, 'store_faculty'])->name('store');
            Route::get('/faculties/{faculty}/edit', [InstituteController::class, 'edit_faculty'])->name('edit');
            Route::post('/faculties/{faculty}/update', [InstituteController::class, 'update_faculty'])->name('update');
            Route::post('/faculties/{faculty}/delete', [InstituteController::class, 'delete_faculty'])->name('delete');
        });

        Route::name('photos.')->group(function (){
            Route::get('/photos', [InstituteController::class, 'photos'])->name('index');
            Route::post('/photos/store', [InstituteController::class, 'store_photo'])->name('store');
            Route::post('/photos/{photo}/delete', [InstituteController::class, 'delete_photo'])->name('delete');                    
        }); 
        
        Route::name('leads.')->group(function (){
            Route::get('/leads', [InstituteController::class, 'leads'])->name('index');
            Route::get('/leads/{lead}/show', [InstituteController::class, 'show_lead'])->name('show');
            //Route::post('/leads/{lead}/delete', [InstituteController::class, 'delete_lead'])->name('delete');
        });

        Route::name('bookings.')->group(function (){
            Route::get('/bookings', [InstituteController::class, 'bookings'])->name('index');
            Route::get('/bookings/{booking}/show', [InstituteController::class, 'show_booking'])->name('show');
            //Route::post('/bookings/{booking}/delete', [InstituteController::class, 'delete_booking'])->name('delete');
        });

    
    });
});
