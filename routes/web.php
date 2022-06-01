<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\GalleryController;

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
Route::get('/', [ProductController::class,'index']);

Route::group([
    //'middleware' => 'auth',
    //'prefix' => 'product',
    //'name' => 'product.'
], function (){
    Route::resource('product',  'App\Http\Controllers\ProductController');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('gallery', 'App\Http\Controllers\GalleryController');
    Route::match( ['get', 'post'] ,'gallery-test', [GalleryController::class,'test'])->name('gallery-test-get');
});
