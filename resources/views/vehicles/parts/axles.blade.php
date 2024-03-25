<div class="row my-4 text-center">
    <div class="col-sm-12 bg-custom text-white">
        <h5>{{ __('custom.general.n_tyres') }}, {{__('custom.brakesAxles') }}</h5>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-1">
        <label for="n_tyres">{{ __('custom.general.n_tyres') }}</label>
        <input name="n_tyres" id="n_tyres" class="form-control">
        {!! $errors->first('n_tyres', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-2">
        <label for="tyres">{{ __('custom.general.tyres') }}</label>
        <input name="tyres" id="tyres" class="form-control">
        {!! $errors->first('tyres', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-1">
        <label for="axles">{{ __('custom.general.axles') }}</label>
        <select class="form-control" id="axles" name="axles" onchange="ejes()">
            <option value="">Select....</option>
            <option value="1" {{ old('axles') == '1' ? "selected" : '' }}>1</option>
            <option value="2" {{ old('axles') == '2' ? "selected" : '' }}>2</option>
            <option value="3" {{ old('axles') == '3' ? "selected" : '' }}>3</option>
            <option value="4" {{ old('axles') == '4' ? "selected" : '' }}>4</option>
            <option value="5" {{ old('axles') == '5' ? "selected" : '' }}>5</option>
            <option value="6" {{ old('axles') == '6' ? "selected" : '' }}>6</option>
        </select>
    </div>
    <div class="form-group col-sm-1">
        <label for="config_axles">{{ __('custom.general.config_axles') }}</label>
        <select class="form-control" id="config_axles" name="config_axles">
            <option value="">Select....</option>
            <option value="4X2" {{ old('config_axles') == '4X2' ? "selected" : '' }}>4X2</option>
            <option value="4X4" {{ old('config_axles') == '4X4' ? "selected" : '' }}>4X4</option>
            <option value="6X2" {{ old('config_axles') == '6X2' ? "selected" : '' }}>6X2</option>
            <option value="6X4" {{ old('config_axles') == '6X4' ? "selected" : '' }}>6X4</option>
            <option value="6X6" {{ old('config_axles') == '6X6' ? "selected" : '' }}>6X6</option>
            <option value="8X2" {{ old('config_axles') == '8X2' ? "selected" : '' }}>8X2</option>
            <option value="8X4" {{ old('config_axles') == '8X4' ? "selected" : '' }}>8X4</option>
        </select>
    </div>
    <div class="form-group col-sm-2">
        <label for="axles_brand">{{ __('custom.general.axles_brand') }}</label>
        <input name="axles_brand" type="text" class="form-control" id="axles_brand" value="{{ $vehicle->axles_brand  ?? old('axles_brand') }}">
    </div>
    <div class="form-group col-sm-1">
        <label for="drive_axles">{{ __('custom.general.drive_axles') }}</label>
        <select class="form-control" id="drive_axles" name="drive_axles">
            <option value="">Select....</option>
            <option value="1" {{ old('drive_axles') == '1' ? "selected" : '' }}>1</option>
            <option value="2" {{ old('drive_axles') == '2' ? "selected" : '' }}>2</option>
        </select>
    </div>
    <div class="form-group col-sm-3">
        <label for="lifting_axle">{{ __('custom.axles.lifting_axle') }}</label>
        <input name="lifting_axle" type="text" class="form-control" id="lifting_axle" value="{{ $vehicle->lifting_axle  ?? old('lifting_axle') }}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-1">
        <label for="isDir">{{ __('custom.axles.isDir') }}</label>
        <select name="isDir[]" id="brake" class="form-control" default=1>
            <option value=1>si</option>
            <option value=0>no</option>
        </select>
    </div>
    <!--div class="form-group col-sm-2">
        <label for="isDouble">{{ __('custom.axles.isDouble') }}</label>
        <select name="isDouble[]" id="brake" class="form-control" default=0>
            <option value=0>no</option>
            <option value=1>yes</option>
        </select>
    </div>
    <div class="form-group col-sm-1">
        <label for="lifting_axle">{{ __('custom.axles.lifting_axle') }}</label>
        <select name="lifting_axle[]" id="lifting_axle" class="form-control" default=0>
            <option value=0>no</option>
            <option value=1>si</option>
        </select>
    </div-->
    <div class="form-group col-sm-2">
        <label for="brake">{{ __('custom.axles.brake') }}</label>
        <select name="brake[]" id="brake" class="form-control">
            <option value="">{{ __('custom.selectBrake') }}</option>
            <option value="tambor">tambor</option>
            <option value="disco">disco</option>
            <option value="neumatico">neumaticos</option>
        </select>
        {!! $errors->first('brake', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-2">
        <label for="suspension">{{ __('custom.axles.suspension') }}</label>
        <select name="suspension[]" id="suspension" class="form-control">
            <option value="">{{ __('custom.selectSuspension') }}</option>
            <option value="ballesta">ballesta</option>
            <option value="neumatica">neumatica</option>
        </select>
        {!! $errors->first('suspension', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-2">
        <label for="left_tyre">{{ __('custom.axles.left_tyre') }}</label>
        <input name="left_tyre[]" id="left_tyre" class="form-control">
        {!! $errors->first('left_tyre', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-2">
        <label for="right_tyre">{{ __('custom.axles.right_tyre') }}</label>
        <input name="right_tyre[]" id="right_tyre" class="form-control">
        {!! $errors->first('right_tyre', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-2">
        <label for="wheelbase">{{ __('custom.axles.wheelbase') }}</label>
        <input name="wheelbase[]" id="wheelbase" class="form-control" value="0" readonly>
        {!! $errors->first('wheelbase', '<span class=error>:message</span>') !!}
    </div>
</div>
<div id="numberOfAxles"></div>
<script type="application/javascript">
    function ejes(){
        $('#numberOfAxles').empty();
        var i;
        for (i = 0; i < $('#axles').val()-1; i++) {
            $("#numberOfAxles").append(`<div class="form-row"><div class="form-group col-sm-1"><label for="isDir">{{ __('custom.axles.isDir') }}</label><select name="isDir[]" id="isDir" class="form-control" default=0><option value=0>no</option><option value=1>yes</option></select></div><!--div class="form-group col-sm-1"><label for="lifting_axle">{{ __('custom.axles.lifting_axle') }}</label><select name="lifting_axle[]" id="lift_axle" class="form-control" default=0><option value=0>no</option><option value=1>yes</option></select></div><div class="form-group col-sm-2"><label for="isDouble">{{ __('custom.axles.isDouble') }}</label><select name="isDouble[]" id="double" class="form-control" default="no"><option value="no">no</option><option value="yes">yes</option></select></div--><div class="form-group col-sm-2"><label for="brake">{{ __('custom.axles.brake') }}</label><select name="brake[]" id="brake" class="form-control"><option value="">{{ __('custom.selectBrake') }}</option><option value="tambor">tambor</option><option value="disco">disco</option><option value="neumatico">neumatico</option></select>{!! $errors->first('brake', '<span class=error>:message</span>') !!}</div><div class="form-group col-sm-2"><label for="suspension">{{ __('custom.axles.suspension') }}</label><select name="suspension[]" id="suspension" class="form-control"><option value="">{{ __('custom.selectSuspension') }}</option><option value="ballesta">ballesta</option><option value="neumatica">neumatica</option></select>{!! $errors->first('suspension', '<span class=error>:message</span>') !!}</div><div class="form-group col-sm-2"><label for="left_tyre">{{ __('custom.axles.left_tyre') }}</label><input name="left_tyre[]" id="left_tyre" class="form-control">{!! $errors->first('left_tyre', '<span class=error>:message</span>') !!}</div><div class="form-group col-sm-2"><label for="right_tyre">{{ __('custom.axles.right_tyre') }}</label><input name="right_tyre[]" id="right_tyre" class="form-control">{!! $errors->first('right_tyre', '<span class=error>:message</span>') !!}</div><div class="form-group col-sm-2"><label for="wheelbase">{{ __('custom.axles.wheelbase') }} `+(i+1)+`-`+(i+2)+`</label><input name="wheelbase[]" id="wheelbase" class="form-control">{!! $errors->first('wheelbase', '<span class=error>:message</span>') !!}</div>`);
        }
    }
</script>
