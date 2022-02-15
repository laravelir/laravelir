<?php

namespace App\Http\Requests\Webmaster\Acl;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'string|required|unique:roles,name',
            'fa_name' => 'string|required|unique:roles,fa_name',
            'description' => 'required',
            // 'permissions' => 'nullable',
        ];
    }
}
