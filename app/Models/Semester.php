<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Course;

class Semester extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "semesters";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'period',
        'Subject_id',
        'Users_id',
        'Course_id'
    ];

    // relacion de muchos a uno.
    public function subject()
    {
        return $this->belongsTo(Subject::class, "Subject_id");
    }

    // relacion de muchos a uno.
    public function courses()
    {
        return $this->belongsTo(Course::class, "Course_id");
    }

    // relacion de muchos a uno.
    public function students()
    {
        return $this->belongsTo(Student::class, "Students_id");
    }
}
