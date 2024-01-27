<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', 'App\Http\Controllers\UserController@index');

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');

Route::post('/users', 'App\Http\Controllers\UserController@store');

Route::put('/users/{id}', 'App\Http\Controllers\UserController@update');

Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');
