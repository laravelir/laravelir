<?php

namespace App\Http\Requests\Webmaster\Expert;

use Illuminate\Foundation\Http\FormRequest;

class ExpertRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'avatar' => 'nullable|image',
            'roles' => 'required|array',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'active' => 'required|boolean',
        ];
    }
}
