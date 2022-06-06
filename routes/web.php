<?php

use App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Guest\GuestController;
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
Route::get('/', [GuestController::class,'index']);

Route::group([
    //'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function (){
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('product', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('gallery', 'App\Http\Controllers\Admin\GalleryController');
});
