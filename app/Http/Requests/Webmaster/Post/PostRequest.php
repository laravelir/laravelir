<?php

namespace App\Http\Requests\Webmaster\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|unique:posts,title|min:10|max:255',
            'description' => 'required|string|min:10|max:255',
            'body' => 'required|string',
            'thumbnail_path' => 'required',
            'images' => 'nullable',
            'parent_id' => 'nullable',
            'author_id' => 'nullable',
            'imauthor' => 'nullable',
            'attachments' => 'nullable',
            'tags' => 'nullable',
            'categories' => 'nullable',
        ];
    }
}
