<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IRPhone implements Rule
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
        // /^09(1[0-9])|3[0-9]|2[0-9]-?[0-9]{3}-?[0-9]{3}$/
        // ^09(1[0-9]|9[0-4]|2[0-2]|0[1-5]|41|3[0,2,3,5-9])\d{7}$
        $pattern = '/^09(1[0-9]|9[0-4]|2[0-2]|0[1-5]|41|3[0,2,3,5-9])\d{7}$/';
        return preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return trans('validation.mobile');
        return 'فرمت شماره موبایل نامعتبر می باشد.';
    }
}
