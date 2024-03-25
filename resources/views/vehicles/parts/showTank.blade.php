@if ($vehicle->tankTrailer)
<div class="col-12">
    <div class="row my-4 text-center">
        <div class="col-lg-12 bg-custom text-white">
            <h5>{{ __('custom.tank-trailer') }}</h5>
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
        @if ($vehicle->tankTrailer)
        <th>Tipo de producto</th>
        <td>{{strtoupper(__($vehicle->tankTrailer->type->name))}}</td>
        @else
        <th>Tipo de producto</th>
        <td></td>
        @endif
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.volume') }}</th>
        <td>{{$vehicle->tankTrailer->volume}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.compartments') }}</th>
        <td>{{$vehicle->tankTrailer->compartments}}</td>
    </tr>
    @for($x=1;$x<=$vehicle->tankTrailer->compartments;$x++)
        @php
            $xz = 'liters'.$x;
        @endphp
        <tr>
            <th>{{ __('custom.tankTrailer.'.$xz) }}</th>
            <td>{{$vehicle->tankTrailer->$xz}}</td>
        </tr>
    @endfor
    <tr>
        @if ($vehicle->tankTrailer->degassed)
        <th>{{ __('custom.tankTrailer.degassed') }}</th>
        <td>{{ strtoupper(__('custom.tankTrailer.'.$vehicle->tankTrailer->degassed)) }}</td>
        @else
        <th>{{ __('custom.tankTrailer.degassed') }}</th>
        <td></td>
        @endif
    </tr>
    <tr>
        @if ($vehicle->tankTrailer->hose)
        <th>{{ __('custom.tankTrailer.hose') }}</th>
        <td>{{$vehicle->tankTrailer->hose}}</td>
        @else
        <th>{{ __('custom.tankTrailer.hose') }}</th>
        <td></td>
        @endif
    </tr>
    @if ($vehicle->tankTrailer->hose)
    <tr>
        <th>Metros manguera 1</th>
        <td>{{$vehicle->tankTrailer->hose1Lenght}}</td>
    </tr>
    <tr>
        <th>Diametro manguera 1 cm.</th>
        <td>{{$vehicle->tankTrailer->hose1Diameter}}</td>
    </tr>
    <tr>
        <th>Metros manguera 2</th>
        <td>{{$vehicle->tankTrailer->hose2Lenght}}</td>
    </tr>
    <tr>
        <th>Diametro manguera 2 cm. </th>
        <td>{{$vehicle->tankTrailer->hose2Diameter}}</td>
    </tr>
    @endif
    <tr>
        @if ($vehicle->tankTrailer->counter)
        <th>{{ __('custom.tankTrailer.counter') }}</th>
        <td>{{ strtoupper(__('custom.tankTrailer.'.$vehicle->tankTrailer->counter))}}</td>
        @else
        <th>{{ __('custom.tankTrailer.counter') }}</th>
        <td></td>
        @endif
    </tr>
    @if ($vehicle->tankTrailer->bomb)
    <tr>
        <th>{{ __('custom.tankTrailer.bomb') }}</th>
        <td>{{ strtoupper(__('custom.tankTrailer.'.$vehicle->tankTrailer->bomb))}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.bombBrand') }}</th>
        <td>{{ strtoupper($vehicle->tankTrailer->bombBrand)}}</td>
    </tr>
    @else
    <tr>
        <th>{{ __('custom.tankTrailer.bomb') }}</th>
        <td></td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.bombBrand') }}</th>
        <td></td>
    </tr>
    @endif
    <tr>
        <th>{{ __('custom.tankTrailer.pressure_test') }}</th>
        <td>{{ $vehicle->tankTrailer->pressure_test}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.max_pressure') }}</th>
        <td>{{ $vehicle->tankTrailer->max_pressure}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.minLPM') }}</th>
        <td>{{$vehicle->tankTrailer->minLPM}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.maxLPM') }}</th>
        <td>{{$vehicle->tankTrailer->maxLPM}}</td>
    </tr>
</table>
@endif
