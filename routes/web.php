<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//auth
Route::get('/','App\Http\Controllers\AuthController@index')->name('loginview');
Route::post('login','App\Http\Controllers\AuthController@store')->name('login');
Route::post('logout','App\Http\Controllers\AuthController@destroy')->name('logout');
Route::get('dashboard','App\Http\Controllers\AuthController@dashboard')->name('dashboard');


//category
Route::get('category','App\Http\Controllers\CategoryController@index')->name('category');
Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('category/store','App\Http\Controllers\CategoryController@store')->name('category.store');
Route::get('/category/{id}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
Route::get('/category/{id}/destroy', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');
Route::put('/category/{id}/update', 'App\Http\Controllers\CategoryController@update')->name('category.update');
Route::match(['get', 'put'], '/user/{id}/status', 'App\Http\Controllers\CategoryController@status')->name('category.status');


//product
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product');
Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('product/store','App\Http\Controllers\ProductController@store')->name('product.store');
Route::get('/product/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
Route::delete('/delete-product/{id}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy');
Route::put('/product/{id}/update', 'App\Http\Controllers\ProductController@update')->name('product.update');
Route::put('/update-price/{id}', 'App\Http\Controllers\ProductController@updateprice')->name('product.updateprice');



