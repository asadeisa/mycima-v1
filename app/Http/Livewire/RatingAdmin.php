<?php

namespace App\Http\Livewire;

use App\Models\Stars;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RatingAdmin extends Component
{
    public $start = 0;
    public $end = 15;
    public $allRatingMoive = null;
    // public $start = 0;
    public function render()
    {
        return view('livewire.rating-admin');
    }
    public function mount()
    {
        $this->allRatingMoive = $this->getRatingMovie();
        // dd($this->allRatingMoive);

    }
    public function getRatingMovie()
    {
        # code...
        return Stars::offset($this->start)
        ->limit($this->end)
        ->select(["movie_id",DB::raw('sum(number_stars) as stars'),DB::raw('count(*) as total')])
        ->groupBy("movie_id")
        ->with("movie")
        ->get();
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
        return $this->allRatingMoive = $this->getRatingMovie();
    }

}
