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
/*
Route::get('/', function () {
    return view('welcome');
});*/





Auth::routes();
Route::get('/', 'HomeController@login');
Route::get('/home', 'HomeController@index');
Route::put('/users/update_user/{id}', 'UserController@update')->middleware('auth');
Route::get('/users/modifier_email/{id}', 'UserController@editEmail')->middleware('auth');
Route::put('/users/update_email/{id}', 'UserController@updateEmail')->middleware('auth');
Route::get('/users/modifier_pwd/{id}', 'UserController@editpwd')->middleware('auth');
Route::put('/users/update_pwd/{id}', 'UserController@updatepwd')->middleware('auth');
Route::get('/users/supprimer_user/{id}', 'UserController@destroy')->middleware('auth');
