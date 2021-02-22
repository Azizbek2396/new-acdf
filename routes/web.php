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

    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');

    Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('site.news');
    Route::get('/news/{name}', [\App\Http\Controllers\NewsController::class, 'show'])->name('site.news.show');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
       Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
       Route::resource('programs', \App\Http\Controllers\Admin\ProgramsController::class);
       Route::resource('/menu', \App\Http\Controllers\Admin\MenuController::class);
       Route::get('/menu/{menu}/create-item', [\App\Http\Controllers\Admin\MenuController::class, 'create_item'])->name('menu.create-item');
       Route::post('/menu/{menu}/create-store', [\App\Http\Controllers\Admin\MenuController::class, 'store_item'])->name('menu.store-item');
       Route::get('/menu/{menu}/create-item/{item}/edit', [\App\Http\Controllers\Admin\MenuController::class, 'edit_item'])->name('menu.edit-item');
       Route::put('/menu/{menu}/create-item/{item}', [\App\Http\Controllers\Admin\MenuController::class, 'update_item'])->name('menu.update-item');
       Route::resource('/textblocks', \App\Http\Controllers\Admin\TextBlocksController::class);
       Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
       Route::resource('/mainbanners', \App\Http\Controllers\Admin\BannersController::class);

    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
