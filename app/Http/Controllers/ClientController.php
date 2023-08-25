<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\Shopping_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function CategoryPage($id)
    {
        $category=Category::findOrFail($id);
        $Products=Products::where('product_category_id',$id)->latest()->get();
        return view('user_template.Client.category',compact('category','Products'));
    }
    public function SingleProduct($id)
    {
        $products=Products::findOrFail($id);
        $subcatategory_id = Products::where('id', $id)->value('product_subcategory_id');
        $related_product=Products::where('product_subcategory_id',$subcatategory_id)->latest()->get();
        return view('user_template.Client.Product',compact('products','related_product'));
    }
public function AddToCart()
    {
        $userid=Auth::id();
        $carts=Cart::where('user_id',$userid)->get();
        return view('user_template.Client.add_to_cart',compact('carts'));

    }
    public function AddProductsToCart(Request $request)
    {

        $productPrice = $request->input('price');
        $productQuantity = $request->input('quantity');
        $totalPrice = $productPrice * $productQuantity;
        
        Cart::insert([
            'product_id' => $request->input('products_id'),
            'quantity' => $productQuantity,
            'price' => $totalPrice,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('addToCart')->with('message','add products successfully');
    }

    public function DeleteCart($id)
    {
      Cart::findOrFail($id)->delete();
      return redirect()->back()->with('message','Removed successfully');
    }
    
    public function CheckOut()
    {
        $userid=Auth::id();
        $carts=Cart::where('user_id',$userid)->get();
        $carts_item=Cart::where('user_id',$userid)->get();
        $shopping=Shopping_info::where('user_id',$userid)->first();
        return view('user_template.Client.check_out',compact('shopping','carts_item','carts'));
    }


    public function placeOrders()
    {
        $userid=Auth::id();
        $shopping=Shopping_info::where('user_id',$userid)->first();
        $carts_items=Cart::where('user_id',$userid)->get();
        foreach ($carts_items as $carts_item) {
            Order::insert([
               
                'userid'=>$userid,
                'shopping_phoneNumber'=>$shopping->phone,
                'shopping_postalCode'=>$shopping->postal_number,
                'shopping_address'=>$shopping->address,
                'quantity'=>$carts_item->quantity,
                'total_price'=>$carts_item->price,
                'product_id'=>$carts_item->product_id,
            ]);
                $id=$carts_item->id;
                                      
                Cart::findOrFail($id)->delete();
            }
            Shopping_info::where('user_id',$userid)->first()->delete();
return redirect()->route('pending-orders')->with('message','Order Placed Successfully');
    }

    public function ShippingAddress()
    {
        return view('user_template.Client.shipping-address ');
    }


  public function AddShippingAddress(Request $request)
  {
   Shopping_info::insert([

    'user_id'=>Auth::id(),
    'postal_number'=>$request->Postal_number,
    'address'=>$request->address,
    'phone'=>$request->phone,
    ]); 
    return redirect()->route('check_out')->with('message','Your request has been confirmed successfully');
  }

 

    public function pendingOrders()
    {
        $pendingOrders=Order::where('status','pending')->get();
        return view('user_template.Client.pendingOrder',compact('pendingOrders'));
       
    }
  
   
}
