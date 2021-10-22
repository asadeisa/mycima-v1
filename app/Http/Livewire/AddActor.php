<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddActor extends Component
{
    public $movieId;
    public $allActor=null;
    public $actorName;
    public $actorReallName;
    public $actorRName = null; 

    public function render()
    {
        $this->allActor = DB::table("actors")
        ->select("actor_R_name","actor_name")
        ->where("movie_id","=",$this->movieId)
        ->get()
        ;
     
        return view('livewire.add-actor');

    }
    // public function mount()
    // {
    

    // }
    protected $rules = [

        'actorName' => 'required|min:3',

        'actorReallName' => 'required|min:3',

    ];

    public function updated($propertyName)

    {

        $this->validateOnly($propertyName);

    }

 

    public function saveContact()

    {

         $this->validate();

            DB::table("actors")
            ->insert([
                "movie_id" =>$this->movieId,
                "actor_R_name" =>$this->actorReallName,
                "actor_name"    =>$this->actorName,
            ]);
            session()->flash('message', 'Actor successfully add.');
            $this->actorReallName = "";
            $this->actorName = "";

        // Contact::create($validatedData);

    }
    // public function deleteActor($actorRName)
    // {
    //     $this->actorRName = $this->actorRName;
    //     dd( $this->actorRName);
    // }
    public function deleteActor($actorRName)
    {
        DB::table("actors")
        ->where( "movie_id", "=",$this->movieId )
        ->where( "actor_R_name","=",$actorRName)
        ->delete();
           
      
       
    }
 
}
