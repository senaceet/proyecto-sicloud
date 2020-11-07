<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    // administrador
    public function iniAdmin(){
        return view('Admin.iniAdmin');
    }

    public function  controlUsuarios(){
        return view('Admin.controlUsuarios');
    }
}
