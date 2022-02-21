<?php

namespace App\Http\Requests\Webmaster\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fname' => 'required|min:2',
            'lname' => 'required',
            'username' => 'required|unique:users,username',
            'mobile' => 'nullable|unique:users,mobile',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'active' => 'nullable',
            'is_admin' => 'nullable',
            'notify_email' => 'nullable',
            // 'roles' => 'required|array',
        ];
    }
}
