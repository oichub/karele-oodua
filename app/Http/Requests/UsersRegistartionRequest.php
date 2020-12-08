<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegistartionRequest extends FormRequest
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
            'country' => 'required|string',
            'tc' => 'required|string',
            'email' => 'required|email|unique:users,email,except,id',
            'phone' => 'required|string|digits_between:6,15|unique:users,phone,except,id',
        ];
    }

    public function messages()
    {
            return [
                'name.required' => 'Please provide your full name',
                'country.required' => 'Please select your country of residence',
                'email.required' => 'Please provide your email',
                'phone.required' => 'Please provide your phone number',
                'tc.required' => 'Please accept our term and condition',
            ];
    }
}
