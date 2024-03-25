<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Referencia</th>
                <th>Fecha de compra</th>
                <th>Precio de compra</th>
                <th>Matricula</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td><a href="{{route('vehicles.show',$vehicle->id)}}">{{ $vehicle->reference }}</a></td>
                    <td>{{ $vehicle->buy_date }}</td>
                    <td>{{ $vehicle->buy_price }}</td>
                    <td>{{ $vehicle->registration }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
