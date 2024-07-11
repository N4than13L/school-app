<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Course;


class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "students";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'surname',
        'age',
        'sex',
        'Users_id',
        'Teachers_id',
        'Tutors_id',
        'Course_id'
    ];

    // relacion de muchos a uno.
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, "Teachers_id");
    }

    // relacion de muchos a uno.
    public function tutors()
    {
        return $this->belongsTo(Tutor::class, "Tutors_id");
    }

    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, "Users_id");
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, "Course_id");
    }
}
