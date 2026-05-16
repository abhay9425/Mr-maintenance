<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IndianPhoneRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[6-9]\d{9}$/', $value)) {
            $fail('Please enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9.');
        }
    }
}
