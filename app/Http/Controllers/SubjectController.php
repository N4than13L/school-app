<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function index()
    {
        // sacar los registros de la base de datos.
        $subject = Subject::orderBy('id', 'desc')->paginate(50);

        return view('subject.index', [
            'subject' => $subject
        ]);
    }
}
