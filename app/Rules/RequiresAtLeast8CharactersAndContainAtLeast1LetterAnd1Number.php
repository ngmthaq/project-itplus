<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RequiresAtLeast8CharactersAndContainAtLeast1LetterAnd1Number implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $value, $matches)) {
            return $matches > 0;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mật khẩu có ít nhất 8 kí tự, có tối thiểu 1 chữ và 1 số';
    }
}
