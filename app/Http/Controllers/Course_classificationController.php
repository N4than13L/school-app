<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course_classification;

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
    }
}
