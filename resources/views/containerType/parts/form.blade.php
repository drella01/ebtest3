
<div class="form-group col-md-6">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ $container->name ?? old('name') }}">
    {!! $errors->first('name', '<span class=error>:message</span>') !!}
</div>
<div class="form-group col-sm-3">
    <select id="cargo_type" name="cargo_type" class="form-control select2">
        <option value='' selected>Choose...</option>
        <option value= 'tank-trailer' {{ $container->cargo_type == 'tank-trailer' ? "selected" : '' }}>{{ __('custom.tank-trailer') }}</option>
        <option value= 'trailer' {{ $container->cargo_type == 'trailer' ? "selected" : '' }}>{{ __('custom.trailer') }}</option>
    </select>
    {!! $errors->first('cargo_type', '<span class=error>:message</span>') !!}
</div>
<button type="submit" class="btn btn-primary">{{ $customBtn ?? 'Crear'}}</button>

