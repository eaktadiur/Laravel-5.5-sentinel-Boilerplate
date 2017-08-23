<?php

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
    return view('welcome');
});

//Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


//Auth::routes();
Route::group(['middleware' => 'visitors'], function () {
    Route::get('/register', 'RegistrationController@register')->name('register');
    Route::get('/login', 'LoginController@login')->name('login');
    Route::get('/password-request', 'ForgetPaawordController@forgetPaaword')->name('password.request');
    Route::get('/password-email', 'ForgetPaawordController@forgetPaaword')->name('password.email');
    Route::get('/activation/{email}/{code}', 'ActivationController@activate')->name('activate');
});

Route::post('/register', 'RegistrationController@postRegister')->name('postRegister');
Route::post('/login', 'LoginController@postLogin')->name('postLogin');
Route::post('/logout', 'LoginController@postlogout')->name('logout');