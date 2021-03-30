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

    Route::get('/programs', [\App\Http\Controllers\ProgramsController::class, 'index'])->name('site.programs');
    Route::get('/programs/{id}', [\App\Http\Controllers\ProgramsController::class, 'show'])->name('site.programs.show');
    Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('site.news');
    Route::get('/news/{name}', [\App\Http\Controllers\NewsController::class, 'show'])->name('site.news.show');
    Route::get('/pages/{name}', [\App\Http\Controllers\PagesController::class, 'show'])->name('site.pages.show');
    Route::get('/photos', [\App\Http\Controllers\PhotosController::class, 'index'])->name('site.photos');
    Route::get('/photos/{id}', [\App\Http\Controllers\PhotosController::class, 'show'])->name('site.photos.show');
    Route::get('/videos', [\App\Http\Controllers\VideosController::class, 'index'])->name('site.videos');
    Route::get('/videos/{video}', [\App\Http\Controllers\VideosController::class, 'show'])->name('site.videos.show');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
       Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
       Route::resource('/programs', \App\Http\Controllers\Admin\ProgramsController::class);
       Route::resource('/pages', \App\Http\Controllers\Admin\PagesController::class);
       Route::resource('/menu', \App\Http\Controllers\Admin\MenuController::class);
       Route::get('/menu/{menu}/create-item', [\App\Http\Controllers\Admin\MenuController::class, 'create_item'])->name('menu.create-item');
       Route::post('/menu/{menu}/create-store', [\App\Http\Controllers\Admin\MenuController::class, 'store_item'])->name('menu.store-item');
       Route::get('/menu/{menu}/create-item/{item}/edit', [\App\Http\Controllers\Admin\MenuController::class, 'edit_item'])->name('menu.edit-item');
       Route::put('/menu/{menu}/create-item/{item}', [\App\Http\Controllers\Admin\MenuController::class, 'update_item'])->name('menu.update-item');
       Route::resource('/textblocks', \App\Http\Controllers\Admin\TextBlocksController::class);
       Route::resource('/videos', \App\Http\Controllers\Admin\VideosController::class);
       Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
       Route::resource('/mainbanners', \App\Http\Controllers\Admin\BannersController::class);
       Route::resource('/albums', \App\Http\Controllers\Admin\AlbumsController::class);
       Route::get('/image/create/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('image.create');
       Route::post('/image/store', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('image.store');
       Route::put('/image/update/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'update'])->name('image.update');
       Route::post('/image/destroy/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('image.destroy');
       Route::post('/image/move/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'move'])->name('image.move');

    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
