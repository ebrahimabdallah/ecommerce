@extends('admin.layouts.template')
@inject('order', 'App\Models\Order')

@section('page_title')
    Compelete Order
@endsection

@section('content')
    <br><br>
    <div class="container my-5">
        <div class="card p-4">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <br>
            <div class="card-title">
                <h1 class="text-center">Compelete Order</h1>
                <div>Compelete Order {{ $order->where('status', 'complete')->count() }}</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through Compelete orders and display them --}}
                        @foreach ($compeleteOrder as $Order)
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
                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection