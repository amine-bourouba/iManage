<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DutyTimeRule implements Rule
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
        if (!empty($value)){

            return preg_match('/^((2[0-3]|[0][0-9]|1[0-9]):([0-5][0-9])-(2[0-3]|[0][0-9]|1[0-9]):([0-5][0-9])|(24h)|(2[0-3]|[0][0-9]|1[0-9]):([0-5][0-9])-(2[0-3]|[0][0-9]|1[0-9]):([0-5][0-9])--(2[0-3]|[0][0-9]|1[0-9]):([0-5][0-9])-(2[0-3]|[0][0-9]|1[0-9]):([0-5][0-9]))$/',$value);

            }
        }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
