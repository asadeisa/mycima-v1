<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserAdmin extends Component
{
    public $start = 0;
    public $end = 15;
    public $AllUser;
    public function render()
    {
        // dd( $this->AllUser);
        return view('livewire.user-admin');
    }
    public function mount()
    {
      return  $this->AllUser  =$this->getAllUser(); 
     
    }
    public function getAlluser()
    {

        return User::offset($this->start)
         ->limit($this->end)
         ->select(["id","name","email"])
         ->with("star",function($q){
             $q->join("movies","stars.movie_id","=","movies.id")
             ->select(["stars.*","movies.movie_name"]);
         })
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
        return  $this->AllUser  =$this->getAllUser(); 
    }
}
