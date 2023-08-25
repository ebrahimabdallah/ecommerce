@extends('user_template.layouts.template')
@section('page_title')
products
@endsection
@section('main-content')
<div class="contianer">
    <div class="row">
<div class="col-lg-4">
    <div class="box_main">
        <div class="tshirt_img"><img src="{{asset($products->product_img)}}"></div>
        
    </div>
</div>
<div class="col-lg-8">
<div class="box_main">
    <div class="product-info">
    
    
    <h4 class="shirt_text text-left">{{$products->product_name}} </h4>
    

    <p class="price_text text-left">Price  <span style="color: #262626;"> 
        {{$products->price}} 
    </span></p>


   

</div>
<div class="my-3 product-details">

    <p class="lead">
        {{$products->product_long_des}}
    </p>
    <ul class="p-2 bg-light my-2">
<li>{{$products->product_short_des}}</li>
<li>{{$products->product_subcategory_name}}</li>
<li>{{$products->product_category_name}}</li>
<li>MaxMam Quantity  [{{$products->quantity}}] </li>
</ul> 
</div>
<div>
    <form action="{{route('addProductsToCart')}}" method="POST">
    @csrf
    <input type="hidden" name="products_id" value="{{ $products->id }}">

    <input type="hidden" name="price" value="{{ $products->price }}">
    <input type="hidden" name="quantity" value="1">  <div class="form-group" >
    <label for="quantity">Product Quantity:</label>

    <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="{{ $products->quantity }}">
  </div>
</div>
<div>
    <button type="submit" class="btn btn-warning">Add to Cart</button>
</form>
</div>
</div>

</div>

</div>

    </div>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              {{-- <div class="carousel-item active"> --}}
                 <div class="container">
                    <h1 class="fashion_taital">Related Products</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                      
                        @foreach ( $related_product as $Product )    
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text">{{$Product->product_name}}</h4>
                              <p class="price_text">Price  <span style="color: #262626;">$ {{$Product->price}}</span></p>
                              <p class="price_text">Type <span style="color: #262626;">   {{$Product->product_subcategory_name}}</span></p>
                           
                              <div class="tshirt_img" ><img src="{{asset($Product->product_img)}}"></div>
                                <div class="btn_main">
  
                              
                                </form>
                            </div>
                                 <div class="seemore_bt">
                                    <a href="{{route('singleProduct',[$Product->id,$Product->slug])}}">See More</a>
                                </div>
                                </div>
                           </div>
                        
                        @endforeach
                        
                       </div>
                    </div>
                 </div>
              </div>
</div>
@endsection

