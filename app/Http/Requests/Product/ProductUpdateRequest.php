<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'price' => 'bail|required|numeric|gte:1',
            'sale_price' => 'bail|numeric|gte:0|lte:' . request()->price - 1,
            'image' => 'bail|mimes:jpg,jpeg,png,gif,svg,webp'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Product's name cannot be blank",
            'price.required' => "Price cannot be blank",
            'price.numeric' => "Price must be a number",
            'price.gte' => "Price must be greater than 0",
            'sale_price.numeric' => "Sale price must be a number",
            'sale_price.gte' => "Sale price must be greater than or equal to 0",
            'sale_price.lte' => "The sale price must be less than price",
            'image.mimes' => "Ivalid type of image"
        ];
    }
}
