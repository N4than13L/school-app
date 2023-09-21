<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Student;

Route::get('/', function () {

    $students = Student::all();
    foreach ($students as $student) {
        echo "Estudiante: " . $student->name . ' ' . $student->surname . ', edad: ' . $student->age;
        echo "<br/>";
        echo "usuario: " . $student->Users->name . ' ' . $student->Users->surname;

        echo "<br/>";
        echo "Maestro: " . $student->Teachers->name;
        echo "Tutor: " . $student->Tutors->name;
        echo   "<hr/>";
    }
    die();

    return view('welcome');
});
