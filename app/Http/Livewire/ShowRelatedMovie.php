<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ShowRelatedMovie extends Component
{
    public $movieId;
    public $moves = null;
    public $userListedMovie =null;
    public $GroupDownloadMovie;
    public $UserListedMovie;
    public $result=[];
    public $towd=[];
    public $finulDataAprior = [];
    public $relatedFilme = null;
    public function render()
    {
        // dd($this->movieId);
        $this->getGroupDownloadMovie();
       $this->UserListedMovie = $this->getUserListedMovie();
        // dd( $this->UserListedMovie);
        return view('livewire.show-related-movie');
    }


    public function getGroupDownloadMovie()
    {
        $this->GroupDownloadMovie = array_values(Cache::remember('movies', 60, function () {
            return DB::table("buys")
            // ->selectRaw('movie_id , user_id')
                      ->join("movies","buys.movie_id","=","movies.id")
                      ->select("movie_name","user_id")
                      ->get()
                      ->groupBy('user_id')
                      ->toarray()
            ;
          }));
          // dd($this->GroupDownloadMovie);
          for($i=1;$i < count( $this->GroupDownloadMovie);$i++)
          {
            // dd($this->result);
            for($j=0;$j<count( $this->GroupDownloadMovie[$i]);$j++){
              array_push($this->towd, $this->GroupDownloadMovie[$i][$j]->movie_name);
            }
            // dd($this->towd);
            array_push($this->result,$this->towd);
            $this->towd = [];
          }
          // dd( $this->getUserListedMovie());
                // dd($this->result);
              $this->moves  = json_encode($this->result);
              $this->userListedMovie=  json_encode( $this->getUserListedMovie());
    }
    public function getUserListedMovie()
    {
      return DB::table("buys")
      ->where('user_id',"=",auth()->user()->id)
      ->orwhere('movie_id',"=",$this->movieId)
      ->join("movies","buys.movie_id","=","movies.id")
      ->select("movie_name")
      ->distinct()
      ->get()
      
      ->toArray()
      ;
      
    }
    // reseved the event data from apriorty event
    protected $listeners = ['aprioriRezalut' => 'fatchAssocutionMove'];

    public function fatchAssocutionMove($finalRezalt)
    {
      // dd($finalRezalt);
      if($finalRezalt !==null)
      {
        foreach($finalRezalt as $REzalt)
        {
          foreach($REzalt as $onele)
          {
            foreach($onele as $ele)
            {
              // dd($ele);
              array_push($this->finulDataAprior,$ele);
            }
          }
        }
      
        if(count($this->finulDataAprior) >0)
        {

          $this->relatedFilme =DB::table("movies")
              ->whereIn("movie_name",$this->finulDataAprior)
              ->select("movie_name","img","id")
              ->get()
              ;
        }
  
      }
      // dd( $this->relatedFilme); 
      }
}
