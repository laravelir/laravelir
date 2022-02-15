<?php

namespace App\Http\Requests\Webmaster\Achievement;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
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
            'title'       => 'required|unique:achievements,title',
            'description' => 'required',
            'logo_path'   => 'required',
            'type'        => 'required',
        ];
    }
}
