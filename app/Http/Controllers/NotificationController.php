<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    //
    public function switchOn()
    {
        DB::table("users")->where("id","=",auth()->user()->id)
        ->update([
            "send_not" =>1
        ]);

        return redirect()->route('home');
    }
    public function switchOff()
    {
        DB::table("users")->where("id","=",auth()->user()->id)
        ->update([
            "send_not" =>0
        ]);
        return redirect()->route('home');
    }
}
