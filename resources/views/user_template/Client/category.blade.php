@extends('user_template.layouts.template')
@section('page_title')
All Category
@endsection
@section('main-content')

<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          {{-- <div class="carousel-item active"> --}}
             <div class="container">
                {{-- {{$category->product_count}} --}}
                <h1 class="fashion_taital">{{$category->Category_name}} 
                 ({{ $category->product_count > 0 ? $category->product_count : 'Out of stock ' }})
                </h1>
            
                <div class="fashion_section_2">
                   <div class="row">

                     @foreach ( $Products as $products )    
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">{{$products->product_name}}</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ {{$products->price}}</span></p>
                            <p class="price_text">Type <span style="color: #262626;">   {{$products->product_subcategory_name}}</span></p>
                         
                            <div class="tshirt_img" ><img src="{{asset($products->product_img)}}"></div>
                              <div class="btn_main">

                              <div class="buy_bt">      
                            <form action="{{route('addProductsToCart')}}" method="POST">
                                 @csrf
                                 <input type="hidden" name="products_id" value="{{ $products->id }}">
                                 <input type="hidden" name="price" value="{{ $products->price }}">
                                 <input type="hidden" name="quantity" value="1">  
                                 <input class="btn btn-wraning" type="submit" value="Buy Now">
                             </form>
                           </div>
                               <div class="seemore_bt"><a href="{{route('singleProduct',[$products->id,$products->slug])}}">See More</a></div>
                            </div>
                         </div>
                      </div>
                      @endforeach
                      
                   </div>
                </div>
             </div>
          </div>
        
    </div>
 </div>
@endsection