<?php

namespace App\Http\Livewire;

use App\Models\Buy;
use Livewire\Component;
use App\Models\HelperInfo;

class RecommendedKMovie extends Component
{
    public $userIdData = [];
    public $relativeMovie =null;

    public function render()
    {
        return view('livewire.recommended-k-movie');
    }
    protected $listeners = ['clusterRezalt' => 'getRezalt'];
    public function getRezalt($finalRezalt)
    {
        // dd($finalRezalt);
        $helperdata = json_decode($finalRezalt[0]) ;
        // dd($helperdata);
        for($i=0;$i<count($helperdata);$i++ )
        {
            $this->userIdData[$i] = HelperInfo::
            where([

                "age" => $helperdata[$i][0],
                "avg_movie_time" => $helperdata[$i][1],
                "f_lang" => $helperdata[$i][2],
                "f_type" => $helperdata[$i][3],
                "have_family" => $helperdata[$i][4],
                "old" => $helperdata[$i][5],
                "sex" => $helperdata[$i][6],
            ])
            ->select("user_id")->first()->user_id
          ;
       

        }
        // dd($this->userIdData);
        $this->relativeMovie = Buy::whereIn("user_id",$this->userIdData)
        ->select('movie_id')
        ->with("movie")
        ->get();
        // dd( $this->relativeMovie);
    }
}
