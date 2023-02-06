<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

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
    
    Route::get('/', [HomeController::class, 'coming_soon'])->name('coming_soon');
    /* Route::get('/institute', [HomeController::class, 'institute'])->name('institute');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/eduhunt', [HomeController::class, 'product'])->name('product');
    Route::get('/signin', [HomeController::class, 'signin'])->name('signin');    
    Route::get('/institute', [HomeController::class, 'institute'])->name('institute'); */

});


Route::name('services.')->group(function () {

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/register', [LoginController::class, 'register_cs'])->name('register-cs');
    /* Route::post('/signin', [LoginController::class, 'login'])->name('login'); 
    Route::post('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    Route::name('password.')->group(function () {

        Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('index');
        Route::get('/password/reset/{token}', [ResetPasswordController::class, 'show_form'])->name('reset.index');
        Route::post('/password/forgot', [ForgotPasswordController::class, 'send_reset_link'])->name('send.reset.link');
        Route::post('/password/reset', [ResetPasswordController::class, 'update'])->name('reset');

    }); */

});

Route::name('dashboard.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::post('/user/update', [UserController::class, 'update'])->name('update');

})->middleware(['auth']);