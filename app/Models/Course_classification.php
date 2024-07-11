<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_classification extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "course_classification";

    protected $fillable = [
        'id',
        'name',
        'Users_id',
    ];
}
