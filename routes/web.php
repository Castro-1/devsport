<?php

use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

// Home routes --------------------------------
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Products routes --------------------------------
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

// Cart routes --------------------------------
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
});
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');

// Admin routes -------------------------------
Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');

    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');

    Route::get('/admin/exercises', 'App\Http\Controllers\Admin\AdminExerciseController@index')->name('admin.exercise.index');
    Route::post('/admin/exercises/store', 'App\Http\Controllers\Admin\AdminExerciseController@store')->name('admin.exercise.store');
    Route::delete('/admin/exercises/{id}/delete', 'App\Http\Controllers\Admin\AdminExerciseController@delete')->name('admin.exercise.delete');
    Route::get('/admin/exercises/{id}/edit', 'App\Http\Controllers\Admin\AdminExerciseController@edit')->name('admin.exercise.edit');
    Route::put('/admin/exercises/{id}/update', 'App\Http\Controllers\Admin\AdminExerciseController@update')->name('admin.exercise.update');
});

// User routes -------------------------------
Route::get('/trainingcontext', 'App\Http\Controllers\TrainingcontextController@index')->name('trainingcontext.index');
Route::get('/trainingcontext/create', 'App\Http\Controllers\TrainingcontextController@create')->name('trainingcontext.create');
Route::post('/trainingcontext/save', 'App\Http\Controllers\TrainingcontextController@save')->name('trainingcontext.save');
Route::get('/trainingcontext/{trainingcontext}', 'App\Http\Controllers\TrainingcontextController@show')->name('trainingcontext.show');
Route::get('/routines/{trainingcontext_id}', 'App\Http\Controllers\RoutineController@index')->name('routines.index');
Route::get('/exercise', 'App\Http\Controllers\ExerciseController@index')->name('exercise.index');
Route::get('/exercise/{id}', 'App\Http\Controllers\ExerciseController@show')->name('exercise.show');
Route::put('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');

Auth::routes();
