<?php

namespace App\Http\Requests\Quantity;

use Illuminate\Foundation\Http\FormRequest;

class QuantityRequest extends FormRequest
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
            'quantity' => 'bail|numeric|gte:1'
        ];
    }
    public function messages()
    {
        return [
            'quantity.numeric' => 'Quantity must be a number',
            'quantity.gte' => 'Quantity must be greater than 0'
        ]; //

    }
}
