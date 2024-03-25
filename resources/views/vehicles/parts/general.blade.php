<div class="bg-custom text-white text-center py-2">
    <h2>{{ __('custom.general_data') }}</h2>
</div>
<div class="form-row">
    @foreach ($FIELDS as $item)
        @if ($item == 'created_at' ?: $item == 'updated_at' ?: $item == 'id' ?: $item == 'sale_price'?: $item == 'rent_price'?: $item == 'n_tyres'?: $item == 'tyres')
        @elseif ($item == 'description')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <textarea class="form-control" name={{$item}} cols="30" rows="5">{{ $vehicle->$item  ?? old($item) }}</textarea>
            </div>
        @elseif ($item == 'type_id')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <select name="{{$item}}" id={{$item}} class="form-control">
                    <option value="">{{ __('custom.selectType') }}</option>
                    @foreach ($types as $type)
                    <option value={{ $type->id }} {{ $vehicle->type_id == $type->id ? "selected" : '' }}>{{ __('custom.'.$type->name) }}</option>
                    @endforeach
                </select>
            </div>
        @elseif ($item == 'cargo_type')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.tank-trailer') }} o {{__('custom.trailer')}}</label>
                <select name={{$item}} id={{$item}} class="form-control">
                    <option value="">{{ __('custom.selectType') }}</option>
                    <option value= 'tank-trailer'  {{ $vehicle->cargo_type == 'tank-trailer' ? "selected" : '' }}>{{ __('custom.tank-trailer') }}</option>
                    <option value= 'trailer' {{ $vehicle->cargo_type == 'trailer' ? "selected" : '' }}>{{ __('custom.trailer') }}</option>
                    <option value= 'trailer' {{ $vehicle->cargo_type == 'trailer' ? "selected" : '' }}>{{__('custom.drawbar-trailer')}}</option>
                </select>
            </div>
        @elseif ($item == 'provider_id')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <select name="provider_id" class="form-control">
                    <option value="">{{ __('custom.selectProvider') }}</option>
                    @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}" {{ $vehicle->provider_id == $provider->id ? "selected" : '' }}>{{ strtoupper($provider->name) }}</option>
                    @endforeach
                </select>
                @error('provider_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        @elseif ($item == 'gearbox')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <select class="form-control" id="gearbox" name="gearbox">
                    <option value="">Select....</option>
                    <option value="manual" {{ $vehicle->gearbox == 'manual' ? "selected" : "" }}>Manual</option>
                    <option value="automatic" {{ $vehicle->gearbox == 'automatic' ? "selected" : "" }}>Automático</option>
                    <option value="semiautomatic" {{ $vehicle->gearbox == 'semiautomatic' ? "selected" : "" }}>Semiautomático</option>
                </select>
            </div>
        @elseif ($item == 'axles')
        @elseif ($item == 'config_axles')
        @elseif ($item == 'axles_brand')
        @elseif ($item == 'drive_axles')
        @elseif ($item == 'adr')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <select class="form-control" id="adr" name="adr" onchange="adrfn()">
                    <option value="">Select....</option>
                    <option value="yes" {{ $vehicle->adr == 'yes' ? "selected" : "" }}>Si</option>
                    <option value="no" {{ $vehicle->adr == 'no' ? "selected" : "" }}>No</option>
                </select>
            </div>
        @elseif ($item == 'reg_date')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <input name="{{$item}}" type="date" class="form-control" id="{{$item}}" value="{{ $vehicle->$item  ?? old($item) }}">
                {!! $errors->first($item, '<div class="alert-danger text-center">:message</div>') !!}
            </div>
        @elseif ($item == 'abs')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <select class="form-control" id="abs" name="abs">
                    <option value="">Select....</option>
                    <option value="yes" {{ $vehicle->abs == 'yes' ? "selected" : "" }}>Si</option>
                    <option value="no" {{ $vehicle->abs == 'no' ? "selected" : "" }}>No</option>
                </select>
            </div>
        @elseif ($item == 'aluminum_rims')
        <div class="form-group col-sm-3">
            <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
            <select class="form-control" id="aluminum_rims" name="aluminum_rims">
                <option value="">Select....</option>
                <option value="yes" {{ $vehicle->aluminum_rims == 'yes' ? "selected" : "" }}>Si</option>
                <option value="no" {{ $vehicle->aluminum_rims == 'no' ? "selected" : "" }}>No</option>
            </select>
        </div>
        @elseif ($item == 'break_retarder')
        <div class="form-group col-sm-3">
            <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
            <select class="form-control" id="break_retarder" name="break_retarder">
                <option value="">Select....</option>
                <option value="yes" {{ $vehicle->break_retarder == 'yes' ? "selected" : "" }}>Si</option>
                <option value="no" {{ $vehicle->break_retarder == 'no' ? "selected" : "" }}>No</option>
            </select>
        </div>
        @elseif ($item == 'differential_lock')
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <select class="form-control" id="differential_lock" name="differential_lock">
                    <option value="">Select....</option>
                    <option value="yes" {{ $vehicle->differential_lock == 'yes' ? "selected" : "" }}>Si</option>
                    <option value="no" {{ $vehicle->differential_lock == 'no' ? "selected" : "" }}>No</option>
                </select>
            </div>
        @else
            <div class="form-group col-sm-3">
                <label for="{{$item}}">{{ __('custom.general.'.$item) }}</label>
                <input name="{{$item}}" type="text" class="form-control" id="{{$item}}" value="{{ $vehicle->$item  ?? old($item) }}">
                {!! $errors->first($item, '<div class="alert-danger text-center">:message</div>') !!}
            </div>
        @endif
    @endforeach
</div>
