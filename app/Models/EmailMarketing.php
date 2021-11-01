<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailMarketing extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'user_id', 'price', 'password', 'recovery_email', 'status'
    ];
}