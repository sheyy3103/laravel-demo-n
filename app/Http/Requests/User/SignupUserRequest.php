<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SignupUserRequest extends FormRequest
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
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users,email',
            'phone' => ["bail","required","regex:/^(0[3|5|7|8|9])+([0-9]{8})$/","unique:users,phone"],
            'password' => 'bail|required|min:8|max:30',
            'confirm_password' => 'bail|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'User name cannot be blank',
            'email.required' => 'Email cannot be blank',
            'email.email' => 'Invalid email',
            'email.unique' => 'This email address is already taken',
            'phone.required' => 'Please enter phone number',
            'phone.regex' => 'Invalid phone',
            'phone.unique' => 'This phone number is already in taken',
            'password.required' => 'Password cannot be blank',
            'password.min' => 'Password between 8 and 30 characters',
            'password.max' => 'Password between 8 and 30 characters',
            'confirm_password.same' => 'Password does not match'
        ];
    }
}
