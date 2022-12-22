<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class OrderUserRequest extends FormRequest
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
            'address' => 'bail|required',
            'email' => 'bail|required|email',
            'phone' => ["bail","required","regex:/^(0[3|5|7|8|9])+([0-9]{8})$/"],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'User name cannot be blank',
            'address.required' => 'Address cannot be blank',
            'email.required' => 'Email cannot be blank',
            'email.email' => 'Invalid email',
            'phone.required' => 'Please enter phone number',
            'phone.regex' => 'Invalid phone',
        ];
    }
}
