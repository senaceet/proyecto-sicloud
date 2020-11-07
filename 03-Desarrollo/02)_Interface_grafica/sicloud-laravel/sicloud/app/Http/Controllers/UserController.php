<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // administrador
    public function iniAdmin(){
        return view('User.iniAdmin');
    }


}
