<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class ImageUplod extends Component
{
    use WithFileUploads;
    public $pathImg;
    public $photo;
    public $img;
    public $movieId;
    public function render()
    {
        $this->img = DB::table("movies")
        ->select("img")
        ->where("id","=",$this->movieId)
        ->first()
        ->img
        ;
        // dd($this->img);
   
        $this->pathImg = strstr( $this->img, '/', true);
        

        return view('livewire.image-uplod');
    }
    public function updatedPhoto()

    {

        $this->validate([

            'photo' => 'image|max:1024',

        ]);

    }
    
    public function save()

    {

        // ...
       
       
        $this->validate([

            'photo' => 'image|max:1024', // 1MB Max

        ]);
        // $image_path = $this->img;  // Value is not URL but directory file path
        
        // dd($this->pathImg);
        Storage::deleteDirectory($this->pathImg);
        $file = $this->photo;
        $filename = $file->getClientOriginalName();
        $folder = uniqid().'-'.now()->timestamp;
        $this->pathImag = $folder .'/'.$filename;
        // dd($this->pathImag);
        $file->storeAs("public/avatars/".$folder,$filename);
        DB::table('movies')
        ->where("id","=",$this->movieId)
        ->update([  
            "img" =>$this->pathImag,
         ]);
         session()->flash('message', 'image successfully updated.');

 

    }
}
