<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilemController;
use App\Http\Controllers\downloadsController;
// Route::get("t",function(){
//   return view("admin.dashboard");
// });
// dashboard.addfilem
Route::group(["middleware"=>"auth"],function(){

  Route::group([
  "prefix"=>"dashboard",
  "as"=>"dashboard.",
  "middleware"=>"is_admin"],function(){
    Route::get("",[Controller::class,"index"])->name('dashboard');
  
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