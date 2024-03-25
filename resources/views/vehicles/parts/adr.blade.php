<div class="row my-4 text-center" id="adrTitle" hidden>
    <div class="col-sm-12 bg-custom text-white">
        <h5>{{ __('custom.general.adr') }}</h5>
    </div>
</div>
<div class="form-row" id="adrItems" hidden>
    <div class="form-group col-sm-2">
        <label for="adr_code">{{__('custom.adr_code')}}</label>
        <input name="adr_code" id="adr_code" class="form-control" value="{{ $vehicle->adr()->first()->adr_code  ?? old('adr_code') }}">
        {!! $errors->first('adr_code', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="adr_class">{{__('custom.adr_class')}}</label>
        <input name="adr_class" id="adr_class" class="form-control" value="{{ $vehicle->adr()->first()->adr_class  ?? old('adr_class') }}">
        {!! $errors->first('adr_class', '<span class=error>:message</span>') !!}
    </div>
    <!--div class="form-group col-sm-2">
        <label for="date_from">{{__('custom.date_from')}}</label>
        <input type="date" name="date_from" id="date_from" class="form-control">
        {!! $errors->first('date_from', '<span class=error>:message</span>') !!}
    </div-->
    <div class="form-group col-md-6">
        <label for="date_to">{{__('custom.date_to')}}</label>
        <input type="date" name="date_to" id="date_to" class="form-control" value="{{ $vehicle->adr()->first()->date_to  ?? old('date_to') }}">
        {!! $errors->first('date_to', '<span class=error>:message</span>') !!}
    </div>
</div>
<script type="application/javascript">
    function adrfn(){
        if($('#adr').val()=='yes'){
            $('#adrTitle').prop('hidden',false);
            $('#adrItems').prop('hidden',false);
        }else{
            $('#adrTitle').prop('hidden',true);
            $('#adrItems').prop('hidden',true);
        };
    }
</script>
