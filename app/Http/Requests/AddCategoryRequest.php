<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'Category_name' => 'required|unique:Categories|max:225'
                ];
    }
    public function messages(){
        return[
            'Category_name.required'=>'You Must Specify a Category Name',
            'Category_name.unique'=>'Is Category Is Exist in Category already',
            'Category_name.max'=>'Is Catefory Must less 255 characters',
       
        ];
    }
}
