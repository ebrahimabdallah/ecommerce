<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\random;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products=Products::latest()->get();
        return view('admin.products.allproducts',compact('products'));
    }
    public function Addproducts()
    {
        $categories=Category::latest()->get();
        $subcategories=SubCategory::latest()->get();

        return view('admin.products.addproducts',compact('subcategories','categories'));
    }
    public function Storeproducts(AddProductRequest $request)
    {
   
       
        //upload image to storage in public /upload and store in db
        $image=$request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url='upload/'.$img_name;
       

         $Category_id = $request->product_category_id;
         $Category_name = Category::where('id', $Category_id)->value('Category_name');
         

        $subCategory_id = $request->product_subcategory_id;
        $subCategory_name = SubCategory::where('id', $subCategory_id)->value('subCategoryName');


        Products::insert([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_long_des' => $request->product_long_des,
            'product_short_des' => $request->product_short_des,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_category_name' => $Category_name,
            'product_subcategory_name' => $subCategory_name,
            'quantity' => $request->quantity,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),

        ]);

        
        Category::where('id',$Category_id)->increment('product_count',1);
        SubCategory::where('id',$subCategory_id)->increment('product_count',1);
        return redirect()->route('allproducts')->with('message','add produt successfully');
    }




  //edit a products 

  public function EditProducts($id)
  {

    $edit_products=Products::findOrFail($id);
    return view('admin.products.edit-products',compact('edit_products'));
  }

  public function UpdateProducts(Request $request)
{

    $request->validate([
        'product_name' => 'required',
        'price' => 'required',
        'product_long_des' => 'required',
        'product_short_des' => 'required|max:100',
        'quantity' => 'required',

    ]);
    $id=$request->id;
    Products::findOrFail($id)->Update([
        'product_name' => $request->product_name,
        'price' => $request->price,
        'product_long_des' => $request->product_long_des,
        'product_short_des' => $request->product_short_des,
        'quantity' => $request->quantity,
        'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
    ]);
    return redirect()->route('allproducts')->with('message','Update Produt Successfully');
}
public function deleteProducts($id)
{
    $subcatategory_id = Products::where('id', $id)->value('product_subcategory_id');
    $category_id = Products::where('id', $id)->value('product_category_id');

    Products::findOrFail($id)->delete();

   Category::where('id', $category_id)->decrement('product_count', 1);
   SubCategory::where('id', $subcatategory_id)->decrement('product_count', 1);

   return redirect()->back()->with('message','Delete Category Done');

}





    public function EditProductsimage($id)
    {
      $imageEdit=Products::findOrFail($id);
      return view ('admin.products.edit-products-image',compact('imageEdit'));        
    }    
    public function UpdateProductsImage(Request $request)
    {
        $request->validate([
            
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $id=$request->id;
        $image=$request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload'), $img_name);
        $img_url='upload/'.$img_name;
    
      Products::findOrFail($id)->Update([
        'product_img' => $img_url,

      ]);
        return redirect()->route('allproducts')->with('message','Update Image produt successfully');

    }



}

