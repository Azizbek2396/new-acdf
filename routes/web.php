<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize']
],
function () {
    Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
       Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    });
});


