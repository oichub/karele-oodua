<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateReuest extends FormRequest
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
            'phone' => ['required', 'string','digits_between:6,15', Rule::unique('users', 'phone')->ignore(User::where('id', auth()->user()->id)->value('id'))],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(User::where('id', auth()->user()->id)->value('id'))],
        ];
    }

    public function messages()
    {
            return [
                'name.required' => 'Please provide your full name',
                'country.required' => 'Please select your country of residence',
                'email.required' => 'Please provide your email',
                'phone.required' => 'Please provide your phone number',
            ];
    }
}
