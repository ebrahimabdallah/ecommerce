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
    public function index()

     {
         $Products=Products::latest()->get();
          return view('user_template.home',compact('Products'));
    }
  public function reg(Request $request) //register a session 
  {

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('');
  }
  
}
