@extends('user_template.layouts.template')


@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="box-main">
            <form action="{{route('add_shipping_address')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone"  placeholder="Number"  autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="address">City/Village Name</label>
                    <input type="text" class="form-control" name="address" placeholder="Address"  autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="Postal Number">Postal Number</label>
                    <input type="text" class="form-control" name="Postal_number"  placeholder="Postal Number"  autocomplete="off" >
                </div>
<input type="submit" value="Next" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>


@endsection