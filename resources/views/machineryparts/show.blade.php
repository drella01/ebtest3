@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-custom">
        <span class="item text-white">You are here:&nbsp;&nbsp;&nbsp;</span>
        <li class="breadcrumb-item"><a style="color: #ffffff" href="{{route('type.index')}}">Home</a></li>
        @if ($machineryPart->type)
        <li class="breadcrumb-item"><a style="color: #ffffff" href="{{route('machineryparts.index',$machineryPart->type->name)}}">{{ ucfirst($machineryPart->type->name) }}</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{ $machineryPart->reference ?? NULL}}</li>
    </ol>
</nav>
<div class="container">
    @if( session()->has('info') )
    <div class="alert alert-success" role="alert" style="text-align:center; font-family:arial; font-size:20px;">{{ session('info') }}</div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <hr>
            <div class="row">
                <div class="col-6">
                    <h2 class="px-2" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{ $machineryPart->reference }}</h2>
                    <h4 class="px-2" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{ ucfirst($machineryPart->brand) }}</h4>
                </div>
                <div class="col-6 text-right">
                    <a href="https://wa.me/34697830404?text=Hola%20desde%20la%20web.%20Quiero%20informacion%20del%20vehiculo%20referencia%20{{$machineryPart->reference}}" target="_blank" class="btn btn-success" rel="noopener noreferrer">Whatsapp</a>
                    <!--a href="https://api.whatsapp.com/send?phone=34637403372" class="btn btn-success" rel="noopener noreferrer">Whatsapp</a-->
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-6 text-center my-4">
            <div class="intro">
                <h2 class="text-center" style="font-family: Open Sans, sans-serif;font-size:26px; font-weight:bold;">{{__('custom.gallery')}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('machineryparts.parts.showGeneral')
        </div>
        <div class="col-md-6 text-center">
            @include('machineryparts.parts.fancygallery')
        </div>
    </div>
    @auth
    <div class="row my-4">
        <div class="col">
            <a href="{{ route('photos.reorderAllMachinery',$machineryPart) }}" class="btn btn-success btn-block" rel="noopener noreferrer">Editar fotos</a>
        </div>
        <div class="col">
            <a href="{{ route('machineryparts.edit', $machineryPart)}}" class="btn btn-primary btn-block" rel="noopener noreferrer">Editar datos</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-block" type="button" href="#" target="_blank">Admin PDF</a>
        </div>
        <div class="col">
            @include('machineryparts.parts.modal')
        </div>
    </div>
    @endauth
</div>
@endsection
