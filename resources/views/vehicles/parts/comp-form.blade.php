<div class="row">
    <div class="col-sm-2 form-inline" id="liters1">
        <input type="text" name="comp1" id="comp1" readonly value="Comp 1" class="form-control-plaintext">
        <input type="text" name="liters1" class="form-control" value="{{ $vehicle->tankTrailer->liters1 ?? old('liters1') }}">
    </div>
    <div class="col-sm-2 form-inline" id="liters2">
        <input type="text" name="comp2" id="comp2" readonly value="Comp 2" class="form-control-plaintext">
        <input type="text" name="liters2" class="form-control" value="{{ $vehicle->tankTrailer->liters2 ?? old('liters2') }}">
    </div>
    <div class="col-sm-2 form-inline" id="liters3">
        <input type="text" name="comp3" id="comp3" readonly value="Comp 3" class="form-control-plaintext">
        <input type="text" name="liters3" class="form-control" value="{{ $vehicle->tankTrailer->liters3 ?? old('liters3') }}">
    </div>
    <div class="col-sm-2 form-inline" id="liters4">
        <input type="text" name="comp4" id="comp4" readonly value="Comp 4" class="form-control-plaintext">
        <input type="text" name="liters4" class="form-control" value="{{ $vehicle->tankTrailer->liters4 ?? old('liters4') }}">
    </div>
    <div class="col-sm-2 form-inline" id="liters5">
        <input type="text" name="comp5" id="comp5" readonly value="Comp 5" class="form-control-plaintext">
        <input type="text" name="liters5" class="form-control" value="{{ $vehicle->tankTrailer->liters5 ?? old('liters5') }}">
    </div>
    <div class="col-sm-2 form-inline" id="liters6">
        <input type="text" name="comp6" id="comp6" readonly value="Comp 6" class="form-control-plaintext">
        <input type="text" name="liters6" class="form-control" value="{{ $vehicle->tankTrailer->liters6 ?? old('liters6') }}">
    </div>
</div>
