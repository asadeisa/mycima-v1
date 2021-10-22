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

public function index(){
    
    return view("admin.dashboard");
}

public function gotoview($allmovie)
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

        return view("home",compact(["allmovie","userDataHelper","HelperInfo"]));
    }else{
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

public function showmovie()
{
    # code...
   $allmovie = $this->getAllmovie();

   return $this->gotoview($allmovie);
}

public function getAllmovie( $is_series=null,$start=0,$end=12)
{
    if($is_series ==1){
        return  DB::table("movies")
        ->where("is_series","=",1)
        ->offset($start)
        ->limit($end)
        ->get([ "id", "movie_name","evaluate","img" ])
        ;
    }
    elseif($is_series =="0")
    {
        return  DB::table("movies")
        ->where("is_series","=",0)
        ->offset($start)
        ->limit($end)
        ->get([ "id","movie_name","evaluate","img" ])
        ;
    }
    else
    {

        return  DB::table("movies")
        ->offset($start)
        ->limit($end)
        ->get(["id","movie_name","evaluate","img" ])
        ;
    }

}

public function getmovie($is_series)
{
    $allmovie  =  $this->getAllmovie($is_series,0,10);
    return $this->gotoview($allmovie);
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
$request->session()->put('helperinfo', "success");

return $this->showmovie();
// dd($request->input());
}




}
