<div class="col-12">
    <div class="row my-4 text-center">
        <div class="col-lg-12 bg-custom text-white">
            <h5>{{ __('custom.cab.cab') }}</h5>
        </div>
    </div>
</div>
<table class="table table-striped">
    <tr>
        <th>{{ __('custom.cab.cab_type') }}</th>
        <td>{{strtoupper(__('custom.cab.'.$vehicle->cab->cab_type))}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.cab.tachograph') }}</th>
        @if($vehicle->cab->tacograph)
        <td>{{strtoupper(__('custom.cab.'.$vehicle->cab->tachograph))}}</td>
        @else
        <td></td>
        @endif
    </tr>
    <tr>
        <th>{{ __('custom.cab.air_conditioning') }}</th>
        <td>{{strtoupper(__('custom.cab.'.$vehicle->cab->air_conditioning))}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.cab.seats') }}</th>
        <td>{{ ucfirst($vehicle->cab->seats) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.cab.heat') }}</th>
        <td>{{ ucfirst($vehicle->cab->heat) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.cab.beds') }}</th>
        <td>{{ ucfirst($vehicle->cab->beds) }}</td>
    </tr>
</table>
