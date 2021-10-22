<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UserEvaluate extends Component
{
    public $movieId;
    public $starsInfo;
    public  $ur = 0;
    public $userIsRated = false;
    public $sumStars = 0;
    public $numberOfVotes = 0;
    public $avgStars=0;
    public function render()
    {

        $this->restval();
        $this->culculatRating();
        return view('livewire.user-evaluate');
    }
    public function getRating()
    {
        return DB::table("stars")
        ->where("movie_id","=",$this->movieId)
        ->get()
        ;
    }
    // stars
    public function modifystars($i)
    {
        if( $this->userIsRated ){
         DB::table("stars")
         ->where("movie_id","=",$this->movieId )
         ->where("user_id","=",auth()->user()->id)
             ->update([
                "number_stars" =>  $this->ur =$i+1,
             ])
             ;
              
        }else{
        DB::table("stars")
            ->insert([
                "movie_id"      => $this->movieId,
                "user_id"       =>auth()->user()->id,
                "number_stars"  =>$this->ur =$i+1,
            ]);  
        }
     $this->ur =$i+1; 
 
    }
public function culculatRating()
{
    $this->starsInfo = $this->getRating();
    // dd( $this->starsInfo->count());
    $this->numberOfVotes =  $this->starsInfo->count();
    foreach ($this->starsInfo as $oneRate) {
        # code...
        $this->sumStars += $oneRate->number_stars;
    }
    // dd( $this->sumStars);
    if($this->numberOfVotes != 0)
    {
        $this->avgStars = intval($this->sumStars /$this->numberOfVotes);

    }

    if($this->starsInfo->where("user_id","=",auth()->user()->id)->toArray() != [])
    {

        $this->ur =  array_values($this->starsInfo->where("user_id","=",auth()->user()->id)
         ->toArray())[0]->number_stars;
         $this->userIsRated = true;

    }
    
}
public function restval()
{
    $this->avgStars = 0;
    $this->sumStars =0;
}
}
