@extends('layouts.app')
@section('content')
    <table class="table">
        @forelse ($vehicles as $vehicle)
            <tr>
                <td>{{$vehicle->id}}</td>
                <td>{{$vehicle->brand}}</td>
                <td>{{$vehicle->model}}</td>
                <td><a href="{{route ('rent.create',$vehicle)}}">{{$vehicle->registration}}</a></td>
            </tr>
        @empty
            <h3>No vehicles</h3>
        @endforelse
    </table>
@endsection
