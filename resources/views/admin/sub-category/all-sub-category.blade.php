@extends('admin.layouts.template')
@section('page_title')
Sub Category
@endsection
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">

       <!-- Basic Bootstrap Table -->
       <div class="card">
        <h6 class="card-header">Avaliable Category</h6>
        
        @if(session()->has('message'))
         <div class="alert alert-success">
            {{session()->get('message')}}
         </div>
@endif
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
               
              <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>CategoryName</th>
                <th>Product Count</th>

                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                    
             <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->subCategoryName}}</td>
                <td>{{$category->CategoryName}}</td>
                <td>{{$category->product_count}}</td>

           <td>

            <a href="{{route('edit-sub-category',$category->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('delete-sub-category',$category->id)}}" class="btn btn-warning">Delete</a>
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
