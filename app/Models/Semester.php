<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Student;

class Semester extends Model
{
    use HasFactory;

    protected $table = "semesters";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'period',
        'Subject_id',
        'Student_id',
    ];

    // relacion de muchos a uno.
    public function subject()
    {
        return $this->belongsTo(Subject::class, "Subject_id");
    }

    // relacion de muchos a uno.
    public function student()
    {
        return $this->belongsTo(Student::class, "Student_id");
    }
}
