<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    function divisions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Division::class,"country_id","id");
    }
}
