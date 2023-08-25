<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $pendingOrders=Order::where('status','pending')->get();
        return view('admin.order.pending',compact('pendingOrders'));
       
    
    }

   

  
    
    public function ConformOrder($id)
    {
       
        $order = Order::find($id);
        if ($order) {
            $productId = $order->product_id;
            $product = Products::find($productId);
            if ($product) {
                $quantityToDecrement = $order->quantity;
                $product->decrement('quantity', $quantityToDecrement);
                $order->status = 'complete'; // Update the status to "complete"
                $order->save();
                return redirect()->back()->with('message', 'success');

            } else {
                return redirect()->back()->with('message', 'error');
            }
        } else {
            return redirect()->back()->with('message', 'error');
        }
        }             
// compelte order

public function indexCompelete()
{

    $compeleteOrder=Order::where('status','complete')->get();
    return view('admin.order.compelete',compact('compeleteOrder'));
   
}



    }
