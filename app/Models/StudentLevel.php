<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'first_mentor_id',
        'second_mentor_id',
        'admin',
        'status',
    ];
}