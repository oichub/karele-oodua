<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            //
            'title' => 'required|string',
            'date' => 'required|date',
            'video' => 'required|file|mimes:mp4,mkv,3gp',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please provide video title',
            'date.required' => 'Please provide video date ',
            'video.required' => 'Please provide video ',
        ];
    }
}
