<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
