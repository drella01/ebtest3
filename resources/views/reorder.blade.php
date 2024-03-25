<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Transler</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom-app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
    $( function() {
        $("#photoble").sortable({
			update: function(event, ui) {
                    //console.log(ui.item.index());
                    getIdsOfImages();
            }//end update
        });
    } );
    function getIdsOfImages() {
                var values = [];
                var news = [];
                var vehicle = $('#vehicleId').val();
                $('.ui-state-default').each(function (index) {
                    values.push($(this).attr("id"));
                    news.push(index+1);
                    $(this).val = index;
                });
                $('#outputvalues').val(values);
                $('#outputNewvalues').val(news);

                $.ajax({
                    url: "/photos/reorder",
                    type:"POST",
                    data:{
                        vehicle:vehicle,
                        order:news,
                        values:values,
                        _token: "{{ csrf_token() }}",
                    },
                    success:function(response){
                        console.log(response);
                        if(response) {
                            //console.log(response);
                            //window.location = response.redirect;
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

  </script>
</head>
<body>
<header>
    <ul class="nav nav-tabs bg-custom mt-2">
        <li class="nav-item">
            <a class="btn btn-outline-primary text-white" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
            <a href="" class="btn btn-outline-primary text-white">About us</a>
        </li>
        <li class="nav-item">
            <a href="" class="btn btn-outline-primary text-white">Contact</a>
        </li>
        <!-- Right Side Of Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light ml-auto p-0 mr-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLang" aria-controls="navbarLang" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarLang">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('locale/es') }}"><span class="caret"><img src="{{ asset('storage/flags/es.png') }}" style="width: 25px; height:25px" alt="ES"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('locale/en') }}"><span class="caret"><img src="{{ asset('storage/flags/en.png') }}" style="width: 25px; height:25px" alt="EN"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('locale/fr') }}"><span class="caret"><img src="{{ asset('storage/flags/fr.png') }}" style="width: 25px; height:25px" alt="ES"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </ul>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="col-md-6">
            <img src="{{ URL::to('storage/logo-carrasco.jpg') }}" style="width: 100%" alt="Logo">
        </div>
        <div class="col-md-6 border border-primary rounded">
            <div class="bd-example p-2">
                <H2>Vehiculo</H2>
                @auth
                <div class="form-inline">
                    <input type="text" class="form-control"  value={{ $vehicle->reference }}>
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="btn ml-2 btn-primary" id='vehicleTag'>Volver</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
<div class="container">
    @if( session()->has('info') )
    <div class="alert alert-success" role="alert" style="text-align:center; font-family:arial; font-size:20px;">{{ session('info') }}</div>
    @endif
    <div class="mt-4">
        <div class="text-center mb-2">
            <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Galería de fotos</h1>
            <hr class="mt-2">
            <input type="text" name="vehicleId" id="vehicleId" value="{{$vehicle->id}}" hidden>
        </div>
        @if (!$photos)
        <div class="text-center">
            <h1 class="fw-light text-center text-lg-start mt-4 mb-0">No hay fotos</h1>
            <hr class="mt-2">
        </div>
        @endif
        <ul class="row" id="photoble" style="list-style-type: none;">
            @foreach ($photos as $key=>$photo)
                <li class="ui-state-default" style="display: inline" id={{ $photo->id }}>
                    <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                        @csrf
                        <input type="submit" class="close" value="&times;">

                        <div class="p-3">
                            <input type="checkbox" name='testing[]' checked>
                        </div>
                    </form>
                    <img class="img-fluid img-thumbnail" style="width: 200px; height:auto;" src="{{ asset($photo->url) }}" alt="Not">
                </li>
            @endforeach
        </ul>
        <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Subir fotos</h1>
        <hr class="mt-2">
        <div class="m-4 form-inline">
            <form action="{{ route('photos.store', $vehicle) }}" class="form-inline" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                    <input type="file" class="form-control-file" name="photo[]" accept="image/*" multiple>
                    {!! $errors->first('photo[]', '<span class=alert-danger>:message</span>') !!}
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Nuevas fotos">
                </div>
                <div class="form-group">
                </div>
            </form>
            <a class="btn btn-success ml-4" href="{{ route('vehicles.show',$vehicle) }}">Volver</a>
            <form action="" method="POST">
                @csrf
                <button class="btn btn-primary" formaction="{{ route('photos.destroyselection') }}">Eliminar seleccion</button>
            </form>
        </div>
    </div>
</div>
<div id="" class="footer bg-filter text-white p-4">
    <div class="row">
        <div class="col-sm-3">
            <h2 class="font-weight-bold card-title">Transler</h2>
            <h5>Vehiculos Industriales</h5>
            <p class="mb-0">Poligono Industrial LAS CASAS C/D, Parcela 12</p>
            <p class="mb-0">42005 SORIA ‐ ESPAÑA</p>
            <p class="mb-0">Tf: +34975232203</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h6>email: info@rodatamcarrasco.com</h6>
        </div>
        <div class="col-sm-4 text-white text-center">
            <a class="text-white mx-2" style="text-decoration: none" href="mailto:info@rodatamcarrasco.com ">contact us</a>
            <a class="text-white mx-2" style="text-decoration: none" href="https://www.w3schools.com" target="_blank">legal warning</a>
        </div>
        <div class="col-sm-3 text-right">
        </div>
    </div>
</div>
<!--div id="outputDiv">
    <b>Output of ID's of images : </b>
    <input id="outputvalues" type="text" value="" />
</div>
<div id="outputDivNews">
    <b>Output of ID's of images : </b>
    <input id="outputNewvalues" type="text" value="" />
</div>
<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li-->
</body>
</html>
