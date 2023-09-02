<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'subCategoryName' => 'required|unique:sub_categories|max:225',
            'Category_id'=>'required',
            
        ];
    }
    
    public function messages(){
        return[
            'subCategoryName.required'=>'You Must Specify a SubCategoryName',
            'subCategoryName.unique'=>'Is subCategoryName Is Exist in subCategoryName already',
            'subCategoryName.max'=>'Is subCategoryName Must less 255 characters',
            
        ];
    }
}
