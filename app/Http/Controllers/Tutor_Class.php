<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor_class as TutorClass;

class Tutor_Class extends Controller
{
    //

    public function index()
    {
        // sacar los registros de la base de datos.
        $tutorClass = TutorClass::orderBy('id', 'desc')->paginate(5);

        return view('tutor_class.index', [
            'tutorClass' => $tutorClass
        ]);
    }

    public function agregar_class()
    {
        return view('tutor_class.agregar');
    }


    public function save()
    {
        // aqui se guardaran los datos de la clasificacion del padre
    }
}
