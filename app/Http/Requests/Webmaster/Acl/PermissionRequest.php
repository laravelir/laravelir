<?php

namespace App\Http\Requests\Webmaster\Acl;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'string|required|unique:permissions,name',
            'fa_name' => 'string|required|unique:permissions,fa_name',
            'roles' => 'nullable'
        ];
    }
}
