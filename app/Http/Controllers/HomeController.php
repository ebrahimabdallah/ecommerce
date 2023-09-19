<?php

namespace App\Http\Controllers\Admin\ProductController;
Use App\Models\Products;
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{

  public function Search(Request $request)
  {
       $search=$request->search;
        $Products=Products::where('product_name','like','%'.$search.'%')->get();
       return view('user_template.home',compact('Products'));
      }


    public function index()

     {
         $Products=Products::latest()->get();
          return view('user_template.home',compact('Products'));
    }
  public function logout(Request $request) //logout a session 
  {

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
  
}
