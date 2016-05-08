<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.login');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', 'AdminController@homePage');
    Route::get('/menu', 'AdminController@menuPage');
    Route::get('/subMenu', 'AdminController@subMenuPage');
    Route::get('/content', 'AdminController@contentPage');
    Route::get('/registration', 'AdminController@registrationPage');
    Route::get('/setting', 'AdminController@settingPage');
    Route::get('/logout', 'AdminController@logout');
    
});