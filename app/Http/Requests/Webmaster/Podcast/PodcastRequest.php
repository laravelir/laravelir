<?php

namespace App\Http\Requests\Webmaster\Podcast;

use Illuminate\Foundation\Http\FormRequest;

class PodcastRequest extends FormRequest
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
            'title' => 'required|unique:podcasts',
            'description' => 'required|unique:podcasts',
            'body' => 'required|unique:podcasts',
            'status' => 'required',
            'fileUrl' => 'required',

        ];
    }
}
