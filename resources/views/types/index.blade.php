@extends('layouts.app')

@section('content')
@if (session()->has('info'))
  <div class="alert alert-success">{{ session('info') }}</div>
@endif
<div class="row mt-4">
    <div class="col-sm-4 ml-2 px-2">
        <div class="carousel slide" data-ride="carousel" id="typeCarousel">
            <div class="carousel-inner">
                @foreach ($types as $type)
                <div class="carousel-item">
                    <img src="storage/{{$type->name}}.jpg" class="d-block w-100 img-fluid img-custom" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('custom.'.$type->name) }}</h5>
                        <h6 class="card-text">{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h6>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#typeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#typeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-sm-4 bg-custom">
        <div class="row">
            <div class="col-md-12 text-center bg-custom text-white">
                <h4>{{__('custom.stockNew')}}</h4>
            </div>
            @foreach ($lastVehicles as $item)
                <div class="col-sm-6 p-0">
                    <a href="{{ route('vehicles.show',$item->id)}}">
                        <div class="card h-100 text-white" style="max-width: 100%; background-color:transparent;">
                            @if ($item->photos->first())
                            <img class="card-img-top m-0" style="height: 150px; width:auto; object-fit: cover;"  src="{{$item->photos->first()->url}}" alt="Card image cap">
                            @else
                            <img class="card-img-top m-0" style="height: 150px; width:auto; object-fit: cover;"  src="{{ URL::to('storage/carrasco.jpg')}}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->reference }}</h5>
                                <div class="card-title text-left">{{ __('custom.'.$item->type->name) }}</div>
                                <hr>
                                <div class="card-text" style="height:80px; overflow-y:scroll">
                                    <h6 class="card-title text-left">{{ $item->description }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-3 ml-4 p-0">
        <div class="m-0">
            <video style="max-width:100%;" muted autoplay controls>
                <source src="{{ URL::to('storage/videos/video.MP4') }}" type="video/mp4">
            </video>
        </div>
    </div>
</div>
@endsection
