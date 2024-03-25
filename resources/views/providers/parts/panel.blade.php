<div class="panel-heading" style="text-align: center">
    <h4 class="panel-title">Vehículos de {{ $client->name }}</h4>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Bastidor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($client->cars as $car)
                    <tr>
                        <td><a href="{{route('cars.show',$car)}}">{{ $car->registration }}</a></td>
                        <td>  {{ $car->brand }}</td>
                        <td>  {{ $car->model }} </td>
                        <td>  {{ $car->car_frame }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
