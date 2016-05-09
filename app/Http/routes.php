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
    Route::get('/logout', 'AdminController@logout');
    Route::get('/subMenu', 'AdminController@subMenuPage');
    Route::get('/content', 'AdminController@contentPage');
    Route::get('/settings', 'AdminController@settingPage');
    Route::get('/registration', 'AdminController@registrationPage');

    Route::post('/login', 'UserController@login');
    Route::post('/user/create', 'UserController@create');
    Route::post('/user/update', 'UserController@update');
    Route::post('/user/updateAvatar', 'UserController@updateAvatar');
    Route::post('/menu/create', 'MenuController@create');
    Route::post('/content/create', 'ContentController@create');
    Route::post('/user/passwordReset', 'UserController@updatePassword');
    
});