<div class="col-12">
    <div class="row my-4 text-center">
        <div class="col-lg-12 bg-custom text-white">
            <h5>{{ __('custom.general_data') }}</h5>
        </div>
    </div>
</div>
<table class="table table-striped">
    <tr>
        <th>{{ __('custom.general.reference') }}</th>
        <td>{{strtoupper($machineryPart->reference)}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.description') }}</th>
        <td><h6>{{ strtoupper(__(strtolower($machineryPart->description))) }}</h6></td>
    </tr>
    <tr>
        <th>{{ __('custom.price.sale_price') }}</th>
        <td><h6><!--{{ $machineryPart->sale_price.'€'}}--><a href="https://wa.me/34697830404?text=Hola%20desde%20la%20web.%20Quiero%20saber%20el%20precio%20del%20del%20vehiculo%20referencia%20{{$machineryPart->reference}}" target="_blank" class="btn btn-success" rel="noopener noreferrer">Consultar aqui Whatsapp</a></h6></td>
    </tr>
</table>
