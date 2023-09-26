<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// agregado de clasificacion padre y padre.
Route::get('/agregar/clasificacion', [Tutor_Class::class, 'index'])->name('agregar_class_tutor');

Route::get('/agregar/padre', [Tutor::class, 'index'])->name('agregar_padre');
