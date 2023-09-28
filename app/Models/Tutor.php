<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutor_class;

class Tutor extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tutors";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'age',
        'Tutor_Class_id',
    ];

    // relacion de muchos a uno.
    public function tutor_class()
    {
        return $this->belongsTo(Tutor_class::class, "Tutor_Class_id");
    }
}
