<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdrawal extends Model
{
    use HasFactory;

    use SoftDeletes;

    const STATUS_PENDING = "pending";
    const STATUS_PAYED = "payed";
    const STATUS_CANCEL = "cancel";

    const TYPE_WIRE_TRANSFER = "wire_transfer";
    const TYPE_CHECK = "check";

    function getCreatedAtAttribute(){
        return Carbon::make($this->attributes['created_at'])->format("m/d/Y");
    }

    function getUpdatedAtAttribute(){
        return Carbon::make($this->attributes['updated_at'])->format("m/d/Y");
    }

    function getPayedAtAttribute(){
        return $this->attributes['payed_at'] ? Carbon::make($this->attributes['payed_at'])->format("m/d/Y") : $this->attributes['payed_at'];
    }

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
