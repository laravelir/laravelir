<?php

namespace App\Http\Requests\Webmaster\Academy\Episode;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'author_id' => 'nullable',
            'course_id' => 'required',
            'chapter_id' => 'required',
            'title' => 'required|unique:episodes',
            'weight' => 'required',
            'type' => 'required',
            'description' => 'required',
            'time' => 'required',
            'videoUrl' => 'required',
            'episodeNumber' => 'required',
            'active' => 'nullable',
        ];
    }
}
