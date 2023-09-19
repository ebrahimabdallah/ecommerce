<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', function () {
    return view('welcome');
});



Route::controller(HomeController::class)->group(function(){

    
    Route::get('index','index')->name('Home');
    Route::get('logout','logout')->name('logout');  //logout a session 
    Route::get('/Search','Search')->name('Search');

});


Route::controller(ClientController::class)->group(function(){
    
    Route::get('/category/{id}/{slug}','CategoryPage')->name('category');
    
    Route::get('/Product_details/{id}/{slug}','SingleProduct')->name('singleProduct');
    Route::get('/new_realse','NewRealse')->name('new_realse');
;
});

Route::middleware(['auth','role:users'])->group(function () {
    Route::controller(ClientController::class)->group(function(){
    
    Route::get('/addToCart','AddToCart')->name('addToCart');

    Route::get('/delete-cart/{id}','DeleteCart')->name('deleteCart');

    Route::get('/shipping-address','ShippingAddress')->name('shipping_address');

    Route::Post('/add_shipping-address','AddShippingAddress')->name('add_shipping_address');

    Route::post('/add-products-to-cart','AddProductsToCart')->name('addProductsToCart');

    Route::get('/checkOut','CheckOut')->name('check_out');

    Route::get('/userProfile','UserProfile')->name('user_profile');

    Route::get('/userProfile/pendingOrder','pendingOrders')->name('pending-orders');

    Route::post('/placingOrder','placeOrders')->name('palce-orders');

    Route::get('/userProfile/history','History')->name('history');

    Route::get('/today_deal','TodayDeal')->name('today_deal');

    Route::get('/custom_service','CustomService')->name('custom-service');
 });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function () {
Route::controller(DashbordController::class)->group(function(){
Route::get('/admin/dashboard','index')->name('admindasboard');

});
Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/all-category','index')->name('allcategory');
    Route::get('/admin/add-category','AddCategory')->name('addcategory');
    Route::post('/admin/store-category','StoreCategory')->name('storecategory');
    Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory');
    Route::Post('/admin/update-category','UpdateCategory')->name('updatecategory');
    Route::get('/admin/detele-category/{id}','DeleteCategory')->name('deletecategory');

    });
    
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/admin/all-sub-category','index')->name('all-sub-category');
    Route::get('/admin/Sub-add-category','SubAddCategory')->name('sub-add-category');
    Route::post('/admin/store-sub-category','StoreSubCategory')->name('store-sub-category');
    Route::get('/admin/delete-sub-category/{id}','deleteSubCategory')->name('delete-sub-category');
    Route::get('/admin/edit-sub-category/{id}','EditSubCategory')->name('edit-sub-category');
    Route::Post('/admin/update-sub-category/{id}','UpdateSubCategory')->name('updatesubcategory');
    });
    
Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/all-products','index')->name('allproducts');
    Route::get('/admin/add-procucts','Addproducts')->name('addproducts');
    Route::post('/admin/store-procucts','Storeproducts')->name('storeproducts');

    Route::get('/admin/edit-products-image/{id}','EditProductsimage')->name('editproductsimage');
    Route::Post('/admin/update-product-image/{id}','UpdateProductsImage')->name('updateproductsimage');

    Route::get('/admin/edit-products/{id}','EditProducts')->name('productsedit');
    Route::Post('/admin/update-products/{id}','UpdateProducts')->name('updateproducts');
    Route::get('/admin/delete-products/{id}','deleteProducts')->name('delete-Products');


});
    
Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/Pending','index')->name('pendingorder');
    Route::get('/admin/Conform/{id}','ConformOrder')->name('conform_order');
    Route::get('/admin/compelete','indexCompelete')->name('compeleteorder');

    });
    
    
});

require __DIR__.'/auth.php';
