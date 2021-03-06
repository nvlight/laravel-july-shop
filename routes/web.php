<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Guest\GuestController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Guest\CategoryController as GuestCategoryController;
use \App\Http\Controllers\Guest\ProductController  as GuestProductController;
use App\Http\Controllers\Admin\GalleryController;

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
    Route::delete('category_destroy_image/{category}', [AdminCategoryController::class,'destroyImage'])
        ->name('category.destroy-image');
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('product', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('gallery', 'App\Http\Controllers\Admin\GalleryController');
    Route::get('gallery_test_compress_img', [ GalleryController::class, 'test_compress_image'])
        ->name('gallery_test_compress_img');
});

Route::group([
    //'middleware' => 'auth',
    'prefix' => '',
    'as' => 'guest.'
], function (){

    Route::group([
        //'middleware' => 'auth',
        'prefix' => 'category',
        'as' => 'category.'
    ], function (){
        Route::get('/{category}', [GuestCategoryController::class,'show'])->name('show');
    });

    Route::group([
        //'middleware' => 'auth',
        'prefix' => 'product',
        'as' => 'product.'
    ], function (){
        Route::get('/{product}', [GuestProductController::class,'show'])->name('show');
        Route::get('/productImagesAjax/{product}', [GuestProductController::class,'productImagesAjax'])->name('product_images_ajax');
    });
});
