<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Course_classification;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();

        return view('course.index', [
            'course' => $course
        ]);
    }

    public function add()
    {
        $course = Course::all();
        $course_class = Course_classification::all();

        return view('course.add', [
            "course" => $course,
            "course_class" => $course_class
        ]);
    }


    public function save(Request $request)
    {
        $name = $request->input('name');
        $course_class = $request->input('course_class');
        $user = Auth::user()->id;
        $course = new Course();

        $course->name = $name;
        $course->Course_classification_id = $course_class;
        $course->Users_id = $user;

        $course->save();

        // var_dump($course);
        // die();

        return redirect()->route('course.index')->with(['message' => 'Curso agregado correctamente']);
    }


    public function edit($id)
    {
        $course = Course::find($id);
        $course_class = Course_classification::all();
        return view('course.edit', [
            'course_class' => $course_class,
            'course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $course_class = $request->input('course_class');
        $course = new Course();

        $course->name = $name;
        $course->Course_classification_id = $course_class;

        DB::table('Course')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'Course_classification_id' => $course_class
            ]);

        return redirect()->route('course.index')->with(['message' => 'Curso actualizado correctamente']);
    }


    public function delete($id)
    {
        $course = Course::find($id);
        $user = Auth::user();

        if ($user->id == $course->Users_id) {
            $course->delete();
        } else {
            return redirect()->route('course.index')->with(['message' => 'Curso no se puede eliminar ya que esta ocupado']);
        }
        return redirect()->route('course.index')->with(['message' => 'Curso eliminado correctamente']);
    }
}
