<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tutor extends Controller
{
    //
    public function index()
    {
        return view('tutor.index');
    }

    public function save()
    {
        // funcion para guardar a los padres.
    }
}
