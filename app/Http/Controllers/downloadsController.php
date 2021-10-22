<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class downloadsController extends Controller
{
    //
    public function index()
    {
       return view("admin.download");
    }
    public function showActor()
    {
        return view("admin.actor");
    }
    
    public function showUser()
    {
        return view("admin.user");
    }
    public function showRating()
    {
        return view("admin.rating");
    }

}
