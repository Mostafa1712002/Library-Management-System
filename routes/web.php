<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;

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

Route::get("/", [BookController::class, 'index']);
Route::controller(MainController::class)->group(function () {
    Route::get('{lang}',  'toggleLang')->name('toggle-lang');
});





Route::group(['middleware' => 'auth'], function () {
    Route::resource('books', BookController::class);
    Route::delete('media/{id}', [MainController::class, 'destroyMedia'])->name('media.destroy');


    Route::controller(OrderController::class)->group(function () {
        Route::group(['prefix' => 'orders'], function () {
            Route::get('create/{id}', 'create')->name('orders.create');
            Route::get("/all", 'index')->name('orders.index');
            Route::patch('approve/{id}', 'approve')->name('orders.approve');
            Route::patch('reject/{id}', 'reject')->name('orders.reject');
            Route::patch('reserve/{id}', 'reserve')->name('orders.reserve');
            Route::patch('confirm/{id}', 'confirm')->name('orders.confirm');
        });
    });
});
