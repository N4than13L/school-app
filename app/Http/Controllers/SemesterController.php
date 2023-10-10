<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;

class SemesterController extends Controller
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

    // vista principal
    public function index()
    {
        $semester = Semester::orderBy('id', 'desc')->paginate(10);

        return view('semester.index', [
            'semester' => $semester
        ]);
    }

    // ver formulario
    public function add()
    {

        $student = Student::orderBy('id', 'desc')->paginate(50);
        $subject = Subject::orderBy('id', 'desc')->paginate(50);

        return view('semester.add', [
            'student' => $student,
            'subject' => $subject
        ]);
    }

    // subir al servidor 
    public function save(Request $request)
    {
        $semester = new Semester();

        $period = $request->input('period');
        $student = $request->input('students');
        $subject = $request->input('subject');

        $semester->period = $period;
        $semester->Subject_id = $subject;
        $semester->Students_id = $student;

        // var_dump($semester);
        // die();

        $semester->save();

        return redirect()->route('period')->with(['message' => 'semestre agregado con exito']);
    }

    public function edit($id)
    {
        $semester = Semester::find($id);
        $student = Student::orderBy('id', 'desc')->paginate(50);
        $subject = Subject::orderBy('id', 'desc')->paginate(50);

        return view('semester.editar', [
            'semester' => $semester,
            'student' => $student,
            'subject' => $subject
        ]);
    }

    public function update(Request $request, $id)
    {
        $semester = new Semester();

        $period = $request->input('period');
        $student = $request->input('students');
        $subject = $request->input('subject');

        $semester->period = $period;
        $semester->Subject_id = $subject;
        $semester->Students_id = $student;

        return redirect()->route('period')->with(['message' => 'semestre actualizado con exito']);
    }
}
