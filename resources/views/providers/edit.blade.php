@extends('layouts.app')

@section('content')
    <form class="px-4" action="{{ route('providers.update', $provider) }}" method="POST">
        @method('PUT')
        @include('providers.parts.form',[
            'customBtn' => 'Actualizar'
        ])
    </form>
@endsection
