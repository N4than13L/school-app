<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor as Tutores;
use App\Models\Tutor_class as TutorClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tutor extends Controller
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
        $tutor = Tutores::orderBy('id', 'desc')->paginate(10);

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
        $user = Auth::user()->id;

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');
        $class = $request->input('class_tutor');

        $tutor_insert->name = $name;
        $tutor_insert->surname = $surname;
        $tutor_insert->age = $age;
        $tutor_insert->Tutor_Class_id = $class;
        $tutor_insert->Users_id = $user;

        // var_dump($tutor_insert);
        // die();

        $tutor_insert->save();

        return redirect()->route('ver')->with(['message' => ' padre/tutor agregada con exito']);
    }

    public function edit($id)
    {
        // sacar los registros de la base de datos.
        $tutor = Tutores::find($id);
        $tutorClass = TutorClass::orderBy('id', 'desc')->paginate(50);

        return view('tutor.editar', [
            'tutor' => $tutor,
            'tutorClass' => $tutorClass
        ]);
    }

    public function update(Request $request, $id)
    {
        $tutor_insert = new Tutores();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');

        $class = $request->input('class_tutor');

        $tutor_insert->name = $name;
        $tutor_insert->surname = $surname;
        $tutor_insert->age = $age;
        $tutor_insert->Tutor_Class_id = $class;

        // var_dump($tutor_insert);
        // die();

        DB::table('tutors')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'surname' => $surname,
                'age' => $age,
                'Tutor_Class_id' => $class
            ]);

        return redirect()->route('ver')->with(['message' => ' padre/tutor actualizado con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $tutores = Tutores::find($id);

        $tutores->delete();
        return redirect()->route('ver')->with(['message' => ' padre/tutor eliminado']);
    }
}
