<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        'product_name' => 'required|unique:products',
        'price' => 'required|integer',
        'product_long_des' => 'required|min:20|max:380',
        'product_short_des' => 'required|max:100|min:10',
        'quantity' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'You must specify a product name.',
            'product_name.unique' => 'The product name already exists.',
            'price.required' => 'You must specify a price.',
            'price.integer' => 'The price must be an integer.',
            'product_long_des.required' => 'You must provide a long description.',
            'product_long_des.min' => 'The long description must be at least 20 characters.',
            'product_long_des.max' => 'The long description must not exceed 380 characters.',
            'product_short_des.required' => 'You must provide a short description.',
            'product_short_des.min' => 'The short description must be at least 10 characters.',
            'product_short_des.max' => 'The short description must not exceed 100 characters.',
            'quantity.required' => 'You must specify a quantity.',
            'quantity.integer' => 'The quantity must be an integer.',
        ];
    }
}
