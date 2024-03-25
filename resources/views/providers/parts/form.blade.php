@csrf
<p>
    <hr style="border-top: 2px solid #d3d3d3">
</p>
<div class="form-row">
    <div class="form-group col-sm-3">
        <label for="name">Tipo</label>
        <select name="type" id="type" class="form-control">
            <option value="">{{ __('custom.providers.type') }}</option>
            <option value="advertisements" @if($provider->type){{ $provider->type == 'advertisements' ? "selected" : "" }} @endif>{{ __('custom.providers.advertisements') }}</option>
            <option value="vehicles" @if($provider->type){{ $provider->type == 'vehicles' ? "selected" : "" }}@endif>{{ __('custom.providers.vehicles') }}</option>
        </select>
        {!! $errors->first('type', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-6">
        <label for="name">Nombre y Apellidos</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y apellidos" value="{{ $provider->name ?? old('name') }}">
        {!! $errors->first('name', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-sm-3">
        <label for="vat">DNI / CIF</label>
        <input type="text" class="form-control" name="vat" id="vat" placeholder="Dni" value="{{ $provider->vat ?? old('vat') }}">
        {!! $errors->first('vat', '<span class=error>:message</span>') !!}
    </div>
</div>
<div class="form-group">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" name="address" id="address" value="{{ $provider->address ?? old('address') }}">
    {!! $errors->first('address', '<span class=error>:message</span>') !!}
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="phone1">Teléfono 1</label>
        <input type="text" class="form-control" name="phone1" id="phone1" placeholder="Teléfono Uno" value="{{ $provider->phone1 ?? old('phone1') }}">
        {!! $errors->first('phone1', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="phone2">Teléfono 2</label>
        <input type="text" class="form-control" name="phone2" id="phone2" placeholder="Teléfono Dos" value="{{ $provider->phone2 ?? old('phone2') }}">
        {!! $errors->first('phone2', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="email">e-Mail</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{ $provider->email ?? old('email') }}">
        {!! $errors->first('email', '<span class=error>:message</span>') !!}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="city">Población</label>
        <input type="text" name="city" class="form-control" id="city" value="{{ $provider->city ?? old('city') }}">
        {!! $errors->first('city', '<span class=error>:message</span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="province">Provincia</label>
        <select id="province" name="province" class="form-control select2">
            <option value='' selected>Choose...</option>
            @foreach (App\Models\Province::all() as $province)
            <option value={{$province->key}}>{{$province->key}} - {{$province->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="postal_code">Código Postal</label>
        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $provider->postal_code ?? old('postal_code') }}">
        {!! $errors->first('postal_code', '<span class=error>:message</span>') !!}
    </div>
</div>
<div>
    <hr style="border-top: 2px solid #d3d3d3">
</div>
<button type="submit" class="btn btn-primary">{{ $customBtn ?? 'Sign in'}}</button>
