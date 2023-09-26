<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tutor_Class extends Controller
{
    //

    public function index()
    {
        return view('tutor_class.index');
    }


    public function save()
    {
        // aqui se guardaran los datos de la clasificacion del padre
    }
}
