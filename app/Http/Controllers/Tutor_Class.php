<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor_class as TutorClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tutor_Class extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // sacar los registros de la base de datos.
        $tutorClass = TutorClass::orderBy('id', 'desc')->paginate(10);

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

    public function edit($id)
    {
        $tutorClass = TutorClass::find($id);

        return view('tutor_class.editar', [
            'tutorClass' => $tutorClass
        ]);
    }

    public function update(Request $request, $id)
    {
        $tutorClass = new TutorClass();
        $name = $request->input('name');
        $tutorClass->name = $name;

        DB::table('tutor_class')
            ->where('id', $id)
            ->update(['name' => $name]);

        // $tutorClass->update();

        return redirect()->route('agregar_class_tutor')->with(['message' => 'Datos actualizados con exito']);
    }


    public function delete($id)
    {
        // $user = Auth::user();
        $tutores = TutorClass::find($id);

        $tutores->delete();
        return redirect()->route('ver')->with(['message' => ' clasificacion de tutor eliminada']);
    }
}
