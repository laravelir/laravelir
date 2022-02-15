<?php

namespace App\Http\Requests\Webmaster\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id' => 'nullable',
            'title' => 'required|min:3|max:255',
            'en_title' => 'required|min:3|max:255',
            'description' => 'nullable',
            'color' => 'nullable',
            'type' => 'required',
            'active' => 'nullable',
        ];
    }
}
