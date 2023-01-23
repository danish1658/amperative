<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordMatch implements Rule
{
    
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value === "kanyewest";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password doesn\'t match our records.';
    }
}
