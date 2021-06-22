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

Route::get('/', function () {
    return view('welcome');
});

Route::get("user/login","UsersController@login");

Route::name('users')->group(function(){
    Route::post("/","UsersController@create");
    Route::get("/load","UsersController@load");
    Route::get("/load/{id}","UsersController@load");
    Route::post("/update","UsersController@update");
});

Route::name('business')->group(function(){
    Route::post("/","BusinessesController@create");
    Route::get("/load","BusinessesController@load");
    Route::get("/load/{id}","BusinessesController@load");
    Route::post("/update","BusinessesController@update");
});

Route::name('events')->group(function(){
    Route::post("/","EventsController@create");
    Route::get("/load","EventsController@load");
    Route::get("/load/{id}","EventsController@load");
    Route::post("/update","EventsController@update");
});

Route::name('reservation')->group(function(){
    Route::post("/","ReservationController@create");
    Route::get("/load","ReservationController@load");
    Route::get("/load/{id}","ReservationController@load");
    Route::post("/update","ReservationController@update");
});
