<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Población</th>
                <th>Código postal</th>
                <th>Provincia</th>
                <th>Teléfono</th>
                <th>email</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($providers as $provider)
                <tr>
                    <td><a href="{{ route('providers.show', $provider)}}">{{ $provider->name }}</a></td>
                    <td>{{ $provider->address }}</td>
                    <td>{{ $provider->city }} </td>
                    <td>{{ $provider->postal_code }}</td>
                    <td>{{ $provider->provence }} </td>
                    <td>{{ $provider->phone1 }}</td>
                    <td>{{ $provider->email }} </td>
                    <td>{{ $provider->type }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
