<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "user_id ",
        "sum",
        "type",
        "fee",
        "name",
        "updated_at",
        "created_at"
    ];

    const TYPE_DEPOSIT = "deposit";
    const TYPE_WITHDRAWAL = "withdrawal";
    const TYPE_DIVIDEND = "dividend";

    const NAME_DIVIDEND = "dividend";
    const NAME_DIVIDEND_FEE = "dividend_fee";
    const NAME_FEE = "fee";
    const NAME_WIRE_TRANSFER = "wire_transfer";
    const NAME_CHECK = "check";

    function getCreatedAtAttribute(){
        return Carbon::make($this->attributes['created_at'])->format("m/d/Y");
    }

    function getUpdatedAtAttribute(){
        return Carbon::make($this->attributes['updated_at'])->format("m/d/Y");
    }
}
