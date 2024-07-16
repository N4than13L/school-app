<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $course = Course::orderBy('id', 'desc')->paginate(50);

        return view('semester.add', [
            'student' => $student,
            'subject' => $subject,
            'course' => $course
        ]);
    }

    // subir al servidor 
    public function save(Request $request)
    {
        $semester = new Semester();

        $period = $request->input('period');
        $subject = $request->input('subject');
        $course =  $request->input('course');
        $user = Auth::user()->id;

        $semester->period = $period;
        $semester->Subject_id = $subject;
        $semester->Course_id = $course;
        $semester->Users_id = $user;

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
        $course = Course::orderBy('id', 'desc')->paginate(50);

        return view('semester.editar', [
            'semester' => $semester,
            'student' => $student,
            'subject' => $subject,
            'course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $semester = new Semester();

        $period = $request->input('period');
        $subject = $request->input('subject');
        $course =  $request->input('course');

        $semester->period = $period;
        $semester->Subject_id = $subject;
        $semester->Course_id = $course;

        // var_dump($semester);
        // die();

        DB::table('Semesters')
            ->where('id', $id)
            ->update([
                'period' => $period,
                'Subject_id' => $subject,
                'Course_id' => $course,
            ]);


        return redirect()->route('period')->with(['message' => 'semestre actualizado con exito']);
    }
}
