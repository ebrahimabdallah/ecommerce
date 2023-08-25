@extends('user_template.layouts.template')

@section('main-content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
<center>
<h2 >List of Your Products</h2>
</center>
<br>
<div class="row">
            <div class="col-12">
                <div class="box-main">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totaly=0;
                                $totaly_quantity=0;
                                ?>
                                @foreach ($carts as $cart)
                                <?php
                            
                                $product_name=App\Models\Products::where('id',$cart->product_id)->value('product_name');
                                $img=App\Models\Products::where('id',$cart->product_id)->value('product_img');

                                ?>
                                <tr>
                                        <td>{{ $product_name }}</td>
                                        <td><img src="{{($img)}}" style="height: 25%" width="25%" ></td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->price }}</td>
                                       <td><a href="{{route('deleteCart',$cart->id)}}" class="btn btn-warning ">Remove Now</a></td>
                                    
                                    <?php
                                    $totaly=$totaly+ $cart->price;
                                    $totaly_quantity=$totaly_quantity + $cart->quantity;

                                    ?>
                                    @endforeach
                                    @if($totaly>0)
                                    <tr style="background-color: #f2f2f2; font-weight: bold;">
                                        <td>total</td>
                                        <td></td>
                                        <td>{{$totaly_quantity}}</td>
                                        <td>{{$totaly}}</td>
                                       <td><a href="{{route('shipping_address')}}" class="btn btn-primary ">Check Now</a></td>
                                    </tr>
                                            @endif
                                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection