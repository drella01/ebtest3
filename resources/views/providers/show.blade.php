@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div>
        <a type="button" href="{{ route('providers.index') }}" class="btn btn-danger btn-lg">Volver</a>
        <a type="button" href="{{ route('providers.edit', $provider) }}" class="btn btn-primary btn-lg">Editar</a>
        @include('providers.parts.modal')
    </div>
    <div class="text-center">
        <h2>Información de  {{$provider->name}}</h2>
    </div>
    @include('providers.parts.form')
</div>
<script>
    $(document).ready(function(){
        $('input[type = "text"], select').attr('disabled', true);
        $('#deleteBtn').attr('disabled', false);
        $('button[type = "submit"]').hide();
    });
</script>
@endsection
