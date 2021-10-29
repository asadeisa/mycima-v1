<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use Livewire\Component;
use App\Models\HelperInfo;
use Illuminate\Support\Facades\DB;

class HomeClustring extends Component
{
    public $is_series;
    public $start=0;
    public $end=12;
    public $allmove;
    public function render()
    {
         $this->allmovie= $this->getAllmovie();

        return view('livewire.home-clustring');
    }

    public function getAllmovie( )
    {
        // if($this->is_series ==null)
        if($this->is_series ==1){
            return  DB::table("movies")
            ->where("is_series","=",1)
            ->offset($this->start)
            ->limit($this->end)
            ->get([ "id", "movie_name","evaluate","img" ])
            ;
        }
        elseif($this->is_series =="0")
        {
            return  DB::table("movies")
            ->where("is_series","=",0)
            ->offset($this->start)
            ->limit($this->end)
            ->get([ "id","movie_name","evaluate","img" ])
            ;
        }
        else
        {

            return  DB::table("movies")
            ->offset($this->start)
            ->limit($this->end)
            ->get(["id","movie_name","evaluate","img" ])
            ;
        }

    }

}
