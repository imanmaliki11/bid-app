<?php

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

// Auth section 
Route::get('login', 'auth\AuthController@index')->name('login');
Route::post('login', 'auth\AuthController@login')->name('login.post');
Route::get('register', 'auth\AuthController@register')->name('register');
Route::post('register/action', 'auth\AuthController@save')->name('register.post');
Route::get('validate_email/{code}', 'auth\AuthController@validate_email')->name('email.validation');



//Product section
Route::group(["middleware" => "auth", "prefix" => "product"], function() {
    Route::get("add", "ProductController@add")->name("add.product");
    Route::post("add", "ProductController@store")->name("add.product.post");
});

Route::get('/', 'Controller@index');
Route::get('/artisan', 'Controller@artisan');