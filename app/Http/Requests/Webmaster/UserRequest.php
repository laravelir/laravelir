<?php

namespace App\Http\Requests\Webmaster;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // $request->validate([
        //     'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email'],
        //     'mobile' => ['required', 'string', 'min:11', 'max:11', 'unique:users,mobile'],
        //     'password' => ['required', 'confirmed', 'min:8'],
        //     'fname' => ['required'],
        //     'lname' => ['required'],
        //     'is_admin' => ['nullable'],
        //     'active' => ['nullable'],
        // ]);

        return [
            'title' => 'required|unique:posts,title',
            'body' => 'required|string',
            'thumbnail' => 'required|unique:posts,thumbnail',
            'status' => 'required',
            'images' => 'nullable',
            'parent_id' => 'nullable',
            'author_id' => 'nullable',
            'attachments' => 'nullable',
            'published' => 'nullable',
            'published_at' => 'nullable',
            'pinned' => 'nullable',
            'tags' => 'nullable',
            'categories' => 'nullable',
        ];
    }
}
