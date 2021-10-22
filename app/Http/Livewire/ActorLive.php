<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Buy;
use App\Models\Actor;
use Illuminate\Support\Facades\DB;

class ActorLive extends Component
{
    public $val = null; // the value from blade to filter query
    public $isSeries = null;
    public $allactor;
    public $attrval = null;
    public $start = 0;
    public $end = 15;
    public $equal= null;
    public function render()
    {
        return view('livewire.actor-live');
    }
     
    public function mount()
    {
      $this->allactor =   $this->getActors();
    
    }
    public function getActors()
    {
        return Actor::offset($this->start)
        ->limit($this->end)
        ->with("movie")
        ->get();
             
    }


    public function FiltergetActors()
    {
      return Actor:: 
     whereHas('movie', function($q){
        $q->where($this->attrval, $this->equal, $this->val);
    })
      ->offset($this->start)
      ->limit($this->end)
      ->with("movie")
      ->get();
    } 

    public function restFilter($v)
    {
      $this->val = $v;
      if( $this->val ==0 || $this->val ==1 ){
        $this->attrval = "is_series";
        $this->equal = "=";
      }

      if( $this->val ==6)
      {
        $this->equal = ">";
        $this->attrval = "evaluate";

      }
      if( $this->val==2022)
      {
        $this->equal = "=";
        $this->attrval = "released";

      }
      $this->allactor =  $this->FiltergetActors();
    }

    public function allmovie()
    {
      $this->val = null;
      $this->equal = null;
      $this->attrval = null;
      $this->allactor =   $this->getActors();
    }

    public function deleteActor($id)
    {
        DB::table("actors")
        ->where( "id", "=",$id )
        ->delete();
        session()->flash('message', 'Actor successfully deleted.');
        $this->dispatchBrowserEvent('delete-actor', ['id' => $id]);
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
          $this->allactor =   $this->getActors();
        }
        else{
          $this->allactor =  $this->FiltergetActors();
        }
       
    }

}
