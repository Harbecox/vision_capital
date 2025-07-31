<?php

namespace App\Rules;

use App\Helper\Sum;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class AvailableBalance implements ValidationRule
{
    private float $available = 0;

    function __construct($available)
    {
        $this->available = $available;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->available < Sum::clear($value)){
            $fail("not available balance");
        }
    }
}
