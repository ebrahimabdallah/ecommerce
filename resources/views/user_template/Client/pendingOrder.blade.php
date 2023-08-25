@extends('user_template.layouts.user-profile-template')

@section('ProfileContent')
pending
@if(session()->has('message'))
<div class="alert alert-success">
   {{session()?->get('message')}}
</div>

@endif


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Product id</th>
                <th>Address</th>
                <th>NUmber Phone</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach ($pendingOrders as $order)
            <?php
            // $product_name=App\Models\Order::where('id',$order->product_id)->value('product_name');
          ?>  
            
            <tr>
                <td>{{ $order->product_id }}</td>
                <td>{{ $order->shopping_address }}</td>
                <td>{{ $order->shopping_phoneNumber }}</td>
                <td></td>
             </tr>
            @endforeach
             
            
                  
        </tbody>
    </table>



@endsection