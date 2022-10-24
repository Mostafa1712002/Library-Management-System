<?php

use App\Http\Controllers\Dashboard\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => "auth:web"], function () {

    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'index');
    });

    // Route::resource('testimonials', \App\Http\Controllers\Dashboard\TestimonialController::class);

});
