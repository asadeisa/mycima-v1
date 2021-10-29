<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


public function gotoview($is_series=null)
{
    # code...
    if(auth()->user() !=null)
    {

        $AllHelperInfo = $this->getHelperInfo();
        $HelperInfo =  $AllHelperInfo->filter(function ($value, $key) 
        {
            return $value->user_id != auth()->user()->id;
        })->toJson();
       
        $userDataHelper =json_encode( array_values( $AllHelperInfo->filter(function ($value, $key) 
        {
            return $value->user_id == auth()->user()->id;
        })->toArray()));

        return view("home",compact(["is_series","userDataHelper","HelperInfo"]));
    }else{
        $allmovie = $this->getAllmovie();
        return view("welcome",compact("allmovie"));


    }
  

}
// get helper information for clustring k-meannes
public function getHelperInfo()
{
    return DB::table("helper_infos")
    ->get([ 'user_id',"sex", "f_type",
            "have_family", "avg_movie_time",
            "f_lang","age","old",])
    ;
}


public function getAllmovie($start=0,$end=12)
{

        return  DB::table("movies")
        ->offset($start)
        ->limit($end)
        ->get(["id","movie_name","evaluate","img" ])
        ;
}

public function getmovie($is_series)
{
    
    return $this->gotoview($is_series);
}

public function setHelperInfo(Request $request)
{
    DB::table("helper_infos")
    ->insert([
        "user_id"=>auth()->user()->id,
        "age" =>$request->age,
        "sex" => $request->sex,
        "f_type" => $request->type,
        "have_family" => $request->have_family,
        "avg_movie_time" => $request->avg_movie_time,
        "f_lang" => $request->languages,
        "old" => $request->old,
    ]);
    DB::table("users")->where("id","=",auth()->user()->id)
    ->update(["helper_info" =>1]);
    return $this->gotoview();
}




}
