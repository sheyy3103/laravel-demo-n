<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SigninUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'bail|required|email',
            'password' => 'bail|required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Please enter email address',
            'email.email' => 'Invalid email',
            'password.required' => 'Please enter password'
        ];
    }
}
