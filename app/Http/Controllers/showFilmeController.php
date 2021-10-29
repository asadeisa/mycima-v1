<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class showFilmeController extends Controller
{
    //
public function goView($movieDitaels)
{
    # code...

    return view("movie",compact("movieDitaels"));
}

public function show($id)
{
    # code...

    $movieDitaels = $this->getmovie($id);
    return $this->goView($movieDitaels);

}

public function getmovie($id)
{
    # code...
    return Movie:: where("id","=",$id)
    ->with("actor")
    ->first()
    ;
}

public function download($id)
{
   
    DB::table("buys")
    ->insert([
        "user_id" => auth()->user()->id,
        "movie_id" => $id,

    ]);
    return $this->show($id);

}



}
