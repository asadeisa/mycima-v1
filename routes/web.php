<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileUplodController;
use App\Http\Controllers\showFilmeController;
use App\Http\Controllers\NotificationController;



Route::get("/",[Controller::class,"gotoview"]);
Route::get('register', function () {
    return view('auth.register');
})->name("register");

Route::get("home",[Controller::class,"gotoview"])
->name("home");


Route::group(["middleware"=>"auth"],function(){

    Route::post("home",[controller::class,"setHelperInfo"])
    ->name("helper-info");
    
    Route::get("show-filme{id}",[showFilmeController::class,"show"])
    ->name("show-filme");
    Route::get("show-notifictation/{id}",[showFilmeController::class,"show"]);
   

    Route::get("home",[LoginController::class,"index"])
    ->name("home")->middleware('is_admin');
    Route::get("home/movie{is_seres}",[Controller::class,"getmovie"])
    ->name("home/movie");
    Route::get("home/series{is_seres}",[Controller::class,"getmovie"])
    ->name("home/series");
    Route::post("upload",[FileUplodController::class,"store"]);
   
    Route::get("download{id}",[showFilmeController::class,"download"])
    ->name("download");
    // Route for notification 
    
     Route::get("set-noti-true",[NotificationController::class,"switchOn"])
     ->name("set-noti-true");
     Route::get("set-noti-false",[NotificationController::class,"switchOff"])
     ->name("set-noti-false");

   
});
