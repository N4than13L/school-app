<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teacher = Teacher::orderBy('id', 'desc')->paginate(50);

        return view('teacher.index', [
            'teacher' => $teacher
        ]);
    }

    public function add()
    {
        $subject = Subject::orderBy('id', 'desc')->paginate(50);

        return view('teacher.add', [
            'subject' => $subject
        ]);
    }

    public function save(Request $request)
    {
        $teacher = new Teacher();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $rnc = $request->input('rnc');
        $subject_id = $request->input('subject_id');

        $teacher->name = $name;
        $teacher->surname = $surname;
        $teacher->rnc = $rnc;
        $teacher->Subject_id = $subject_id;

        $teacher->save();

        return redirect()->route('teachers')->with(['message' => 'Profesor/@ agregad@ satisfactoriamente']);
    }
}
