<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "teachers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'surname',
        'RNC',
        'age',
        'Subject_id',
        'Users_id',
    ];

    // relacion de muchos a uno.
    public function subject()
    {
        return $this->belongsTo(Subject::class, "Subject_id");
    }

    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, "Users_id");
    }
}
