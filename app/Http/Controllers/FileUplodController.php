<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUplodController extends Controller
{
    //
    public $filename = null;
    public $file = null;
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
       
            $file = $request->file("avatar");
            $filename = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $file->storeAs("public/avatars/".$folder,$filename);
            $request->session()->put('folder', $folder);
            $request->session()->put('filename', $filename);
            return $folder;

    }
    
    // updata the img
    public function updataImage(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
       
            $file = $request->file("avatar");
            $filename = $file->getClientOriginalName();
            $folder = uniqid().'-'.now()->timestamp;
            $file->storeAs("public/avatars/".$folder,$filename);
            $pathImag = $folder .'/'.$filename;
            dd($pathImag);
            DB::table('movies')
            ->where("id","=",$this->movieId)
            ->update([   ]);

    }
}
