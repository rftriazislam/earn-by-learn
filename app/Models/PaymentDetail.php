<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'first_mentor_id',
        'second_mentor_id',
        'method_name',
        'first_method_name',
        'second_method_name',
        'account_number',

        'first_account_number',
        'second_account_number',
        'upload_screenshort',
        'first_upload_screenshort',
        'second_upload_screenshort',
        'c_status',
        'm1_status',
        'm2_status',
        'status',
    ];
    public function user_info()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}