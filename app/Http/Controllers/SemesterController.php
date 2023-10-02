<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    // vista principal
    public function index()
    {
        return view('semester.index');
    }

    // ver formulario
    public function add()
    {
        return view('semester.add');
    }

    // subir al servidor 
    public function save(Request $request)
    {
    }
}
