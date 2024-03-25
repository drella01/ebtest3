<div class="card">
    <div class="card-header">
      Datos del cliente
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $client->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $client->address }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">{{ $client->city }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">{{ $client->postal_code }}-{{ $client->province }}</h6>
        <!--h6 class="card-subtitle mb-2 text-muted">{{ $client->phone1 }}</h6-->
        <h6 class="card-subtitle mb-2 text-muted"><a href=https://api.whatsapp.com/send?phone=34681109160">LLamar por teléfono</a></h6>
        <hr>
        <a href="{{ route('clients.edit',$client) }}" class="btn btn-primary">Editar</a>
    </div>
</div>
