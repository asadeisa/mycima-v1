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
      
        return Controller::gotoview();
        
    }
    public function adminDachboard()
    {
        return view("admin.dashboard");
    }
}
