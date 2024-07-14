<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course_classification;
use Illuminate\Support\Facades\Auth;

class Course_classificationController extends Controller
{
    public function index()
    {
        $course_class = Course_classification::all();

        return view('class_course.index', [
            'course_class' => $course_class
        ]);
    }

    public function add()
    {
        return view('class_course.add');
    }

    public function save(Request $request)
    {
        $name = $request->input('name');
        $user = Auth::user()->id;

        $course_class = new Course_classification();
        $course_class->name = $name;
        $course_class->Users_id = $user;

        $course_class->save();

        return redirect()->route('class_courses')->with(['message' => 'clasificacion agregada correctamente']);
    }

    public function edit($id)
    {
        // editar la clasificacion de los cursos.
        $course_class = Course_classification::find($id);

        return view('class_course.edit', [
            'course_class' => $course_class
        ]);
    }


    public function update(Request $request, $id)
    {
        // mandamos al servidor.
        $name = $request->input('name');

        $course_class = new Course_classification();
        $course_class->name = $name;

        DB::table('Course_classification')
            ->where('id', $id)
            ->update(['name' => $name]);

        // var_dump($course_class);
        // die();

        return redirect()->route('class_courses')->with(['message' => 'clasificacion del curso actualizada correctamente']);
    }


    public function delete($id)
    {
        $course_class = Course_classification::find($id);
        $user  = Auth::user()->id;

        if ($user == $course_class->Users_id) {
            $course_class->delete();
        } else {
            return redirect()->route('class_courses')->with(['message' => 'No se pude eliminar debido a que esta en uso']);
        }

        return redirect()->route('class_courses')->with(['message' => 'clasificacion eliminada correctamente']);
    }
}
