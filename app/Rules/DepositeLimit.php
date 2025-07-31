<?php

namespace App\Rules;

use App\Helper\Settings;
use App\Helper\Sum;
use App\Models\Deposit;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class DepositeLimit implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $limits = Settings::get("deposit_limit");
        if(Auth::user()->deposites->where("status",Deposit::STATUS_PAYED)->count() == 0){
            $limit = $limits['first'];
        }else{
            $limit = $limits['next'];
        }
        if($value < $limit){
            $fail("Minimal deposit amount ".Sum::toString($limit));
        }
    }
}
