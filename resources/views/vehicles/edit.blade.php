@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>{{ $vehicle->reference }}</h1>
    </div>
    @if( session()->has('info') )
    <div class="alert alert-success" role="alert" style="text-align:center; font-family:arial; font-size:20px;">{{ session('info') }}</div>
    @endif
    <div class="row">
        <!--div class="col-sm-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-data" role="tab" aria-controls="v-pills-data" aria-selected="true">Datos personales</a>
                <a class="nav-link" id="v-pills-vehicles-tab" data-toggle="pill" href="#v-pills-vehicles" role="tab" aria-controls="v-pills-vehicles" aria-selected="false">Fotos</a>
                <a class="nav-link" id="v-pills-invoices-tab" data-toggle="pill" href="#v-pills-invoices" role="tab" aria-controls="v-pills-invoices" aria-selected="false">Facturas</a>
            </div>
        </div-->
        <div class="col-md-12">
            @include('vehicles.parts.info',[
                'edit' => 'form',
                'status' => 'enable'
            ])
        </div>
    </div>
</div>
@endsection
