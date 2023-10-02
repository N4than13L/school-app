<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{

    public function index()
    {
        // sacar los registros de la base de datos.
        $subject = Subject::orderBy('id', 'desc')->paginate(50);

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
}
