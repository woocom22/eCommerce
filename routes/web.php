<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Brand\Index;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Brandcontroller;
use App\Http\Controllers\BrandShowcontroller;
use App\Models\product;

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
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');
Route::get('/dashboard', 'App\Http\Controllers\admincontroller@dashboard')->name('dashboard');

Auth::routes();



Route::group(['middleware' => 'auth', 'admin'], function(){
    Route::get('/dashboard/category', 'App\Http\Controllers\CategoryController@category')->name('category.category');
    Route::get('/dashboard/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::post('/dashboard/category/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('/dashboard/category/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');
    Route::get('/dashboard/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::post('/dashboard/category/update', 'App\Http\Controllers\CategoryController@update')->name('category.update');

    // For Brand
    Route::get('/dashboard/brand', 'App\Http\Controllers\BrandShowcontroller@index')->name('brand.index');

});

Route::group(['middleware' => 'auth', 'admin'], function(){

    // for product

    Route::get('/dashboard/product', 'App\Http\Controllers\Admin\productController@index')->name('product.index');
    Route::get('/dashboard/product/create', 'App\Http\Controllers\Admin\productController@create')->name('product.create');
    Route::post('/dashboard/product/store', 'App\Http\Controllers\Admin\productController@store')->name('product.store');
    Route::get('/dashboard/product/{product}/edit', 'App\Http\Controllers\Admin\productController@edit')->name('product.edit');
    Route::put('/dashboard/product/{product}', 'App\Http\Controllers\Admin\productController@update')->name('product.update');
    Route::get('/dashboard/product/{product_id}/delete', 'App\Http\Controllers\Admin\productController@productDelete')->name('product.productDelete');
    Route::get('/dashboard/product-image/{product_image_id}/delete', 'App\Http\Controllers\Admin\productController@destroyImage')->name('product.destroyImage');

    // For color controller
    Route::get('/dashboard/color', 'App\Http\Controllers\Admin\colorController@index')->name('color.index');
    Route::get('/dashboard/color/create', 'App\Http\Controllers\Admin\colorController@create')->name('color.create');
    Route::post('/dashboard/color', 'App\Http\Controllers\Admin\colorController@store')->name('color.store');
    Route::get('/dashboard/color/{color}/edit', 'App\Http\Controllers\Admin\colorController@edit')->name('color.edit');
    Route::put('/dashboard/color/{color_id}', 'App\Http\Controllers\Admin\colorController@update')->name('color.update');
    Route::get('/dashboard/color/{color_id}/delete', 'App\Http\Controllers\Admin\colorController@destroy')->name('color.destroy');

    // Route::post('/product-color/{pro_color_id}', 'App\Http\Controllers\Admin\colorController@ProductColorQty');

    // for slider
    Route::get('/dashboard/slider', 'App\Http\Controllers\Admin\SliderController@index')->name('slider.index');
    Route::get('/dashboard/slider/create', 'App\Http\Controllers\Admin\SliderController@create')->name('slider.create');
    Route::post('/dashboard/slider/store', 'App\Http\Controllers\Admin\SliderController@store')->name('slider.store');


});
