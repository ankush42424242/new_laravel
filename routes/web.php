<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\studentController;

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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{  
    Route::get('/students', 'studentController@insert')->name('auth.student');
    Route::post('/studentlist', 'studentController@insertt')->name('auth.studentlist');
    Route::get('/studentlist', 'studentController@studentlist')->name('auth.studentlist');
    Route::get('/studentspdf', 'studentController@createPDF')->name('/');
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
       
    });
    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
         Route::get('/logout', 'LogoutController@perform')->name('logout.perform'); 
         Route::get('/blog', 'BlogController@performm')->name('blog.performm');
         Route::post('/blog', 'BlogController@bregister')->name('blog.perform'); 
         Route::get('/index', 'ProductController@index')->name('products.index'); 
         Route::get('/products', 'ProductController@create')->name('products.create'); 
         Route::post('/store', 'ProductController@store')->name('products.store');
         Route::get('/destroy', 'ProductController@destroy')->name('products.destroy');
         Route::get('/show', 'ProductController@show')->name('products.show');
         Route::get('/edit', 'ProductController@edit')->name('products.edit');
         Route::post('/index', 'ProductController@update')->name('products.update');

    });
});