
<div class="form-group col-md-6 col-offset-3">
    <label for="description">{{ __('custom.general.description') }}</label>
    <textarea class="form-control" name=description cols="30" rows="5">{{ $part->description  ?? old('description') }}</textarea>
</div>
