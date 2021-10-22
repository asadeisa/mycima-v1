<?php

namespace App\Http\Livewire;
use Carbon\Carbon;
use App\Models\Movie;
use Livewire\Component;
use Illuminate\Support\Facades\DB;



class ShowFile extends Component
{  
 
    public $moviePeried;
   public $open=true;
    public $movieId;

    public $movieInfo ;

    public $movieName;

    public $classfication;
    public $evaluet;
    public  $type;
    public $lang;
    public $isSeries; 
    public $released;
    public $description;
    public $hour;
    public $minute;
    public $second;
  

    public function render()
    {   
        $this->movieInfo        = Movie::find($this->movieId);
      

        return view('livewire.show-file');
    }
    // set the property 
    public function setproperty()
    {   $this->open= false;
        $this->moviePeried      = new Carbon($this->movieInfo->time_period);
        $this->hour             = $this->moviePeried->hour;
        $this->minute           = $this->moviePeried->minute;
        $this->second           = $this->moviePeried->second;
        // other value 
        $this->movieName       = $this->movieInfo->movie_name; 
        $this->classfication   = $this->movieInfo->classification; 
        $this->evaluet         = $this->movieInfo->evaluate; 
        $this->type            = $this->movieInfo->type;
        $this->lang            = $this->movieInfo->language;
        $this->isSeries        = $this->movieInfo->is_series;
        $this->released        = $this->movieInfo->released;
        $this->description     = $this->movieInfo->description;
        // $this->img             = $this->movieInfo->img;
    }
    // get is series val
    public function series($val)
    {
        
         DB::table('movies')
         ->where("id","=",$this->movieId)
         ->update(["is_series"=>$val]);
        
    }

    protected $rules = [

        'movieName' => 'required|max:30',
        'hour' => 'required|integer|max:5',
        'minute' => 'required|max:60',
        'second' => 'required|max:60',
        'evaluet' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10',
        'description' => 'required|max:600',
        'released' => 'required|integer|max:2100|min:1980',

    ];
    public function updated($field)

    {

        $this->validateOnly($field,[
            
            'movieName' => 'required|max:30',
            'hour' => 'required|integer|max:5',
            'minute' => 'required|max:60',
            'second' => 'required|max:60',
            'evaluet' => 'required|regex:/^\d+(\.\d{1})?$/|max:10',
            'description' => 'required|max:600',
            'released' => 'required|integer|max:2100|min:1980',
        ]);
        // dd($this->hour);

    }

    public function submit()

    {
       
        $this->validate();
        $this->moviePeried = Carbon::createFromTime($this->hour,$this->minute,$this->second);

        // Execution doesn't reach here if validation fails.

         DB::table('movies')
         ->where("id","=",$this->movieId)
         ->update([    
                        "movie_name"        =>  $this->movieName ,
                        "classification"    =>  $this->classfication,
                        "evaluate"          =>  $this->evaluet ,
                        "type"              =>  $this->type,
                        "language"          =>  $this->lang,
                        "released"          =>  $this->released,
                        "description"       =>  $this->description,
                        "time_period"       =>  $this->moviePeried,
                       
        
                ]);
        

    

    }
 

 



}
