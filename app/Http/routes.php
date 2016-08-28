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

Route::auth();
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('profile', 'HomeController@index');
Route::get('viewprofile', 'HomeController@viewprofile');
Route::get('forum', 'HomeController@viewforum');
Route::get('changepw', 'HomeController@changepw');
Route::get('editprofile', 'HomeController@editprofile');

