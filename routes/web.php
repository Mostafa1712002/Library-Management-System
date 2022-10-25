<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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


Route::controller(MainController::class)->group(function () {
    Route::get('/',  'index')->name('index');
    Route::get('{lang}',  'toggleLang')->name('toggle-lang');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function () {
    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    Route::resource('books', \App\Http\Controllers\BookController::class);
});
