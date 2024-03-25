@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('info'))
      <div class="alert alert-success">{{ session('info') }}</div>
    @endif
    @include('brands.parts.table')
</div>
@endsection
