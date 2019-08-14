<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DutyDayRule implements Rule
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

            return preg_match('/^((((Mon|Tue(s)?|Wed(nes)?|Thu(rs)?|Fri|Sat(ur)?|Sun)(day)?(-)*?)*?)|all-days|except-weekend)$/',$value);
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
