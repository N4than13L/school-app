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


// ver listado de clasificacion de padre/tutor 
Route::get('/agregar/clasificacion', [Tutor_Class::class, 'index'])->name('agregar_class_tutor');

// form para agregar 
Route::get('/agregar', [Tutor_Class::class, 'agregar_class'])->name('agregar');

// para enviar al servidor 
Route::post('/save', [Tutor_Class::class, 'save'])->name('save');

// formulario para actualizar datos de la clasificacion 
Route::get('/tutorclass/edit/{id}', [Tutor_Class::class, 'edit'])->name('tutorclass.edit');

// enviar al servidor.
Route::post('/tutorclass/update/{id}', [Tutor_Class::class, 'update'])->name('tutorclass.update');

// agregar padre/tutor
Route::get('/ver/padre', [Tutor::class, 'index'])->name('ver');

// cargar vista.
Route::get('/agregar/padre', [Tutor::class, 'agregar_tutor'])->name('agregar_padre');

// envio al servidor
Route::post('/save/dad', [Tutor::class, 'save'])->name('guardar.padre');

// cargar vista de las asignaturas.
Route::get("/subjects", [SubjectController::class, 'index'])->name('subjects');

// vista del formulario.
Route::get("/add/subjects", [SubjectController::class, 'add'])->name('add.subject');

// subir al servidor
Route::post("/save/subjects", [SubjectController::class, 'save'])->name('save.subject');

// vista de ver maestros.
Route::get("/teachers", [TeacherController::class, 'index'])->name('teachers');

// formulario.
Route::get("/add/teachers", [TeacherController::class, 'add'])->name('add.teachers');

// enviar al servidor.
Route::post("/save/teachers", [TeacherController::class, 'save'])->name('save.teachers');

// vista de ver listado de alumnos.
Route::get("/students", [StudentController::class, 'index'])->name('students');

// formulario 
Route::get("/add/students", [StudentController::class, 'add'])->name('add.students');

// subir al servidor
Route::post("/save/students", [StudentController::class, 'save'])->name('save.students');

// semestres 
Route::get("/period", [SemesterController::class, 'index'])->name('period');

// agregar semestres
Route::get("/add/period", [SemesterController::class, 'add'])->name('add.period');

// enviar el servidor
Route::post("/save/period", [SemesterController::class, 'save'])->name('save.period');
