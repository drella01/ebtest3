<div class="my-4" id="tankTrailer" hidden>
    <div class="row my-4 text-center">
        <div class="col-sm-12 bg-custom text-white">
            <h5>{{__('custom.tank-trailer')}}</h5>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label" for="volume">Litros</label>
            <input type="text" name="volume" id="volume" class="form-control" value="{{ $vehicle->tankTrailer->volume ?? old('volume') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="compartments">Comp</label>
            <select class="form-control" id="compartments" name="compartments" onchange="tanks()">
                <option value="1" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '1' ? "selected" : '' }} @endif>1</option>
                <option value="2" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '2' ? "selected" : '' }} @endif>2</option>
                <option value="3" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '3' ? "selected" : '' }} @endif>3</option>
                <option value="4" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '4' ? "selected" : '' }} @endif>4</option>
                <option value="5" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '5' ? "selected" : '' }} @endif>5</option>
                <option value="6" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->compartments == '6' ? "selected" : '' }} @endif>6</option>
            </select>
        </div>

        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="tank_brand">{{__('custom.tankTrailer.brand')}}</label>
            <input type="text" name="tank_brand" id="tank_brand" class="form-control" value="{{ $vehicle->tankTrailer->tank_brand ?? old('tank_brand') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="madeof">{{__('custom.tankTrailer.madeof')}}</label>
            <input type="text" name="madeof" id="madeof" class="form-control" value="{{ $vehicle->tankTrailer->madeof ?? old('madeof') }}">
        </div>
        <div class="form-group mb-2 col-sm-4">
            <label class="col-form-label mx-2" for="containerType_id">Tipo de producto</label>
            <select name="containerType_id" id="containerType_id" class="select2 form-control" style="width: 100%">
            @foreach (App\Models\ContainerType::where('cargo_type','tank-trailer')->get() as $item)
                <option value={{$item->id}} @if($vehicle->tankTrailer()->count()){{$vehicle->tankTrailer->type->name == $item->name ? "selected" : '' }}@endif>{{__('custom.products.'.$item->name)}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group mb-2 col-sm-3">
            <label class="col-form-label mx-2" for="degassed">{{__('custom.tankTrailer.degassed')}}</label>
            <select class="form-control" id="degassed" name="degassed">
                <option value="">Seleccionar....</option>
                <option value="yes" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->degassed == 'yes' ? "selected" : '' }}@endif>Si</option>
                <option value="no" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->degassed == 'no' ? "selected" : '' }}@endif>No</option>
            </select>
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="pressure_test" class="col-form-label">{{__('custom.tankTrailer.pressure_test')}}</label>
            <input name="pressure_test" type="text" class="form-control" id="pressure_test" value="{{ $vehicle->tankTrailer->pressure_test ?? old('pressure_test') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="max_pressure" class="col-form-label">{{__('custom.tankTrailer.max_pressure')}}</label>
            <input name="max_pressure" type="text" class="form-control" id="max_pressure" value="{{ $vehicle->tankTrailer->max_pressure ?? old('max_pressure') }}">
        </div>

    </div>
    @include('vehicles.parts.comp-form')
    <div class="form-row">
        <div class="form-group mb-2 col-sm-2">
            <label for="counter" class="col-form-label">{{ __('custom.tankTrailer.counter') }}</label>
            @if (!$vehicle->tankTrailer()->count())
            <select class="form-control" id="counter" name="counter">
                <option value="">Select value....</option>
                <option value="yesA" {{ old('counter') == 'yesA' ? "selected" : '' }}>Si analogico</option>
                <option value="yesD" {{ old('counter') == 'yesD' ? "selected" : '' }}>Si digital</option>
                <option value="no" {{ old('counter') == 'no' ? "selected" : '' }}>No</option>
            </select>
            @else
            <select class="form-control" id="counter" name="counter">
                <option value="">Select value....</option>
                <option value="yesA" {{ $vehicle->tankTrailer->counter == 'yesA' ? "selected" : '' }}>Si analogico</option>
                <option value="yesD" {{ $vehicle->tankTrailer->counter == 'yesD' ? "selected" : '' }}>Si digital</option>
                <option value="no" {{ $vehicle->tankTrailer->counter == 'no' ? "selected" : '' }}>No</option>
            </select>
            @endif
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="bombBrand" class="col-form-label">{{__('custom.tankTrailer.bomb')}}</label>
            @if (!$vehicle->tankTrailer()->count())
            <select class="form-control" id="bomb" name="bomb">
                <option value="">Selecciona....</option>
                <option value="yes" {{ old('bomb') == 'yes' ? "selected" : '' }}>Si</option>
                <option value="no" {{ old('bomb') == 'no' ? "selected" : '' }}>No</option>
            </select>
            @else
            <select class="form-control" id="bomb" name="bomb">
                <option value="">Selecciona....</option>
                <option value="yes" {{ $vehicle->tankTrailer->bomb == 'yes' ? "selected" : '' }}>Si</option>
                <option value="no" {{ $vehicle->tankTrailer->bomb == 'no' ? "selected" : '' }}>No</option>
            </select>
            @endif
        </div>
        <div class="form-group mb-2 col-sm-4">
            <label for="bombBrand" class="col-form-label">{{__('custom.tankTrailer.bombBrand')}}</label>
            <input name="bombBrand" type="text" class="form-control" id="bombBrand" value="{{ $vehicle->tankTrailer->bombBrand ?? old('bombBrand') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="minLPM" class="col-form-label">Min litros</label>
            <input name="minLPM" type="text" class="form-control" id="minLPM" value="{{ $vehicle->tankTrailer->minLPM ?? old('minLPM') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="maxLPM" class="col-form-label">Max litros</label>
            <input name="maxLPM" type="text" class="form-control" id="maxLPM" value="{{ $vehicle->tankTrailer->maxLPM ?? old('maxLPM') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="hose">{{__('custom.tankTrailer.hose')}}</label>
            <select class="form-control" id="hose" name="hose">
                <option value="">Select value....</option>
                <option value="1" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->hose == '1' ? "selected" : '' }}@endif>1</option>
                <option value="2" @if($vehicle->tankTrailer()->count()){{ $vehicle->tankTrailer->hose == '2' ? "selected" : '' }}@endif>2</option>
            </select>
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="hose1Lenght" class="col-form-label">{{__('custom.tankTrailer.hose1Lenght')}}</label>
            <input type="text" name="hose1Lenght" id="hose1Lenght" class="form-control" value="{{ $vehicle->tankTrailer->hose1Lenght ?? old('hose1Lenght') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="hose1Diameter" class="col-form-label">{{__('custom.tankTrailer.hose1Diameter')}}</label>
            <input type="text" name="hose1Diameter" id="hose1Diameter" class="form-control" value="{{ $vehicle->tankTrailer->hose1Diameter ?? old('hose1Diameter') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="hose2Lenght" class="col-form-label">{{__('custom.tankTrailer.hose2Lenght')}}</label>
            <input name="hose2Lenght" type="text" class="form-control" id="hose2Lenght" value="{{ $vehicle->tankTrailer->hose2Lenght ?? old('hose2Lenght') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="hose2Diameter" class="col-form-label">{{__('custom.tankTrailer.hose2Diameter')}}</label>
            <input name="hose2Diameter" type="text" class="form-control" id="hose2Diameter" value="{{ $vehicle->tankTrailer->hose2Diameter ?? old('hose2Diameter') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group mb-2 col-sm-2">
            <label for="thickness" class="col-form-label">{{__('custom.tankTrailer.thickness')}}</label>
            <input type="text" name="thickness" id="thickness" class="form-control" value="{{ $vehicle->tankTrailer->thickness ?? old('thickness') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="insulation" class="col-form-label">{{__('custom.tankTrailer.insulation')}}</label>
            <input type="text" name="insulation" id="insulation" class="form-control" value="{{ $vehicle->tankTrailer->insulation ?? old('insulation') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="heating" class="col-form-label">{{__('custom.tankTrailer.heating')}}</label>
            <input name="heating" type="text" class="form-control" id="heating" value="{{ $vehicle->tankTrailer->heating ?? old('heating') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label for="heating_type" class="col-form-label">{{__('custom.tankTrailer.heating_type')}}</label>
            <input name="heating_type" type="text" class="form-control" id="heating_type" value="{{ $vehicle->tankTrailer->heating_type ?? old('heating_type') }}">
        </div>
    </div>
</div>

<script type="application/javascript">
    function tanks(){
        var x = $('#compartments').val();
        switch(x){
            case "1":
                $('#liters2').attr('hidden', true);
                $('#liters3').attr('hidden', true);
                $('#liters4').attr('hidden', true);
                $('#liters5').attr('hidden', true);
                $('#liters6').attr('hidden', true);
                break;
            case "2":
                $('#liters2').attr('hidden', false);
                $('#liters3').attr('hidden', true);
                $('#liters4').attr('hidden', true);
                $('#liters5').attr('hidden', true);
                $('#liters6').attr('hidden', true);
                break;
            case "3":
                $('#liters2').attr('hidden',false);
                $('#liters3').attr('hidden',false);
                $('#liters4').attr('hidden', true);
                $('#liters5').attr('hidden', true);
                $('#liters6').attr('hidden', true);
                break;
            case "4":
                $('#liters2').attr('hidden',false);
                $('#liters3').attr('hidden',false);
                $('#liters4').attr('hidden',false);
                $('#liters5').attr('hidden', true);
                $('#liters6').attr('hidden', true);
                break;
            case "5":
                $('#liters2').attr('hidden',false);
                $('#liters3').attr('hidden',false);
                $('#liters4').attr('hidden',false);
                $('#liters5').attr('hidden',false);
                $('#liters6').attr('hidden', true);
                break;
            case "6":
                $('#liters2').attr('hidden',false);
                $('#liters3').attr('hidden',false);
                $('#liters4').attr('hidden',false);
                $('#liters5').attr('hidden',false);
                $('#liters6').attr('hidden',false);
                break;
            default:
                // code block
        }
    }

    function isTank(){
        if ($('#type_id').val()=='3') {
            $('#tankTrailer').attr('hidden',false);
        } else {
            $('#tankTrailer').attr('hidden',true);
        }
        if ($('#type_id').val()=='2' || $('#type_id').val()=='9' || $('#type_id').val()=='7') {
            $("#fifth_wheel_height").attr('disabled',false);
            $("#bolt_diameter").attr('disabled',false);
            //$("#cargo_type").val('trailer');
            $("#cargo_type").attr('disabled',true);
        } else {
            $("#fifth_wheel_height").attr('disabled',true);
            $("#bolt_diameter").attr('disabled',true);
            $("#cargo_type").attr('disabled',false);
        }
    }
</script>
