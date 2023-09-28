<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor_class as TutorClass;
use Illuminate\Support\Facades\Auth;

class Tutor_Class extends Controller
{
    //

    public function index()
    {
        // sacar los registros de la base de datos.
        $tutorClass = TutorClass::orderBy('id', 'desc')->paginate(50);

        return view('tutor_class.index', [
            'tutorClass' => $tutorClass
        ]);
    }

    public function agregar_class()
    {
        return view('tutor_class.agregar');
    }


    public function save(Request $request)
    {
        $tutor_class_insert = new TutorClass();

        $name = $request->input('name');
        $tutor_class_insert->id = null;

        $tutor_class_insert->name = $name;

        $tutor_class_insert->save();


        return redirect()->route('agregar_class_tutor')->with(['message' => 'Clasificacion de padre/tutor agregada con exito']);
    }
}
