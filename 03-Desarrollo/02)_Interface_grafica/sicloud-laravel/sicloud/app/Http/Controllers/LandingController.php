<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function  inicio(){
        return view('welcome');
    }

    public function catalogo(){
        return view('Landing.catalogo');
    }

    public function contacto(){
        return view('Landing.contacto');
    }

    public function mision(){
        return view('Landing.mision');
    }

    public function promosiones(){
        return view('Landing.promosiones');
    }

    public function somos(){
        return view('Landing.somos');
    }



}
