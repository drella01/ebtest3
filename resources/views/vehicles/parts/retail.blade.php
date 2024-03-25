<div class="row my-4 text-center">
    <div class="col-sm-12 bg-custom text-white">
        <!--h5>{{__('custom.tank-trailer')}}</h5-->
        <h5>Datos comerciales</h5>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-sm-2">
        <label for="buy_date">Fecha de compra</label>
        <input name='buy_date' type="date" class="form-control" id="buy_date" value="{{ $vehicle->buy_date ?? old('buy_date') }}" placeholder="buy date">
        @error('buy_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-2">
        <label for="buy_price">Precio de compra</label>
        <input name='buy_price' type="text" class="form-control" id="buy_price" value="{{ $vehicle->buy_price ?? old('buy_price') }}" placeholder="buy price">
        @error('buy_price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-2">
        <label for="sale_price">Precio de venta</label>
        <input name='sale_price' type="text" class="form-control" id="sale_price" value="{{ $vehicle->sale_price ?? old('sale_price') }}" placeholder="sale price">
        @error('sale_price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-2">
        <label for="sale_date">Fecha de venta</label>
        <input name='sale_date' type="date" class="form-control" id="sale_date" value="{{ $vehicle->sale_date ?? old('sale_date') }}" placeholder="sale date">
        @error('sale_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-2">
        <label for="client_id">Cliente</label>
        <input name='client_id' type="text" class="form-control" id="client_id" value="{{ $vehicle->client_id ?? old('client_id') }}" placeholder="cliente">
        @error('client_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-sm-2">
        <label for="rent_price">Alquiler por mes</label>
        <input name="rent_price" type="text" class="form-control" id="rent_price" placeholder="rent price">
        {!! $errors->first('rent_price', '<span class=alert-danger>:message</span>') !!}
    </div>
</div>
