@extends('user_template.layouts.template')

@section('main-content')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">All Products</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach ($Products as $Product)    
                                    <div class="col-lg-4 col-sm-4"  >
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{$Product->product_name}}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">{{$Product->price}}</span></p>
                                            <p class="price_text">Category <span style="color: #262626;">{{$Product->product_category_name}}</span></p>
                                            <p class="price_text">SubCategory <span style="color: #262626;">{{$Product->product_subcategory_name}}</span></p>
                                            <div class="tshirt_img"><img src="{{asset($Product->product_img)}}" style="width: 50%"></div>
                                           
                                            <div class="btn_main">
                                                <div class="buy_bt">
                                                    <form action="{{route('addProductsToCart')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="products_id" value="{{ $Product->id}}">
                                                        <input type="hidden" name="price" value="{{ $Product->price}}">
                                                        <input type="hidden" name="quantity" value="1">  
                                                        {{-- check product avaliable now or not --}}
                                                        @if($Product->quantity <= 0)
                                                        <div class="seemore_bt">Not available Not</div>
                                                        @else
                                                        <input class="btn btn-warning" type="submit" value="Buy Now">
                                                        @endif
                                                    </form>
                                                </div>
                                                <div class="seemore_bt"><a href="{{route('singleProduct',[$Product->id,$Product->slug])}}">See More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> 
                     </div> 
                 </div> 
             </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
@endsection