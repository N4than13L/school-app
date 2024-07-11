<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Course_classificationController extends Controller
{
    public function index()
    {
        return view('class_course.index');
    }

    public function add()
    {
    }
}
