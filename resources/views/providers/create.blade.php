@extends('layouts.app')

@section('content')
@if( session()->has('info') )
    <div class="row justify-content-center m-2 alert alert-success" role="alert">
        <h3>{{ session('info') }}</h3>
    </div>
@endif
<div class="row justify-content-center m-2">
    <h2 style="color: #d3d3d3">Alta de un nuevo proveedor</h2>
</div>
<div class="container">
    <form class="px-4" action="{{ route('providers.store') }}" method="POST">
        @include('providers.parts.form',[
            'provider' => new App\Models\Provider,
            'customBtn' => 'Crear',
        ])
    </form>
</div>
@endsection
