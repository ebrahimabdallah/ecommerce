@extends('admin.layouts.template')
@section('page_title')
All Produts
@endsection
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">

       <!-- Basic Bootstrap Table -->
       <div class="card">
        @if(session()->has('message'))
        <div class="alert alert-success">
           {{session()->get('message')}}
        </div>
@endif
        <h6 class="card-header">Avaliable Products</h6>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
           
                <th>Id</th>
                <th>Product Name</th>
                <th>price</th>
                <th>product_img</th>
                <th>quantity</th>
                <th>S_N</th>

                <th>Actions</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
           
             @foreach ($products as $product)
                 
             <tr>
              <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>
                  <img src="{{asset($product->product_img)}}" style="height: 80px" alt="">
                  <br>
                  <a href="{{route('editproductsimage',$product->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>{{$product->quantity}}</td>
                <td>
                  <?php
                       echo $serialNumber= rand(1,20000);  
                  ?> 
                  </td>
           <td>
            <a href="{{route('productsedit',$product->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('delete-Products',$product->id)}}" class="btn btn-warning">Delete</a>
           </td>
             </tr>
             @endforeach

            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

</div>

@endsection
