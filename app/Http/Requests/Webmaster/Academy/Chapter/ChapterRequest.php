<?php

namespace App\Http\Requests\Webmaster\Academy\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'course_id' => 'required',
            'number' => 'required',
            'title' => 'required',
            'active' => 'nullable',
        ];
    }
}
