<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admincontroller;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::group(['middleware' => 'auth', 'admin'], function(){
    Route::get('/dashboard/category', 'App\Http\Controllers\CategoryController@category')->name('category.category');
    Route::get('/dashboard/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::post('/dashboard/category/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('/dashboard/category/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');
    Route::get('/dashboard/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::post('/dashboard/category/update', 'App\Http\Controllers\CategoryController@update')->name('category.update');

});
