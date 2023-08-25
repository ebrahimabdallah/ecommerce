@extends('admin.layouts.template')
@section('page_title')
Add Sub Category
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add a Sub Category</h4>
               
    <div class="row">
               <!-- Basic Layout -->
                       <div class="col-xxl">
                         <div class="card mb-4">
                           <div class="card-header d-flex align-items-center justify-content-between">
                             <h5 class="mb-0"><i>Category addtion</i></h5>
                             <small class="text-muted float-end">Default label</small>
                           </div>
                           <div class="card-body">
                             <form method="POST" action="{{route('store-sub-category')}}">
                              @csrf
                               <div class="row mb-3">
               
                               </div>
                               <div class="row mb-3">
                                 <label class="col-sm-2 col-form-label" for="basic-default-phone">Sub Category Name</label>
                                 <div class="col-sm-10">
                                   <input
                                     type="text"
                                     id="subCategoryName"
                                     name="subCategoryName"
                                     autocomplete="off"
                                     class="form-control phone-mask"
                                     placeholder="Electronic"
                                     aria-describedby="basic-default-phone"/>
                                 </div>
                               </div>

                               <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-default-phone">Category Name</label>
                                   <div class="col-sm-10">
                                                                    
                                <div class="mb-3">
                                    <label for="defaultSelect" class="form-label">Default select</label>
                                    <select id="Category_id" name="Category_id" class="form-select">
                                    <option>Default select</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->Category_name}}</option>
                                    @endforeach
                                
                                    </select>
                                </div>
            
                                </div>
                               <div class="row justify-content-end">
                                 <div class="col-sm-10">
                                   <button type="submit" class="btn btn-primary">Add Category</button>
                                 </div>
                               </div>
                             </form>
                           </div>
                         </div>
                       </div>
               </div>
               @endsection