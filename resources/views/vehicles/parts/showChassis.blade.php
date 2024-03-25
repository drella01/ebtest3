<div class="col-12">
    <div class="row my-4 text-center">
        <div class="col-lg-12 bg-custom text-white">
            <h5>{{ __('custom.chassis_features') }}</h5>
        </div>
    </div>
</div>
<table class="table table-striped">
    <tr>
        <th>{{ __('custom.general.tara') }} (Kg)</th>
        <td>{{$vehicle->tara}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.mma') }} (Kg)</th>
        <td>{{$vehicle->mma}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.large') }} {{ __('custom.general.width') }} {{ __('custom.general.height') }} mm.</th>
        <td>{{$vehicle->large}}x{{$vehicle->width}}x{{$vehicle->height}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.chassis_height') }} mm.</th>
        <td>{{ $vehicle->chassis_height }}</td>
    </tr>
    @if ($vehicle->type_id == 3 || $vehicle->type_id == 4)
    <tr>
        <th>{{ __('custom.general.kingpin_height') }} mm.</th>
        <td>{{$vehicle->kingpin_height}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.bolt_diameter') }} cm.</th>
        <td>{{$vehicle->bolt_diameter}}</td>
    </tr>
    @else
@if($vehicle->type_id != 4)
    <tr>
        <th>{{ __('custom.general.power') }}</th>
        <td>{{$vehicle->power}}</td>
    </tr>
    @if($vehicle->gearbox)
    <tr>
        <th>{{ __('custom.general.gearbox') }}</th>
        <td>{{ strtoupper(__(strtolower('custom.general.'.$vehicle->gearbox)))}}</td>
    </tr>
    @endif
    <tr>
        <th>{{ __('custom.general.n_gears') }}</th>
        <td>{{ strtoupper($vehicle->n_gears) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.engine_displacement') }}</th>
        <td>{{ strtoupper($vehicle->engine_displacement) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.euro_standard') }}</th>
        <td>{{ strtoupper($vehicle->euro_standard) }}</td>
    </tr>
    <tr>
        <th>{{ __('custom.general.break_retarder') }}</th>
        @if($vehicle->break_retarder)
        <td>{{ strtoupper(__(strtolower('custom.general.'.$vehicle->break_retarder))) }}</td>
        @else
        <td></td>
        @endif
    </tr>
    <tr>
        <th>{{ __('custom.general.differential_lock') }}</th>
        @if($vehicle->differential_lock)
        <td>{{ strtoupper(__(strtolower('custom.general.'.$vehicle->differential_lock))) }}</td>
        @else
        <td></td>
        @endif
    </tr>
        @if($vehicle->type_id != 1)
            <tr>
                <th>{{ __('custom.general.fifth_wheel_height') }} mm.</th>
                <td>{{ $vehicle->fifth_wheel_height }}</td>
            </tr>
        @endif
    @endif
    @if($vehicle->hydraulic_equipment)
    <tr>
        <th>{{ __('custom.general.hydraulic_equipment') }}</th>
        <td>{{ $vehicle->hydraulic_equipment }}</td>
    </tr>
    @endif
    @if($vehicle->trailer_hitch)
    <tr>
        <th>{{ __('custom.general.trailer_hitch') }}</th>
        <td>{{ $vehicle->trailer_hitch }}</td>
    </tr>
    @else
    <tr>
        <th>{{ __('custom.general.trailer_hitch') }}</th>
        <td></td>
    </tr>
    @endif
@endif
    <tr>
        <th>{{ __('custom.general.wheelbase') }} mm.</th>
        <td>{{ $vehicle->axlesDetail->pluck('wheelbase')->join('-','-','-') }}</td>
    </tr>
    @if ($vehicle->type_id == 1)
    @else
    <tr>
        @if ($vehicle->aluminum_rims)
        <th>{{ __('custom.general.aluminum_rims') }}</th>
        <td><h6>{{ strtoupper(__(strtolower('custom.general.'.$vehicle->aluminum_rims))) }}</h6></td>
        @else
        <th>{{ __('custom.general.aluminum_rims') }}</th>
        <td><h6></h6></td>
        @endif
    </tr>
    @endif
    <tr>
        <th>{{ __('custom.general.tank_capacity') }}</th>
        <td><h6>{{ $vehicle->tank_capacity }}</h6></td>
    </tr>
    <tr>
        <th>{{ __('custom.general.abs') }}</th>
        <td><h6>{{ strtoupper(__(strtolower('custom.general.'.$vehicle->abs))) }}</h6></td>
    </tr>
</table>
