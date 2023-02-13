<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::name('institute.')->domain('institute.eduhunt.co' . env('APP_URL'))->group(function (){

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

        Route::name('user.')->group(function (){
            Route::get('/user', [InstituteController::class, 'user'])->name('index');
            Route::post('/user/update', [InstituteController::class, 'user_update'])->name('update');
        });

        Route::name('profile.')->group(function (){
            Route::get('/profile', [InstituteController::class, 'profile'])->name('index');
            Route::post('/profile/update', [InstituteController::class, 'profile_update'])->name('update');
        });

        /* Route::name('courses.')->group(function (){
            Route::get('/courses', [InstituteController::class, 'courses'])->name('index');
            Route::get('/courses/create', [InstituteController::class, 'create_course'])->name('create');
            Route::post('/courses/store', [InstituteController::class, 'store_course'])->name('store');
            Route::get('/courses/{course}/edit', [InstituteController::class, 'edit_course'])->name('edit');
            Route::post('/courses/{course}/update', [InstituteController::class, 'update_course'])->name('update');
            Route::post('/courses/{course}/delete', [InstituteController::class, 'delete_course'])->name('delete');
        }); */

        Route::name('faculties.')->group(function(){
            Route::get('/faculties', [InstituteController::class, 'faculties'])->name('index');
            Route::post('/faculties/store', [InstituteController::class, 'store_faculty'])->name('store');
            Route::get('/faculties/{faculty}/edit', [InstituteController::class, 'edit_faculty'])->name('edit');
            Route::post('/faculties/{faculty}/update', [InstituteController::class, 'update_faculty'])->name('update');
            Route::delete('/faculties/{faculty}/delete', [InstituteController::class, 'delete_faculty'])->name('delete');
        });

        Route::name('photos.')->group(function (){
            Route::get('/photos', [ImageController::class, 'index'])->name('index');
            Route::post('/photos/store', [ImageController::class, 'store'])->name('store');
            Route::delete('/photos/{photo}/delete', [ImageController::class, 'destroy'])->name('delete');
            Route::post('/photos/upload', [ImageController::class, 'upload'])->name('upload');
        }); 
        
        /* Route::name('leads.')->group(function (){
            Route::get('/leads', [InstituteController::class, 'leads'])->name('index');
            Route::get('/leads/{lead}/show', [InstituteController::class, 'show_lead'])->name('show');
        });

        Route::name('bookings.')->group(function (){
            Route::get('/bookings', [InstituteController::class, 'bookings'])->name('index');
            Route::get('/bookings/{booking}/show', [InstituteController::class, 'show_booking'])->name('show');
        }); */

    
    });
});


Route::name('frontend.')->group(function () {
    
    Route::get('/', [HomeController::class, 'coming_soon'])->name('index');
    /* Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/eduhunt', [HomeController::class, 'product'])->name('product'); */
    Route::get('/signin', [HomeController::class, 'signin'])->name('signin');    

});


Route::name('services.')->group(function () {

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/signin', [LoginController::class, 'login'])->name('login'); 
    Route::post('/register', [LoginController::class, 'register_cs'])->name('register-cs');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    Route::name('password.')->group(function () {

        Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('index');
        Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'show_form'])->name('reset');
        Route::post('/password/forgot', [ForgotPasswordController::class, 'send_reset_link'])->name('send.reset.link');
        Route::post('/password/reset', [ForgotPasswordController::class, 'update'])->name('update');

    });

    Route::name('verification.')->group(function (){
        
        Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verify');
        Route::get('/resend/verify', [VerificationController::class, 'resend'])->name('resend');
    
    });
    
});

/* Route::name('dashboard.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::post('/user/update', [DashboardController::class, 'update'])->name('update');

}); */