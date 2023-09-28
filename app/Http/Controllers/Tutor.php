<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor as Tutores;
use App\Models\Tutor_class as TutorClass;

class Tutor extends Controller
{
    //
    public function index()
    {
        // sacar los registros de la base de datos.
        $tutor = Tutores::orderBy('id', 'desc')->paginate(50);

        return view('tutor.index', [
            'tutor' => $tutor
        ]);
    }


    public function agregar_tutor()
    {
        $tutorClass = TutorClass::orderBy('id', 'desc')->paginate(50);

        return view('tutor.agregar', [
            'tutorClass' => $tutorClass
        ]);
    }


    public function save(Request $request)
    {


        $tutor_insert = new Tutores();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');

        $class = $request->input('class_tutor');

        echo $name . ' ';
        echo $surname . ' ';
        echo $age . ' ';
        echo $class . ' ';
        die();

        // $tutor_insert->name = $name;


        // $tutor_class_insert->save();


        // return redirect()->route('agregar_class_tutor')->with(['message' => 'Clasificacion de padre/tutor agregada con exito']);
    }
}
