<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            font-size: 10px;
            height: 100vh;
            margin: 20px;
        }
        td{ color:#325ea9;
            font-weight: bold;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!--img src="{{ public_path('storage/transler.jpg') }}" style="max-width: 100%" alt="Logo"-->
        </nav>
        <table class="table table-bordered table-xl">
            <tr>
                <td class="text-center"><h2>{{ strtoupper(__('custom.'.$vehicle->type->name))}}</h2></td>
                <td class="text-center"><h2>{{ ucfirst(__('custom.details.registration'))}}</h2></td>
                <td class="text-center"><h2>{{ $vehicle->registration }}</h2></td>
            </tr>
        </table>
    </header>
    <div class="row">
        <div class="col-md-12">
            <h5>{{ __('custom.general_data') }}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.general.reference') }}</th>
                    <td> {{ $vehicle->reference }}</td>
                    <th>{{ __('custom.details.brand') }}</th>
                    <td> {{ ucfirst($vehicle->brand) }}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.details.model') }}</th>
                    <td> {{ $vehicle->model }}</td>
                    <th>{{ __('custom.general.chassis_number') }}</th>
                    <td> {{ $vehicle->chassis_number }}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.details.reg_date') }}</th>
                    <td> {{ date('d-m-Y', strtotime($vehicle->reg_date)) }}</td>
                    <th>{{ __('custom.general.kms') }}</th>
                    <td> {{ $vehicle->kms }}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.general.large') }} {{ __('custom.general.width') }} {{ __('custom.general.height') }} mm.</th>
                    <td colspan="3">{{$vehicle->large}}x{{$vehicle->width}}x{{$vehicle->height}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5>Mecanica</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.general.power') }}</th>
                    <td> {{ $vehicle->power }}</td>
                    <th>Cilindrada</th>
                    <td>{{$vehicle->engine_displacement}}</td>
                    <!--th>{{ __('custom.general.euro_standard') }}</th>
                    <td> {{ $vehicle->euro_standard }}</td-->
                </tr>
                <tr>
                    <th>Número de marchas</th>
                    <td> {{ $vehicle->n_gears }}</td>
                    <th>{{ __('custom.general.gearbox') }}</th>
                    <td> {{ $vehicle->gearbox }}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.general.aluminum_rims') }}</th>
                    @if ($vehicle->aluminum_rims)
                    <td> {{ __('custom.general.'.$vehicle->aluminum_rims) }}</td>
                    @else
                    <td>N/D</td>
                    @endif
                    <th>{{ __('custom.general.abs') }}</th>
                    <td>{{ strtoupper(__('custom.general.'.$vehicle->abs)) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5>{{ __('custom.chassis_features') }}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.general.tara') }} (Kg)</th>
                    <td>{{$vehicle->tara}}</td>
                    <th>{{ __('custom.general.mma') }} (Kg)</th>
                    <td>{{$vehicle->mma}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.general.wheelbase') }}</th>
                    <td>{{$vehicle->axlesDetail->pluck('wheelbase')->join('','-','-')}}</td>
                    <th>{{ __('custom.general.chassis_height') }}</th>
                    <td>{{ $vehicle->chassis_height }}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.general.kingpin_height') }}</th>
                    <td>{{ $vehicle->kingpin_height}}</td>
                    <th>{{ __('custom.general.bolt_diameter') }}</th>
                    <td>{{ $vehicle->bolt_diameter }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5>{{ __('custom.general.tyres') }}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>Medidas</th>
                    <td>{{$vehicle->tyres}}</td>
                    <th>Numero</th>
                    <td>{{$vehicle->n_tyres}}</td>
                </tr>
                @foreach ($vehicle->axlesDetail as $key=>$axle )
                <tr>
                    <td colspan="4" style="padding: 0%">
                        <table class="table mb-0 table-sm">
                            <tr>
                                <td style="color:#636b6f">{{__('custom.axle')}} {{$key+1}}</td>
                                <td style="color:#636b6f">{{__('custom.axles.left_tyre')}}</td>
                                <td>{{$axle->left_tyre}}</td>
                                <td style="color:#636b6f">{{__('custom.axles.right_tyre')}}</td>
                                <td>{{$axle->right_tyre}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5>{{__('custom.brakesAxles')}}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{__('custom.general.axles')}}</th>
                    <td>{{ $vehicle->axles}}</td>
                    <th>{{__('custom.general.axles_brand')}}</th>
                    <td>{{ ucfirst(strtolower($vehicle->axles_brand))}}</td>
                </tr>
                <tr>
                    <th>{{__('custom.general.config_axles')}}</th>
                    <td>{{ $vehicle->config_axles}}</td>
                    <th>{{__('custom.general.drive_axles')}}</th>
                    <td>{{ $vehicle->drive_axles}}</td>
                </tr>
                <tr>
                    <th>{{__('custom.axles.brake')}}</th>
                    <td colspan="3" style="padding: 0%">
                        <table class="table mb-0 table-sm">
                        @foreach ($vehicle->axlesDetail as $key=>$axle )
                            <td style="color:#636b6f">{{__('custom.axle')}} {{$key+1}}</td>
                            <td>{{ $axle->brake}}</td>
                        @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <th>{{__('custom.axles.suspension')}}</th>
                    <td colspan="3" style="padding: 0%">
                        <table class="table mb-0 table-sm">
                            @foreach ($vehicle->axlesDetail as $key=>$axle )
                                <th>{{__('custom.axle')}} {{$key+1}}</th>
                                <td>{{ $axle->suspension}}</td>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        @if ($vehicle->cab)
        <div class="col-md-12">
            <h5>{{ __('custom.cab.cab') }}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.cab.cab_type') }}</th>
                    @if($vehicle->cab->cab_type)
                    <td> {{ __('custom.cab.'.$vehicle->cab->cab_type) }}</td>
                    @else
                    <td>N/D</td>
                    @endif
                    <th>{{ __('custom.cab.air_conditioning') }}</th>
                    <td>{{ __('custom.cab.'.$vehicle->cab->air_conditioning) }}</td>
                    <th>{{ __('custom.cab.tachograph') }}</th>
                    <td>{{ $vehicle->cab->tachograph  }}</td>
                    <th>{{ __('custom.cab.seats') }}</th>
                    <td>{{ $vehicle->cab->seats  }}</td>
                </tr>
            </table>
        </div>
        @endif
    </div>
    <div class="row">
        @if ($vehicle->adr()->count())
        <div class="col-md-12">
            <h5>{{ __('custom.general.adr') }}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.general.adr') }}</th>
                    <td> {{ __('custom.cab.'.$vehicle->adr) }}</td>
                    <th>{{ __('custom.adr_code') }}</th>
                    <td>{{ $vehicle->adr()->first()->adr_code}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.date_to') }}</th>
                    @if ($vehicle->adr()->first()->date_to)
                    <td>{{ date('d-m-Y',strtotime($vehicle->adr()->first()->date_to)) }}</td>
                    @else
                    <td>-----------</td>
                    @endif
                    <th>{{ __('custom.adr_class') }}</th>
                    <td>{{ $vehicle->adr()->first()->adr_class }}</td>
                </tr>
            </table>
        </div>
        @endif
    </div>
    <div class="row">
        @if ($vehicle->tankTrailer)
        <div class="col-md-12">
            <h5>{{ __('custom.tank-trailer') }}</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.tankTrailer.volume') }}</th>
                    <td>{{ $vehicle->tankTrailer->volume }}</td>
                    <th>{{ __('custom.tankTrailer.compartments') }}</th>
                    <td>{{ $vehicle->tankTrailer->compartments }}</td>
                </tr>
                <tr>
                    <th>Capacidad</th>
                    <td colspan="1" style="padding: 0%">
                        <table class="table mb-0 table-sm">
                            <tr>
                                @for ($x=1;$x<=$vehicle->tankTrailer->compartments;$x++)
                                <td>{{$x}}:{{$vehicle->tankTrailer->{"liters".$x} }}</td>
                                @endfor
                            </tr>
                        </table>
                    </td>
                    <th>{{ __('custom.tankTrailer.madeof') }}</th>
                    <td>{{ucfirst(strtolower($vehicle->tankTrailer->madeof))}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.tankTrailer.pressure_test') }}</th>
                    <td>{{$vehicle->tankTrailer->pressure_test}}</td>
                    <th>{{ __('custom.tankTrailer.max_pressure') }}</th>
                    <td>{{$vehicle->tankTrailer->max_pressure}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.tankTrailer.bombBrand') }}</th>
                    <td>{{ $vehicle->tankTrailer->bombBrand }} </td>
                    @if ($vehicle->tankTrailer->counter)
                    <th>{{ __('custom.tankTrailer.counter') }}</th>
                    <td>{{ __('custom.tankTrailer.'.$vehicle->tankTrailer->counter)}}</td>
                    @else
                    <th>{{ __('custom.tankTrailer.counter') }}</th>
                    <td>N/D</td>
                    @endif
                </tr>
                <tr>
                    <th>{{ __('custom.tankTrailer.minLPM')}} - {{__('custom.tankTrailer.maxLPM') }}</th>
                    <td>{{$vehicle->tankTrailer->minLPM}} - {{ $vehicle->tankTrailer->maxLPM}}</td>
                    <th>{{ __('custom.tankTrailer.hose') }}</th>
                    <td>{{$vehicle->tankTrailer->hose}}. Largo ({{$vehicle->tankTrailer->hose1Lenght}} - {{$vehicle->tankTrailer->hose2Lenght}} metros)</td>
                </tr>
                <tr>
                    @if ($vehicle->tankTrailer->degassed)
                    <th>{{ __('custom.tankTrailer.degassed') }}</th>
                    <td>{{ __('custom.general.'.$vehicle->tankTrailer->degassed) }}</td>
                    <th>{{ __('custom.tankTrailer.fuel') }}</th>
                    <td>{{ucwords($vehicle->tankTrailer->types->pluck('name')->join(', ', ' y '))}}</td>
                    @else
                    <th>{{ __('custom.tankTrailer.degassed') }}</th>
                    <td>N/D</td>
                    <th>{{ __('custom.tankTrailer.fuel') }}</th>
                    <td>N/D</td>
                    @endif
                </tr>
                <tr>
                    <th>{{ __('custom.tankTrailer.thickness')}}</th>
                    <td>{{$vehicle->tankTrailer->thickness}}</td>
                    <th>{{ __('custom.tankTrailer.heating') }}</th>
                    <td>{{$vehicle->tankTrailer->heating}}</td>
                </tr>
                <tr>
                    <th>{{ __('custom.tankTrailer.heating_type') }}</th>
                    <td>{{$vehicle->tankTrailer->heating_type}}</td>
                    <th>{{ __('custom.tankTrailer.insulation') }}</th>
                    <td>{{$vehicle->tankTrailer->insulation}}</td>
                </tr>
            </table>
        </div>
        @endif
    </div>
    @auth
    <div class="row">
        <div class="col-md-12">
            <h5>Datos comerciales</h5>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>{{ __('custom.providers.provider') }}</th>
                    <td>{{ $vehicle->provider->name }}</td>
                    <th>{{ __('custom.price.buy_date') }}</th>
                    <td>{{ date('d-m-Y',strtotime($vehicle->buy_date)) }}</td>
                    <th>{{ __('custom.price.buy_price') }}</th>
                    <td>{{ $vehicle->buy_price }}€</td>
                </tr>
                <tr>
                    <th>{{ __('custom.price.client') }}</th>
                    <td>{{ $vehicle->client }}</td>
                    <th>{{ __('custom.price.sale_date') }}</th>
                    @if ($vehicle->sale_date)
                    <td>{{ date('d-m-Y',strtotime($vehicle->sale_date)) }}</td>
                    @else
                    <td>----------</td>
                    @endif
                    <th>{{ __('custom.price.sale_price') }}</th>
                    <td>{{ $vehicle->sale_price }}€</td>
                </tr>
            </table>
        </div>
    </div>
    @endauth
</body>
</html>
