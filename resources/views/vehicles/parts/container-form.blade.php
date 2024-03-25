<div class="my-4" id="containerDetails" hidden>
    <div class="row my-4 text-center">
        <div class="col-sm-12 bg-custom text-white">
            <h5>{{ __('custom.trailer_details') }}</h5>
        </div>
    </div>
    <div class="form-row">

        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="container_tank_brand">{{__('custom.general.brand')}}</label>
            <input type="text" name="container_tank_brand" id="container_tank_brand" class="form-control" value="{{ $vehicle->tankTrailer->tank_brand ?? old('tank_brand') }}">
        </div>
        <div class="form-group mb-2 col-sm-2">
            <label class="col-form-label mx-2" for="container_madeof">{{__('custom.tankTrailer.madeof')}}</label>
            <input type="text" name="container_madeof" id="container_madeof" class="form-control" value="{{ $vehicle->tankTrailer->madeof ?? old('madeof') }}">
        </div>
        <div class="form-group mb-2 col-sm-4">
            <label class="col-form-label mx-2" for="2containerType_id">Tipo de carrocería</label>
            <select name="2containerType_id" id="2containerType_id" class="select2 form-control" style="width: 100%">
            @foreach (App\Models\ContainerType::where('cargo_type','trailer')->get() as $item)
                <option value={{$item->id}} @if($vehicle->tankTrailer){{$vehicle->tankTrailer->type->name == $item->name ? "selected" : '' }}@endif>{{__('custom.products.'.$item->name)}}</option>
            @endforeach
            </select>
        </div>
        <!-- cambios formulario -->

        <div class="form-group col-sm-3">
            <label for="container_large">Largo</label>
            <input name="container_large" id="container_large" class="form-control" value={{ $vehicle->tankTrailer->large  ?? old("container_large") }}>
            {!! $errors->first('container_large', '<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-sm-3">
            <label for="container_width">Ancho</label>
            <input name="container_width" id="container_width" class="form-control" value={{ $vehicle->tankTrailer->width  ?? old("container_width") }}>
            {!! $errors->first('container_width', '<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-sm-3">
            <label for="container_height">Alto</label>
            <input name="container_height" id="container_height" class="form-control" value={{ $vehicle->tankTrailer->height  ?? old("container_height") }}>
            {!! $errors->first('container_height', '<span class=error>:message</span>') !!}
        </div>
        <div class="form-group col-sm-3">
            <label for="floor_height">{{ __('custom.tankTrailer.floor_height')}}</label>
            <input name="floor_height" id="floor_height" class="form-control" value={{ $vehicle->tankTrailer->floor_height  ?? old("floor_height") }}>
            {!! $errors->first('floor_height', '<span class=error>:message</span>') !!}
        </div>
    </div>
</div>
