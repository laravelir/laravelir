<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IRBankShabaCard implements Rule
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
        return $this->validateCardShaba($value);
    }

    function validateCardShaba($shaba)
    {
        $pattern = "/^IR[0-9]{24}$/i";
        return preg_match($pattern, $shaba);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return trans('validation.mobile');
        return 'فرمت شماره شبا نامعتبر می باشد.';
    }
}
