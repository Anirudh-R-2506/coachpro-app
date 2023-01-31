<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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

    Route::get('/product', [HomeController::class, 'product'])->name('product');

    Route::get('/signin', [HomeController::class, 'signin'])->name('signin');

});

Route::name('services.')->group(function () {

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

});