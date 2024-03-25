@extends('layouts.app')
@section('content')
@if( session()->has('info') )
    <div class="row justify-content-center m-2 alert alert-success" role="alert">
        <h3>{{ session('info') }}</h3>
    </div>
@endif
<div class="container py-4">
    <div class="panel">
        <div class="panel-heading d-inline pb-4" style="text-align: center">
            <a href="{{ route('providers.create') }}" class="btn btn-outline-primary float-right">Nuevo Proveedor</a>
            <h3 class="panel-title">Listado de proveedores</h3>
        </div>
        <div class="panel-body">
            @include('providers.parts.table')
        </div>
        {{ $providers->links() }}
    </div>
</div>
@endsection
