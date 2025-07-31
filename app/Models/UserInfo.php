<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_day',
        'ss_dl',
        'address',
        'city',
        'zip',
        'state',
        'country',
        'phone',
        'secret_question',
        'secret_answer',
        'email',
    ];
}
