<div class="my-4" id="cabDetails">
    <div class="row my-4 text-center">
        <div class="col-sm-12 bg-custom text-white">
            <h5>{{__('custom.cab.cab')}}</h5>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-2">
            <label for="cab_type">{{__('custom.cab.cab_type')}}</label>
            <select name="cab_type" id="cab_type" class="form-control">
                <option value="">{{__('custom.cab.cab_type')}}</option>
                <option value="day" @if($vehicle->cab){{ $vehicle->cab->cab_type == 'day' ? "selected" : '' }} @endif>{{ __('custom.cab.day') }}</option>
                <option value="night" @if($vehicle->cab){{ $vehicle->cab->cab_type == 'night' ? "selected" : '' }} @endif>{{ __('custom.cab.night') }}</option>
            </select>
        </div>
        <div class="form-group col-sm-1">
            <label for="tachograph">{{__('custom.cab.tachograph')}}</label>
            <select name="tachograph" id="tachograph" class="form-control">
                <option value="">{{__('custom.cab.tachograph')}}</option>
                <option value="disc" @if($vehicle->cab){{ $vehicle->cab->tachograph == 'disc' ? "selected" : '' }} @endif>{{ __('custom.cab.disc') }}</option>
                <option value="digital" @if($vehicle->cab){{ $vehicle->cab->tachograph == 'digital' ? "selected" : '' }} @endif>{{ __('custom.cab.digital') }}</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label for="air_conditioning">{{__('custom.cab.air_conditioning')}}</label>
            <select name="air_conditioning" id="air_conditioning" class="form-control">
                <option value="">{{__('custom.cab.air_conditioning')}}</option>
                <option value="yes" @if($vehicle->cab){{ $vehicle->cab->air_conditioning == 'yes' ? "selected" : '' }} @endif>{{ __('custom.cab.yes') }}</option>
                <option value="no" @if($vehicle->cab){{ $vehicle->cab->air_conditioning == 'no' ? "selected" : '' }} @endif>{{ __('custom.cab.no') }}</option>
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label for="heat">{{__('custom.cab.heat')}}</label>
            <select name="heat" id="heat" class="form-control">
                <option value="">{{__('custom.cab.heat')}}</option>
                <option value="yes" @if($vehicle->cab){{ $vehicle->cab->air_conditioning == 'yes' ? "selected" : '' }} @endif>{{ __('custom.cab.yes') }}</option>
                <option value="no" @if($vehicle->cab){{ $vehicle->cab->air_conditioning == 'no' ? "selected" : '' }} @endif>{{ __('custom.cab.no') }}</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label for="seats">{{__('custom.cab.seats')}}</label>
            <input name="seats" id="seats" class="form-control" value={{ $vehicle->cab->seats  ?? old("seats") }}>
            {!! $errors->first('seats', '<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-sm-2">
            <label for="beds">{{__('custom.cab.beds')}}</label>
            <input name="beds" id="beds" class="form-control" value={{ $vehicle->cab->beds  ?? old("beds") }}>
            {!! $errors->first('beds', '<span class=error>:message</span>') !!}
        </div>
    </div>
</div>
