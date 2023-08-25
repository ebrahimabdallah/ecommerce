@extends('user_template.layouts.template')

@section('main-content')
Check Out Page 

<div class="row">
<div class="col-8">
    <div class="box_main">
    <h2> Product Will Send At_</h2>

    <p>Address:  {{$shopping->address}}</p>
    <p>Phone Number:  {{$shopping->phone}}</p>
    <p>Postal Code City:  {{$shopping->postal_number}}</p>
    

   
   
</div>
</div>
<div class="col-4">
    <div class="box_main">
        Your Final Product
<br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
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

                    ?>
                     <tr>
                        <td>{{ $product_name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>{{ $cart->price }}</td>
                        <td></td>
                    <?php
                    $totaly=$totaly+ $cart->price;
                    $totaly_quantity=$totaly_quantity + $cart->quantity;

                    ?>
                    @endforeach
                    @if($totaly>0)
                    <tr style="background-color: #f2f2f2; font-weight: bold;">
                        <td>total</td>
                        <td>{{$totaly_quantity}}</td>
                        
                        <td>{{$totaly}}</td>
                    </tr>

                            @endif
                          
                </tbody>
            </table>
    
</div>
<form action="{{route('palce-orders')}}" method="POST">
@csrf
<input type="submit" value="Confarm Order" class="btn btn-primary">
</form>

</div>
@endsection