<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories=SubCategory::latest()->get();
        return view('admin.sub-category.all-sub-category',compact('categories'));

    }
    public function SubAddCategory()
    {
        $categories=Category::latest()->get();
        return view('admin.sub-category.sub-add-category',compact('categories'));
    }    
    
    
    
    public function StoreSubCategory(SubCategoryRequest $request)
    {
        
        
        $Category_id = $request->Category_id;
        $Category_name = Category::where('id', $Category_id)->value('Category_name');
       
         SubCategory::insert([
            'subCategoryName' => $request->subCategoryName,
             'Category_id' => $Category_id,
             'slug' => strtolower(str_replace(' ', '-', $request->subCategoryName)),
            'CategoryName' => $Category_name,
        ]);
        
     Category::where('id', $Category_id)->increment('subcategory_count', 1);

    return redirect()->route('all-sub-category')->with('message', 'Subcategory added successfully.');
    
    }



    public function deleteSubCategory($id)
    {    
        $cat_id = SubCategory::where('id', $id)->value('Category_id');
       
       Category::where('id', $cat_id)->decrement('subcategory_count', 1);

           
        return redirect()->back()->with('message','Delete Category Done');
    }

    public function EditSubCategory($id)
    {
        $sub_category=SubCategory::findOrFail($id);
        return view('admin.sub-category.edit-sub-category',compact('sub_category'));
    }

    public function updateSubCategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Category_id' => 'required|integer',
            'subCategoryName' => 'required|unique:sub_categories,subCategoryName,'.$request->Category_id.',id'
        ]);   
    
        $Category_id = $request->input('Category_id');
        // $Category_name = $request->input('Category_name');

        $subcategory = SubCategory::findOrFail($Category_id);
        
        $subcategory->subCategoryName = $request->input('subCategoryName');
        $subcategory->slug = strtolower(str_replace(' ', '-', $request->input('subCategoryName')));
        $subcategory->save();
    
        return redirect()->route('all-sub-category')->with('message', 'Subcategory updated successfully.');
    }
    
}


