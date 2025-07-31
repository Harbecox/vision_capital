<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannedIp extends Model
{
    use HasFactory;

    protected $fillable = ['ip'];

    function getCreatedAtAttribute(){
        return Carbon::make($this->attributes['created_at'])->format("m/d/Y");
    }

    function getUpdatedAtAttribute(){
        return Carbon::make($this->attributes['updated_at'])->format("m/d/Y");
    }


}
