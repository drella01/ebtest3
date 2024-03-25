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
            <a href="{{ route('containertypes.create') }}" class="btn btn-outline-primary float-right">Nuevo tipo de vehículo</a>
            <h3 class="panel-title">Tipos de vehículo</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($containerTypes as $containerType)
                            <tr>
                                <td><a href="{{ route('containertypes.edit', $containerType)}}">{{ ucfirst(__('custom.products.'.$containerType->name)) }}</a></td>
                                <td>{{ $containerType->cargo_type }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary btn-xs" href="{{ route('containertypes.edit', $containerType)}}">Edit</a>
                                        <form style="display:inline" action="{{route('containertypes.destroy', $containerType)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
