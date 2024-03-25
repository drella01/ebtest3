@extends('layouts.app')

@section('content')
@if( session()->has('info') )
    <div class="row justify-content-center m-2 alert alert-success" role="alert">
        <h3>{{ session('info') }}</h3>
    </div>
@endif
<div class="row justify-content-center m-2">
    <h2 style="color: #d3d3d3">Alta de un nuevo tipo de carga</h2>
</div>
<div class="container">
    <form class="px-4" action="{{ route('containertypes.update',$container) }}" method="POST">
        @csrf
        @method('PUT')
        @include('containerType.parts.form', ['customBtn' => 'Update'])
    </form>
</div>
@endsection
