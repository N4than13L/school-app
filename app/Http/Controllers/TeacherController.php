<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('teacher.add');
    }

    public function save(Request $request)
    {
        $teacher = new Teacher();

        $name = $request->input('name');
    }
}
