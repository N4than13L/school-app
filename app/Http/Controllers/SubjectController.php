<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
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
        $subject = Subject::orderBy('id', 'desc')->paginate(10);

        return view('subject.index', [
            'subject' => $subject
        ]);
    }

    public function add()
    {
        return view('subject.add');
    }

    public function save(Request $request)
    {

        $subject = new Subject();

        $name = $request->input('name');
        $subject->name = $name;


        // var_dump($name);
        // die();

        $subject->save();

        return redirect()->route('subjects')->with(['message' => 'asignatura agregada con exito']);
    }

    // editar.
    // cargar el formulario.
    public function editar($id)
    {
        $subject = Subject::find($id);

        return view('subject.editar', [
            'subject' => $subject
        ]);
    }

    // enviar al servidor.
    public function update(Request $request, $id)
    {
        $subject = new Subject();
        $name = $request->input('name');
        $subject->name = $name;

        DB::table('subjects')
            ->where('id', $id)
            ->update(['name' => $name]);

        // $tutorClass->update();

        return redirect()->route('subjects')->with(['message' => 'Datos asignatura actualizada con exito']);
    }

    public function delete($id)
    {
        // $user = Auth::user();
        $tutores = Subject::find($id);

        $tutores->delete();
        return redirect()->route('ver')->with(['message' => 'asignatura eliminada']);
    }
}
