@extends('admin.layouts.template')
@section('page_title')
Edit Sub Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit a Category</h4>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0"><i>Category Edit</i></h5>
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
              <form method="POST" action="{{route('updatesubcategory',$sub_category->id)}}">
                @csrf

                <div class="row mb-3">

                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">subCategory Name</label>
                    <div class="col-sm-10">
                      <input
                        type="text" id="subCategoryName"
                        name="subCategoryName" class="form-control phone-mask"
                        value="{{$sub_category->subCategoryName}}"
                         aria-describedby="basic-default-phone"/>
                    </div>
                  </div>
                  <input  type="hidden"   autocomplete="off" value="{{$sub_category->id}}" name="Category_id">

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-phone">Category Name</label>
                  <div class="col-sm-10">
                    <input
                      type="text" id="Category_name"
                      name="Category_name" class="form-control phone-mask"
                      value="{{$sub_category->CategoryName}}"
                      {{-- <option value="{{$sub_category->CategoryName}}"</option> --}}
                      {{-- <option value="{{$sub_category->Category_id->Category_name}}"></option> --}}

                       aria-describedby="basic-default-phone"/>
                  </div>
                </div>


                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit Category</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>
@endsection