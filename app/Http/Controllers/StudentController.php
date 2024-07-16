<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Tutor;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
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
        $student = Student::orderBy('id', 'desc')->paginate(5);

        return view('students.index', [
            'student' => $student
        ]);
    }


    public function add()
    {
        $tutor = Tutor::orderBy('id', 'desc')->paginate(50);
        $teacher = Teacher::orderBy('id', 'desc')->paginate(50);
        $course = Course::orderBy('id', 'desc')->paginate(50);

        return view('students.add', [
            'tutor' => $tutor,
            'teacher' => $teacher,
            'course' => $course
        ]);
    }

    public function save(Request $request)
    {
        $student = new Student();

        $user = Auth::user();
        $id = $user->id;

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $class_teacher = $request->input('class_teacher');
        $class_tutor = $request->input('class_tutor');
        $course = $request->input('course');

        $student->name = $name;
        $student->surname = $surname;
        $student->age = $age;
        $student->sex = $sex;
        $student->Users_id = $id;
        $student->Teachers_id = $class_teacher;
        $student->Tutors_id = $class_tutor;
        $student->Course_id = $course;

        // var_dump($student);
        // die();

        $student->save();

        return redirect()->route('students')->with(['message' => 'Alumno registrado con exito']);
    }

    public function edit($id)
    {
        // sacar los registros de la base de datos.
        $student = Student::find($id);
        $tutor = Tutor::orderBy('id', 'desc')->paginate(50);
        $teacher = Teacher::orderBy('id', 'desc')->paginate(50);
        $course = Course::orderBy('id', 'desc')->paginate(50);

        return view('students.edit', [
            'student' => $student,
            'tutor' => $tutor,
            'teacher' => $teacher,
            'course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = new Student();

        $user = Auth::user();
        $id_user = $user->id;

        $name = $request->input('name');
        $surname = $request->input('surname');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $class_teacher = $request->input('class_teacher');
        $class_tutor = $request->input('class_tutor');
        $course = $request->input('course');

        $student->name = $name;
        $student->surname = $surname;
        $student->age = $age;
        $student->sex = $sex;
        $student->Users_id = $id;
        $student->Teachers_id = $class_teacher;
        $student->Tutors_id = $class_tutor;
        $student->Course_id = $course;

        // var_dump($student);
        // die();

        DB::table('students')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'surname' => $surname,
                'age' => $age,
                'sex' => $sex,
                'Users_id' => $id_user,
                'Teachers_id' => $class_teacher,
                'Tutors_id' => $class_tutor,
                'Course_id' => $course
            ]);

        return redirect()->route('students')->with(['message' => 'Informacion de alumno actualizada con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $student = Student::find($id);

        $student->delete();

        return redirect()->route('ver')->with(['message' => ' padre/tutor eliminado']);
    }
}
