@if ($vehicle->tankTrailer)
<div class="col-12">
    <div class="row my-4 text-center">
        <div class="col-lg-12 bg-custom text-white">
            <h5>{{ __('custom.trailer_details') }}</h5>
        </div>
    </div>
</div>
<table class="table table-striped">
    <tr>
        <th>{{ __('custom.general.brand') }}</th>
        <td>{{$vehicle->tankTrailer->tank_brand}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.madeof') }}</th>
        <td>{{$vehicle->tankTrailer->madeof}}</td>
    </tr>
    <tr>
        <th>Tipo de carrocería</th>
        <td>{{strtoupper(__('custom.products.'.$vehicle->tankTrailer->type->name))}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.large') }}</th>
        <td>{{$vehicle->tankTrailer->large}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.width') }}</th>
        <td>{{$vehicle->tankTrailer->width}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.height') }}</th>
        <td>{{$vehicle->tankTrailer->height}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.floor_height') }}</th>
        <td>{{$vehicle->tankTrailer->floor_height}}</td>
    </tr>
</table>
@endif
