<?php

use Illuminate\Support\Facades\Route;

// Home routes --------------------------------
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Products routes --------------------------------
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name('product.search');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::get('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

// Admin routes --------------------------------
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
Auth::routes();
