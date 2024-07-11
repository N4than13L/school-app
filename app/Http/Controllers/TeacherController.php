<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teacher = Teacher::orderBy('id', 'desc')->paginate(10);

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
        $age = $request->input("age");
        $subject_id = $request->input('subject_id');
        $user = Auth::user()->id;

        $teacher->name = $name;
        $teacher->surname = $surname;
        $teacher->rnc = $rnc;
        $teacher->Subject_id = $subject_id;
        $teacher->age = $age;
        $teacher->Users_id = $user;

        $teacher->save();

        return redirect()->route('teachers')->with(['message' => 'Profesor/@ agregad@ satisfactoriamente']);
    }


    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $subject = Subject::orderBy('id', 'desc')->paginate(50);

        return view('teacher.editar', [
            'teacher' => $teacher,
            'subject' => $subject
        ]);
    }

    public function update(Request $request, $id)
    {
        $teacher = new Teacher();

        $name = $request->input('name');
        $surname = $request->input('surname');
        $rnc = $request->input('rnc');
        $age = $request->input("age");
        $subject_id = $request->input('subject_id');

        $teacher->name = $name;
        $teacher->surname = $surname;
        $teacher->rnc = $rnc;
        $teacher->Subject_id = $subject_id;
        $teacher->age = $age;

        DB::table('teachers')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'surname' => $surname,
                'RNC' => $rnc,
                'age' => $age,
                'subject_id' => $subject_id
            ]);

        return redirect()->route('teachers')->with(['message' => 'Profesor/@ atualizad@ satisfactoriamente']);
    }
}
