<?php

use Illuminate\Support\Facades\Route;

// Home routes --------------------------------
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Products routes --------------------------------
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name('product.search');
// Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
// Route::get('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

// Cart routes --------------------------------
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');

// Admin routes --------------------------------
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
Auth::routes();
