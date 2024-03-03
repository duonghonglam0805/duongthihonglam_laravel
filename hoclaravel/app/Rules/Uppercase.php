<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
// use App\Rules\nb_strtoupper;
class Uppercase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    private $attribute = null;
     
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->attribute = null;
        //
        // if (strtoupper($value) !== $value) {
        //     $fail('Trường :attribute không hợp lệ phải viết hoa.');
        // }
        if (strtoupper($value) !== $value) {
            $fail('validation.uppercase')->translate();
        }
    }
}