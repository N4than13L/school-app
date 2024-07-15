<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course_classification;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "Course";

    protected $fillable = [
        'id',
        'name',
        'Users_id',
        'Course_classification_id'
    ];

    // relacion de muchos a uno.
    public function course_class()
    {
        return $this->belongsTo(Course_classification::class, "Course_classification_id");
    }
}
