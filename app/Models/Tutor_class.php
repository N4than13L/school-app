<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tutor_class extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tutor_class";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'Users_id',
    ];

    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, "Users_id");
    }
}
