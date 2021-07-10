<?php

use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UsersController;
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

Route::post("user/login",[UsersController::class,'login']);
//Route::get('users/load',[UsersController::class,'load']);
Route::group(['prefix'=>'users'],function(){
    Route::post("/",[UsersController::class,'create']);
    Route::post("/admin",[UsersController::class,'defaultUser']);
    Route::get("/load",[UsersController::class,'load']);
    Route::get("/load/{id}",[UsersController::class,'load']);
    Route::post("/update/{id}",[UsersController::class,'update']);
});

Route::group(['prefix'=>'business'],function(){
    Route::post("/",[BusinessesController::class,'create']);
    Route::get("/load",[BusinessesController::class,'load']);
    Route::get("/load/{id}",[BusinessesController::class,'load']);
    Route::post("/update/{id}",[BusinessesController::class,'update']);
});

Route::group(['prefix'=>'events'],function(){
    Route::post("/",[EventsController::class,'create']);
    Route::get("/load",[EventsController::class,'load']);
    Route::get("/active",[EventsController::class,'active']);
    Route::get("/bystatus/{status}",[EventsController::class,'byStatus']);
    Route::post("/status/{id}",[EventsController::class,'changeStatus']);
    Route::get("/load/{id}",[EventsController::class,'load']);
    Route::post("/update/{id}",[EventsController::class,'update']);
});

Route::group(['prefix'=>'reservation'],function(){
    Route::post("/",[ReservationController::class,'create']);
    Route::get("/load",[ReservationController::class,'load']);
    Route::get("/load/{id}",[ReservationController::class,'load']);
    Route::post("/update/{id}",[ReservationController::class,'update']);
});
Route::post('upload/images',[EventsController::class,'upload']);
