@extends('admin.layouts.template')
@section('page_title')
Edit Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0"><i>Image Product Edit</i></h5>
              <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">

              @if($errors->any())
                 <div class="alter alter-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                  </ul>
                 </div>
              @endif
              <form method="POST" action="{{route('updateproductsimage',$imageEdit->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-phone">Pervious Image</label>
                  <div class="col-sm-10">
                 <img src="{{asset($imageEdit->product_img)}}" style="width: 100px" alt="">
                  </div>
                </div>
                <input  type="hidden"  value="{{$imageEdit->id}}" name="category_id">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Upload Image</label>
                    <div class="col-sm-10">
                    
                        <div class="mb-3">
                            <input class="form-control" type="file" id="product_img" name="product_img" multiple="">
                          </div>
                        </div>              

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Upload New Image</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>
@endsection