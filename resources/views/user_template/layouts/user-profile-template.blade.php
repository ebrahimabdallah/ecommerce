@extends('user_template.layouts.template')
@inject('order', 'App\Models\Order')
@section('main-content')

<div class="container">

<div class="row">
    <div class="col-lg-4">
        <div class="box_main">
       <ul>
        <li><a href="{{route('pending-orders')}}">Status Orders</a></li>
        
    </ul>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box_main">
            @yield('ProfileContent')
        </div>
    </div>
</div>
</div>

@endsection