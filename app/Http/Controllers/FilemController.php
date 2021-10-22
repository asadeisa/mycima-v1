<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movie;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FilemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public $time_movie = null;
   public $allmovie = null;
//    get all 15 movie from database
   public function getMovie($start=0,$end=15){
    return DB::table('movies')
    ->offset($start)
    ->limit($end)
    ->get();
   }
    public function index()
    {
        //
        $allmovie = $this->getMovie();
        // dd($this->allmovie);
       
        return view("admin.movie",compact(["allmovie"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $time_movie = Carbon::createFromTime($request->h,$request->m,$request->s);
        // dd($time_movie->hour);
        if($request->languages =="languages" ||$request->type=="Type"||$request->classification=="classification"){

            return Redirect::back()->withErrors(['msg' => 
            'all filed is requer'])->withInput();
        }
        $pathImag = $request->session()->get('folder',null) .'/'.$request->session()->get('filename', null);
        $request->session()->forget('folder');
         $request->session()->forget('filename');
        //  $request->session()->flush();
         if($pathImag == "/"){
            return Redirect::back()->withErrors(['msg' => 
            'the image must be jpeg,png,jpg,gif or svg'])->withInput(); 
         }
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
      
        $newFilme = new Movie;
        $newFilme->movie_name = $request->name; 
        $newFilme->language  = $request->languages; 
        $newFilme->classification = $request->classification; 
        $newFilme->is_series = $request->filme; 
        $newFilme->type = $request->type; 
        $newFilme->evaluate  = $request->stars; 
        $newFilme->released = $request->yearRel; 
        $newFilme->time_period = $time_movie; 
        $newFilme->description = $request->description; 
        $newFilme->img =  $pathImag; 
        $newFilme->save();
        event(new NewMessage($newFilme));

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->getId($id);
        $filemid  = $id;
        // $filmeInfo = $this->getoneFilme($id);
        // dd($filmeInfo);
        return view("admin.mangefilem",compact(["filemid"]));
       
    }
    public function getId($id=null)
    {
        return $id;
    } 




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("movies")
        ->where("id","=",$id)
        ->delete()
        ;
        return $this->index();
        

    }

}
