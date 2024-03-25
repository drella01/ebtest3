@auth
<div class="form-row my-4">
    <div class="col">
        <a class="btn btn-primary btn-lg btn-block" type="button" id="edit" onclick="history.back()">Volver</a>
    </div>
    <div class="col">
        <input class="btn btn-primary btn-lg btn-block" type="submit" id="update" value="Update">
    </div>
    <div class="col">
        <a class="btn btn-primary btn-lg btn-block" type="button" href="{{ url('storage/pdf/'.$vehicle->registration.'.pdf') }}" target="_blank">View PDF</a>
    </div>
</div>
@endauth
