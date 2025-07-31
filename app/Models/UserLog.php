<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;

   protected $fillable = [
       "ip",
       "referrer",
       "url",
       "user_id",
       "user_agent"
   ];

    function getCreatedAtAttribute(){
        return Carbon::make($this->attributes['created_at'])->format("m/d/Y");
    }

    function getUpdatedAtAttribute(){
        return Carbon::make($this->attributes['updated_at'])->format("m/d/Y");
    }

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

}
