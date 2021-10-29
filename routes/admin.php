<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\downloadsController;

Route::group(["middleware"=>"auth"],function(){

 
  Route::get("dashboard",[LoginController::class,"adminDachboard"])
  ->name('dashboard');

  Route::group([
  "prefix"=>"dashboard",
  "as"=>"dashboard.",
  "middleware"=>"checkAdmin"],function(){
  
    // Route::get("movie",[FilemController::class,"index"])->name("filem");
    // Route::resource('movie',[FilemController::class]);
    Route::resource('filem', FilemController::class);
    Route::post("updata-image",[FileUplodController::class,"updataImage"]);
    Route::get("downloads",[downloadsController::class,"index"])
    ->name("downloads");

    Route::get("actor",[downloadsController::class,"showActor"])
    ->name("actor");
    Route::get("users",[downloadsController::class,"showUser"])
    ->name("users");
    Route::get("rating",[downloadsController::class,"showRating"])
    ->name("rating");
  
  });
});