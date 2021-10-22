<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        
        if(Auth::user()->is_admin)
        {
            // url()->full() =url('dashboard');
            // $url = url('dashboard');
            return view("admin.dashboard");
        }
        else{
            $allmovie =  Controller::showmovie()->allmovie;
           return Controller::gotoview( $allmovie);
         
        }
    }
}
