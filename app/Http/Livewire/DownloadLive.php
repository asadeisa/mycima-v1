<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DownloadLive extends Component
{
  public $val = null; // the value from blade to filter query
  public $isSeries = null;
  public $allBuys;
  public $attrval = null;
  public $equal = null;
  public $start =0;
  public $end =15;
  
    public function render()
    {
      
      // dd($this->FilterGetDownloads($start=0,$end=15));
        return view('livewire.download-live');
    }
    
    public function mount()
    {
      $this->allBuys =   $this->getdownloads();
      
    }
    public function getdownloads()
    {
        return Buy:: 
        select('buys.movie_id', DB::raw('count(*) as total'))
        ->groupBy('buys.movie_id')
        ->offset($this->start)
        ->limit($this->end)
        ->with("movie")
        ->get(["buys.total","movie.id","movie.movie_name",
               "movie.language","movie.classification",
               "movie.is_series","movie.time_period",
               "movie.type","movie.evaluate","movie.released",
             ]);
    }


    public function FilterGetDownloads()
    {
      return Buy:: 
      select('buys.movie_id', DB::raw('count(*) as total'))
     -> whereHas('movie', function($q){
        $q->where($this->attrval, $this->equal, $this->val);
    })
      ->groupBy('buys.movie_id')
      ->offset($this->start)
      ->limit($this->end)
      ->with("movie")
      ->get(["buys.total","movie.id","movie.movie_name",
             "movie.language","movie.classification",
             "movie.is_series","movie.time_period",
             "movie.type","movie.evaluate","movie.released",
           ]);
    } 

    public function restFilter($v)
    {
      $this->val = $v;
      if($this->val ==0 ||$this->val ==1 ){
        $this->attrval = "is_series";
        $this->equal = "=";
      }

      if($this->val ==6)
      {
        $this->equal = ">";
        $this->attrval = "evaluate";

      }
      if($this->val ==2022)
      {
        $this->equal = "=";
        $this->attrval = "released";

      }
      $this->allBuys =  $this->FilterGetDownloads();
    }

    public function allmovie()
    {
      $this->val = null;
      $this->equal = null;
      $this->attrval = null;
      $this->allBuys =   $this->getdownloads();
    }


    public function showmor($inc)
    {
        if($inc == 1)
        {
            $this->start +=15;
            $this->end +=15;

        }
        elseif($inc == 0)
        {
            $this->start -=15;
            $this->end -=15;
        }
        if($this->attrval ==null)
        {
          $this->allBuys =   $this->getdownloads();
        }
        else{
          $this->allBuys =  $this->FilterGetDownloads();
        }
       
    }
}
