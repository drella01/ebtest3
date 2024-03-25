<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Tipo de vehiculo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td><a href="#">{{ $brand->id }}</a></td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->types()->pluck('name')->join(', ')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
