@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($types as $type)
        <div class="col-sm-4 my-2">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ trans('custom.'.$type->name) }}
                    </h5>
                </div>
                <img src="storage/{{$type->name}}.jpg" class="card-img-top d-block w-100 img-fluid img-custom" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h5>
                </div>
                <div class="card-body">
                  <a href="{{route('vehicles.index',$type->name)}}" class="btn btn-primary">Ir a {{__('custom.'.$type->name)}}</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
