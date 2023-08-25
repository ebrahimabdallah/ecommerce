
@extends('admin.layouts.template')
@inject('order', 'App\Models\Order')

@section('page_title')
Pending Order
@endsection
@section('content')
<br><br>
<div class="container my-5">
    <div class="card p-4">
        @if(session()->has('message'))
        <div class="alert alert-success">
           {{session()->get('message')}}
        </div>
@endif
        <br>
        <div class="card-title"><h1 class="text-center">Pending Order</h1>
        <div>Pending Order {{ $order->where('status', 'pending')->count() }}</div>  
        </div>
            <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>User Id</th>
                            <th>Shipping information</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                @foreach ($pendingOrders as $Order)
                <tr>
                    <td>{{$Order->userid}} </td>
                    <td>
                        <ul>
                        <li>{{$Order->shopping_phoneNumber}}</li>    
                        <li>{{$Order->shopping_postalCode	}}</li>    
                        <li>{{$Order->shopping_address}}</li>    
                    </ul> 
                    </td>
                    <td>{{$Order->product_id}}</td>
                    <td>{{$Order->quantity}}</td>
                    <td>{{$Order->total_price}}</td>



                    <td>{{$Order->status}}</td>
                    
                    
                    <td><a href="{{route('conform_order',$Order->id)}}" class="btn btn-primary">Approve Now</a></td>

                </tr>
                @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection