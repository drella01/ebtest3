@extends('layouts.app')

@section('content')
<div class="container">
    @if( session()->has('info') )
        <div class="alert alert-success text-center" role="alert">{{ session('info') }}</div>
    @endif
    @if( session()->has('errors') )
        <div class="alert alert-success text-center" role="alert">{{ session('errors') }}</div>
    @endif
    <div class="mt-4"><h2 class="text-center bg-filter text-white">Alta de nuevo vehículo</h2></div class="mt-4">
    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('vehicles.parts.general')
        @include('vehicles.parts.axles')
        @include('vehicles.parts.cab')
        @include('vehicles.parts.adr')
        @include('vehicles.parts.tank-trailer-form')
        @include('vehicles.parts.container-form')
        @include('vehicles.parts.retail')
        @include('vehicles.parts.form-photos-docs')
        <input type="submit" class="btn btn-primary btn-block" value="Submit">
    </form>
</div>
@endsection
