<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'RNC',
        'Subject_id',
    ];

    // relacion de muchos a uno.
    public function subject()
    {
        return $this->belongsTo(Subject::class, "Subject_id");
    }
}
