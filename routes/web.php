<?php

use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SavedforlaterController;
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
    Route::post("/reschedule/{id}",[EventsController::class,'reschedule']);
    Route::post("/notifications",[EventsController::class,'sendFollowersNotifications']);
});

Route::group(['prefix'=>'reservation'],function(){
    Route::post("/",[ReservationController::class,'create']);
    Route::get("/load",[ReservationController::class,'load']);
    Route::get("/load/{id}",[ReservationController::class,'load']);
    Route::post("/update/{id}",[ReservationController::class,'update']);
});

Route::group(['prefix'=>'follow'],function(){
    Route::post("/",[FollowsController::class,'create']);
    Route::post("/unfollow/{id}",[FollowsController::class,'unfollow']);
    Route::get("/load",[FollowsController::class,'load']);
    Route::get("/load/{id}",[FollowsController::class,'load']);
    Route::post("/update/{id}",[FollowsController::class,'update']);
});
Route::group(['prefix'=>'review'],function(){
    Route::post("/",[ReviewsController::class,'create']);
    Route::get("/load",[ReviewsController::class,'load']);
    Route::get("/load/{id}",[ReviewsController::class,'load']);
    Route::post("/update/{id}",[ReviewsController::class,'update']);
});
Route::group(['prefix'=>'saveforlater'],function(){
    Route::post("/",[SavedforlaterController::class,'create']);
    Route::get("/load",[SavedforlaterController::class,'load']);
    Route::get("/load/{id}",[SavedforlaterController::class,'load']);
    Route::post("/update/{id}",[SavedforlaterController::class,'update']);
    Route::post("/remove/{id}",[SavedforlaterController::class,'remove']);
});

Route::group(['prefix'=>'reset'],function(){
    Route::post("/request",[ResetPasswordController::class,'create']);
    Route::post("/verify",[ResetPasswordController::class,'verifyCode']);
    Route::post("/password/{id}",[ResetPasswordController::class,'resetPassword']);
  });
Route::get('reset/request',[ResetPasswordController::class,'create']);
Route::get('reset/verify',[ResetPasswordController::class,'verifyCode']);
Route::get('reset/password',[ResetPasswordController::class,'resetPassword']);
Route::get('testmail',[UsersController::class,'testMail']);
Route::post('upload/images',[EventsController::class,'upload']);
Route::get('user/profile',[UsersController::class,'profile']);
