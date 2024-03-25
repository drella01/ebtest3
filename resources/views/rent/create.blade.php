@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('rent.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="registration"><h5>Registration</h5></label>
                    <input type="text" class="form-control" name="registration" id="registration" value="{{$vehicle->registration}}" {{ $status ?? 'disabled' }}>
                </div>
            </div>
            <div class="col">
                <label for="brand"><h5>Brand</h5></label>
                <input type="text" class="form-control" name="brand" id="brand" value="{{$vehicle->brand}}" {{ $status ?? 'disabled' }}>
            </div>
            <div class="col">
                <label for="model"><h5>Model</h5></label>
                <input type="text" class="form-control" name="model" id="model" value="{{$vehicle->model}}" {{ $status ?? 'disabled' }} }}>
            </div>
            <div class="col">
                <label for="rent_price"><h5>{{__('custom.price.rent_price')}}</h5></label>
                <input type="text" class="form-control" name="rent_price" id="rent_price" value="{{ $vehicle->rent_price }} " readonly>
            </div>
        </div>
        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="date_from"><h5>From</h5></label>
                    <input type="date" class="form-control" name="date_from" id="date_from">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="date_to"><h5>Until</h5></label>
                    <input type="date" class="form-control" name="date_to" id="date_to">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>
    </form>
</div>
@endsection
