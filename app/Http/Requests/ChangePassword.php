<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'oldpassword'=>['required', 'string'],
            'password'=> ['required', 'string', 'confirmed', 'min:6'],
        ];
    }
    public function messages()
    {
        return[
            'oldpassword.required' => 'Current password is required',
            'password.required'=> 'New password is required',
            'password.confirmed' => 'Password does not matched',
        ];
    }
}
