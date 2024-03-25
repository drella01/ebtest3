<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TRANSLER</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo-carrasco.jpg') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/custom-form.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-app.css') }}" rel="stylesheet">

     <!-- jQuery & select2 Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
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
            <div class="col-md-4">
                <img src="{{ URL::to('storage/logo-carrasco.jpg') }}" style="width: 100%" alt="Logo">
            </div>
            <div class="col-md-4 border border-primary rounded offset-md-4">
                <div class="bd-example p-2">
                    <H2>Buscar en nuestro stock</H2>
                    @guest
                    <div class="form-inline">
                        <form>
                            <select name="vehicleType" id="vehicleType" class="form-control form-control-lg" onchange="gotoTypeFn()">
                                <option value="">Seleccione...</option>
                                @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{$type->name}}" {{ old('vehicleType') == $type->name ? 'selected' : ''  }}>{{ __('custom.'.$type->name) }}</option>
                                @endforeach
                            </select>
                        </form>
                        <a href="" class="btn btn-lg ml-2 btn-primary" id='typeTag'>Ir a</a>
                    </div>
                    @endguest
                    @auth
                    <div class="form-inline">
                        <form>
                            <select name="vehicle" id="vehicle" class="form-control form-control-lg select2" onchange="gotoVhFn()">
                                <option value="">Seleccione...</option>
                                @foreach (\App\Models\Vehicle::all() as $vehicle)
                                    <option value="{{$vehicle->id}}">{{ $vehicle->reference }}</option>
                                @endforeach
                            </select>
                        </form>
                        <a href="" class="btn ml-2 btn-primary" id='vehicleTag'>Buscar vehiculo</a>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>
        @auth
        <div class="navbar navbar-expand-md bg-white" id="navbarAdmin">
            <a class="navbar-brand" href="{{ url('/') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMaster" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Maestros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMaster">
                        <a class="dropdown-item dropdown-toggle dropright" href="#" id="navbarDropdownConfig" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Configuracion</a>
                            <div class="dropright">
                                <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownConfig">
                                    <a class="dropdown-item" href="#}">New config</a>
                                </div>
                            </div>
                        <a class="dropdown-item" href="{{route('brands.index')}}">Marcas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('providers.index') }}">{{ __('custom.providers.providers') }}</a>
                        <a class="dropdown-item" href="{{ route('containertypes.index') }}">Tipos de carga</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCars" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vehiculos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCars">
                        <a class="dropdown-item" href={{ route('vehicles.create') }}>Nuevo vehiculo</a>
                        <a class="dropdown-item" href={{ route('machineryparts.create') }}>Nuevo repuesto</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('vehicles.list') }}">Listado</a>
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        @endauth
        <div class="navbar w-100 bg-custom flex-lg-row clearfix">
            @foreach (\App\Models\Type::all() as $type)
            <a class="d-inline-block btn-nav" href="{{route('vehicles.index',$type->name)}}">
                <h5 class="text-center">{{ __('custom.'.$type->name)}}</h5>
                <div><img src="{{ asset('storage/'.$type->name.'.png') }}" alt="{{$type->name}}"></div>
                @if ($type->vehicles()->count())
                <div class="pt-2"><h4 class="card-text text-center">{{ $type->vehicles()->count() }}</h4></div>
                @else
                <div class="pt-2"><h4 class="card-text text-center">0</h4></div>
                @endif
            </a>
            @endforeach
        </div>
        <main class="pb-4">
            @yield('content')
        </main>
    </div>
    <div class="row">
        <div class="col-11">
            <img src="{{ asset('storage/logoidae.jpg') }}" style="width: 100%" alt="Logo">
        </div>
        <div class="col-1">
            <img src="{{ asset('storage/logo_auto.jpg') }}" style="width: 100%" alt="Logo">
        </div>
    </div>
    <div id="" class="footer bg-custom text-white p-4">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="font-weight-bold card-title">Transler</h2>
                <h5>Vehiculos Industriales</h5>
                <p class="mb-0">Poligono Industrial GOLMAYO Calle C, Parcela E6</p>
                <p class="mb-0">42190 Carbonera de Frentes SORIA ‐ ESPAÑA</p>
                <p class="mb-0">Tf: +34975214465</p>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h6><a href="https://www.google.com/maps/place/Transler/@41.7537723,-2.572142,17z/data=!3m1!4b1!4m5!3m4!1s0xd44d1c18d28bb5f:0x8cc429a030871ab6!8m2!3d41.7537683!4d-2.5699533" target="_blank" style="text-decoration: none; color: #ffffff;">Ver en google maps</h6></a>
                <h6>email: <a class="text-white mx-2"  href="mailto:transler.alquileryventa@gmail.com ">transler.alquileryventa@gmail.com</a></h6>
            </div>
            <div class="col-sm-3 text-white text-center">
                <a class="text-white mx-2" style="text-decoration: none" href="mailto:mailto:transler.alquileryventa@gmail.com ">contact us</a>
            </div>
            <div class="col-sm-3 text-right">
                <span>Powered by
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="navbar-brand" src="{{ asset('storage/logo-carrasco.jpg') }}" style="max-width: 50%;height:auto;" alt="Logo">
                    </a>
                </span>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script>
        function gotoTypeFn(){
            var x = $("#vehicleType").val();
            $('#typeTag').attr('href','{{ url("/")}}'+'/'+x);
        }
        function gotoVhFn(){
            var x = $("#vehicle").val();
            $('#vehicleTag').attr('href','{{ url("/vehicle")}}'+'/'+x);
        }
    </script>
</body>
</html>
