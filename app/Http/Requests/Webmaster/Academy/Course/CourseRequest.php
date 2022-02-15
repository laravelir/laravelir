<?php

namespace App\Http\Requests\Webmaster\Academy\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'author_id' => 'nullable|exists:users,id',
            'teachers' => 'nullable',
            'imauthor' => 'nullable',
            'imteacher' => 'nullable',
            'type' => 'required',
            'level' => 'required',
            'status' => 'required',
            'title' => 'required|unique:courses,title|min:3|max:50',
            'en_title' => 'required|unique:courses,en_title|min:3|max:30',
            'description' => 'required|unique:courses,description|min:3|max:250',
            'body' => 'required|unique:courses,body|min:3',
            'price' => 'required',
            'tags' => 'required',
            'categories' => 'required',
            'publish_status' => 'nullable',
            'thumbnail_path' => 'required',
            'pinned' => 'nullable',
            'priority' => 'nullable',
        ];
    }
}
