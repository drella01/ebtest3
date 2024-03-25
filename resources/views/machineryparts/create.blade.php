@extends('layouts.app')

@section('content')
<div class="container">
    @if( session()->has('info') )
        <div class="alert alert-success text-center" role="alert">{{ session('info') }}</div>
    @endif
    @if( session()->has('errors') )
        <div class="alert alert-success text-center" role="alert">{{ session('errors') }}</div>
    @endif
    <div class="mt-4"><h2 class="text-center bg-filter text-white">Alta de nuevo elemento</h2></div class="mt-4">
    <form action="{{ $update ?? route('machineryparts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('machineryparts.parts.general')
        @include('machineryparts.parts.form-photos-docs')
        <input type="hidden" name="type_id" value="9">
        <input type="submit" class="btn btn-primary btn-block" value="Guardar">
    </form>
</div>
@endsection
