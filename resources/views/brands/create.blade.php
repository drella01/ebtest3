@extends('layouts.app')
@section('content')
<div class="container">
    <div class="m-4">
        <form action="{{ route('brands.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nombre de la marca</label>
                    <input name='name' type="text" class="form-control" id="name" value="{{ $brand->name ?? old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <label for="type_id[]">Tipo de vehículo</label>
            </div>
            @foreach ($types as $type)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="{{ $type->id }}" id="{{ $type->id}}" name="type_id[]">
                <label class="form-check-label" for="defaultCheck1">
                {{ $type->name }}
                </label>
            </div>
            @endforeach
            <div class="form-row">
                <input type="submit" class="btn btn-primary" value="Crear">
            </div>
        </form>
    </div>
</div>
@endsection
