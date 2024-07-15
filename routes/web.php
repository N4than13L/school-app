<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Tutor_Class;
use App\Http\Controllers\Tutor;
use App\Http\Controllers\Course_classificationController;
use App\Http\Controllers\CourseController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/configuracion', [UserController::class, 'config'])->name('settings');
Route::post('/usuario/actualizar', [UserController::class, 'update'])->name('user.update');

// ver listado de clasificacion de curso clasificacion
Route::get('/class_courses/index', [Course_classificationController::class, 'index'])->name('class_courses');

Route::get('/class_courses/add', [Course_classificationController::class, 'add'])->name('class_courses.add');

Route::post('/class_courses/save', [Course_classificationController::class, 'save'])->name('class_courses.save');


Route::get('/class_courses/edit/{id}', [Course_classificationController::class, 'edit'])->name('class_courses.edit');

Route::post('/class_courses/update/{id}', [Course_classificationController::class, 'update'])->name('class_courses.update');

Route::get('/class_courses/delete/{id}', [Course_classificationController::class, 'delete'])->name('class_courses.delete');

// subir datos de los cursos como tal.
Route::get('/course/index', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/add', [CourseController::class, 'add'])->name('course.add');
Route::post('/course/save', [CourseController::class, 'save'])->name('course.save');
Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
Route::post('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
Route::get('/course/delete/{id}', [CourseController::class, 'delete'])->name('course.delete');


// ver listado de clasificacion de padre/tutor 
Route::get('/agregar/clasificacion', [Tutor_Class::class, 'index'])->name('agregar_class_tutor');

// form para agregar 
Route::get('/agregar', [Tutor_Class::class, 'agregar_class'])->name('agregar');

// para enviar al servidor 
Route::post('/save', [Tutor_Class::class, 'save'])->name('save');

// formulario para actualizar datos de la clasificacion de padre 
Route::get('/tutorclass/edit/{id}', [Tutor_Class::class, 'edit'])->name('tutorclass.edit');

Route::get('/tutorclass/delete/{id}', [Tutor_Class::class, 'delete'])->name('tutorclass.delete');

// enviar al servidor.
Route::post('/tutorclass/update/{id}', [Tutor_Class::class, 'update'])->name('tutorclass.update');

// agregar padre/tutor
Route::get('/ver/padre', [Tutor::class, 'index'])->name('ver');

// cargar vista.
Route::get('/agregar/padre', [Tutor::class, 'agregar_tutor'])->name('agregar_padre');

// envio al servidor
Route::post('/save/dad', [Tutor::class, 'save'])->name('guardar.padre');

// actualizar datos de los padres.
Route::get('/edit/dad/{id}', [Tutor::class, 'edit'])->name('edit.padre');

// subir a db.
Route::post('/update/dad/{id}', [Tutor::class, 'update'])->name('update.padre');

// eliminar tutor.
Route::get('/delete/dad/{id}', [Tutor::class, 'delete'])->name('delete.padre');

// cargar vista de las asignaturas.
Route::get("/subjects", [SubjectController::class, 'index'])->name('subjects');

// vista del formulario.
Route::get("/add/subjects", [SubjectController::class, 'add'])->name('add.subject');

// subir al servidor
Route::post("/save/subjects", [SubjectController::class, 'save'])->name('save.subject');

// materia vista del formulario
Route::get("/edit/subjects/{id}", [SubjectController::class, 'editar'])->name('edit.subject');

Route::get("/delete/subjects/{id}", [SubjectController::class, 'delete'])->name('delete.subject');

// enviar al servidor.
Route::post("/update/subjects/{id}", [SubjectController::class, 'update'])->name('update.subject');


// vista de ver maestros.
Route::get("/teachers", [TeacherController::class, 'index'])->name('teachers');

// vista para actuaklizar maestros.
Route::get("/edit/teachers/{id}", [TeacherController::class, 'edit'])->name('teachers.edit');

// guardar en db.
Route::post("/upodate/teachers/{id}", [TeacherController::class, 'update'])->name('teachers.update');

// formulario.
Route::get("/add/teachers", [TeacherController::class, 'add'])->name('add.teachers');

// enviar al servidor.
Route::post("/save/teachers", [TeacherController::class, 'save'])->name('save.teachers');

// vista de ver listado de alumnos.
Route::get("/students", [StudentController::class, 'index'])->name('students');

// editar estudiantes.
Route::get("/edit/students/{id}", [StudentController::class, 'edit'])->name('edit.students');

Route::post("/update/students/{id}", [StudentController::class, 'update'])->name('update.students');

// formulario 
Route::get("/add/students", [StudentController::class, 'add'])->name('add.students');

// subir al servidor
Route::post("/save/students", [StudentController::class, 'save'])->name('save.students');

Route::get("/save/students/{id}", [StudentController::class, 'delete'])->name('delete.students');


// semestres 
Route::get("/period", [SemesterController::class, 'index'])->name('period');

// agregar semestres
Route::get("/add/period", [SemesterController::class, 'add'])->name('add.period');

// sacar el semestre
Route::get("/edit/period/{id}", [SemesterController::class, 'edit'])->name('edit.period');

// hacer el envio por post. 
Route::post("/update/period/{id}", [SemesterController::class, 'update'])->name('update.period');

// enviar el servidor
Route::post("/save/period", [SemesterController::class, 'save'])->name('save.period');
