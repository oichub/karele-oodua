<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Plan name is must be provide',
            'price.required' => 'Plan price is must be provide',
            'duration.required' => 'Plan duration is must be provide',

        ];
    }
}
