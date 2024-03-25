<div class="container">
    <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Galería de fotos</h1>
    <hr class="mt-2 mb-5">
    @error('photo')
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @enderror
    @if (session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif
    <div class="row text-center text-lg-start">
        @foreach ($photos as $photo)
            <div class="col-lg-3 col-md-4 col-6 ">
                <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                    @csrf
                    <input type="submit" class="close" value="&times;">
                </form>
                <input type="radio">
                <img class="img-fluid img-thumbnail" src="{{ asset($photo->url) }}" alt="">
            </div>
        @endforeach
    </div>
    <div class="row">
        <form action="{{ route('photos.store', $vehicle)}}" class="form-inline" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo[]">Photo input</label>
                <input type="hidden" name="vehicle_id" value={{$vehicle->id}}>
                <input type="file" class="form-control-file" name="photo[]" accept="image/*" multiple required>
                {!! $errors->first('photo[]', '<span class=alert-danger>:message</span>') !!}
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Actualizar fotos">
            </div>
            <!--div class="form-group">
                <a class="btn btn-primary" value="Ir a fotos 2" href="{{ route('photos.index', $vehicle) }}">Ir a fotos 2</a>
            </div-->
        </form>
    </div>
</div>

