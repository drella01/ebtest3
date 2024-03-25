<div class="row my-4 text-center">
    <div class="col-sm-12 bg-custom text-white">
        <h5>Fotos y otros documentos</h5>
    </div>
</div>
<div class="form-group">
    <label for="photo[]">Photo input</label>
    <input type="file" class="form-control-file" name="photo[]" accept="image/*" multiple required>
    {!! $errors->first('photo[]', '<span class=alert-danger>:message</span>') !!}
</div>
<div class="form-group">
    <label for="document[]">Docs input</label>
    <input type="file" class="form-control-file" name="document[]" multiple>
</div>
