@extends('layouts.app')

@section('content')
<nav class="bg-custom" aria-label="breadcrumb">
    <ol class="breadcrumb bg-custom">
        <li class="breadcrumb-item"><a href="{{route('type.index')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($type->name) }}</li>
    </ol>
</nav>
<div class="p-4">
    <div class="row">
        <div class="col-sm-2">
            @include('types.parts.filter')
        </div>
        <div class="col-md-10">
            @if (!$type->vehicles()->count())
                <h1>{{ __('custom.qt.empty') }}</h1>
            @else
                <div class="bg-custom text-center text-white"><h1>{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h1></div>
            @endif
            @if (session()->has('info'))
                <div class="alert alert-success">{{ session('info') }}</div>
            @endif
            <div class="row" id="vhs">
                @forelse ($vehicles as $vehicle)
                    <div class="col-sm-4 mb-4 rounded" id="{{ $vehicle->id }}">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header bg-secondary text-white">
                                <h4 class="card-title">{{ $vehicle->reference }}<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ ucfirst($vehicle->brand) }}</h4>
                            </div>
                            <a href="{{route('vehicles.show',$vehicle)}}">
                                @if (!$vehicle->photos->count())
                                <img src="{{ URL::to('storage/logo-carrasco.jpg') }}" class="img-fluid img-custom" alt="asd">
                                @else
                                <img src="{{ url($vehicle->photos()->first()->url) }}" class="img-fluid img-custom" alt="asd">
                                @endif
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($vehicle->brand).'-'.$vehicle->model }}</h5>
                                <h6 class="card-text">{{ $vehicle->reference }}</h6>
                                <h6 class="card-text">{{ date('d-m-Y', strtotime($vehicle->reg_date)) }}</h6>
                                <hr>
                                <div class="card-text" style="height:100px; overflow-y:scroll">
                                    <h6 class="card-title">{{ $vehicle->description }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <li>{{ __('custom.qt.empty') }}</li>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
