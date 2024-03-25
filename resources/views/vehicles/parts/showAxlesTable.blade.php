<table class="table table-striped">
    <tr>
        <th>{{ __('custom.general.n_tyres') }}</th>
        <td>{{ strtoupper($vehicle->n_tyres) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.tyres') }}</th>
        <td>{{ strtoupper($vehicle->tyres) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.axles_brand') }}</th>
        <td>{{ strtoupper($vehicle->axles_brand) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.axles') }}</th>
        <td>{{ strtoupper($vehicle->axles) }}</td>
    </tr>
    @if(!$vehicle->type_id == 3)
    <tr>
        <th>{{ __('custom.general.drive_axles') }}</th>
        <td>{{ strtoupper($vehicle->drive_axles) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.config_axles') }}</th>
        <td>{{ strtoupper($vehicle->config_axles) }}</td>
    </tr>
    @endif
    <tr>
        <th>{{ __('custom.axles.lifting_axle') }}</th>
        <td>{{ strtoupper($vehicle->lifting_axle) }}</td>
    </tr>
    @foreach ($vehicle->axlesDetail as $key=>$item)
    <tr>
        <th>
            <h5 class="text-right bold">{{ __('custom.axle').' '.++$key }}</h5>
        </th>
        <td></td>
    </tr>
    <tr>
        <th>
            {{ __('custom.axles.suspension') }}
        </th>
        <td>
            {{ strtoupper($item->suspension) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ __('custom.axles.brake') }}
        </th>
        <td>
            {{ strtoupper($item->brake) }}
        </td>
    </tr>
    @endforeach
</table>
