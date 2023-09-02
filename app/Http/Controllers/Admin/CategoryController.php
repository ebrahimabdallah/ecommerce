<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::latest()->get();
        return view('admin.Category.allcategory',compact('categories'));
    }
    public function AddCategory()
    {
        return view('admin.Category.add-category');
    }
    public function storeCategory(AddCategoryRequest $request)
    {
      
        Category::create([
            'Category_name' => $request->input('Category_name'),
            'slug' => strtolower(str_replace(' ', '-', $request->input('Category_name')))
        ]);

        return redirect()->Route('allcategory')->with('message', 'Category added successfully.');
    }
  
    public function EditCategory($id)
    {
        $info_Category=Category::findOrFail($id);
        return view('admin.Category.editcategory',compact('info_Category'));
    }
  
    public function UpdateCategory(Request $request)
    {

    $category_id=$request->category_id;
    $request->validate([
        'Category_name' => 'required|unique:Categories'
    ]);



    $category = Category::findOrFail($category_id);
    $old_category_name = $category->Category_name;
    $new_category_name = $request->input('Category_name');
    $category->Category_name = $new_category_name;
    $category->slug = strtolower(str_replace(' ', '-', $new_category_name));
    $category->save();



  // Update subcategories with the new category name
  SubCategory::where('Category_id', $category_id)
  ->update(['CategoryName' => $new_category_name]);


// Update subcategory slugs based on the new category name
   SubCategory::where('Category_id', $category_id)
  ->update(['slug' => strtolower(str_replace(' ', '-', $new_category_name))]);


// Check if the category name has changed
if ($old_category_name !== $new_category_name) {
  // Update subcategory slugs based on the new category name
  SubCategory::where('Category_id', $category_id)
      ->update(['slug' => strtolower(str_replace(' ', '-', $new_category_name))]);
}

return redirect()->route('allcategory')->with('message', 'Category updated successfully.');
}



    public function DeleteCategory($Category_id)
    {
     
        $category = Category::findOrFail($Category_id);
        $category->products()->delete(); // Delete related products
        $category->SubCategory()->delete(); // Delete related SubCategory
        Category::where('id',$Category_id)->decrement('product_count',1);
        SubCategory::where('id',$Category_id)->decrement('product_count',1);
        $category->delete();
    
        return redirect()->back()->with('message','Delete Category Done');
    }
}

