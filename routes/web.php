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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::controller(MainController::class)->group(function () {
    Route::get('/',  'index')->name('index');
    Route::get('{lang}',  'toggleLang')->name('toggle-lang');
});





Route::group(['middleware' => 'auth'], function () {
    Route::resource('books', \App\Http\Controllers\BookController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class);

    Route::delete('media/{id}', [MainController::class, 'destroyMedia'])->name('media.destroy');
});
