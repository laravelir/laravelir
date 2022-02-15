<?php

namespace App\Http\Requests\Webmaster\GiftCode;

use Illuminate\Foundation\Http\FormRequest;

class GiftCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:150',
            'value' => 'required|string|min:3|max:10',
            'expired_at' => 'required',
            'code' => 'required|string|unique:gift_codes', // ['required, Rule::unique('gift_codes', 'code')->ignore($discount->id)]
            'type' => 'required',
            'users' => 'required|array',
            'count_use' => 'required',
            'count_use_user' => 'required',
        ];
    }
}
