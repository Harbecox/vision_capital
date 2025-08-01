<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => 'array'
    ];

    protected $fillable = [
        "name",
        "value"
    ];
}
