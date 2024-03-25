<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Grupo Carrasco</title>

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
    <!--style>
        ul>li>a.nav-link {
            color: #636b6f;
            padding: 0 25px;
            font-family: 'Nunito', sans-serif;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .bg-custom{
            background-image: linear-gradient(to bottom right, #3eae56, #467fa8);
        }

        .bg-filter{
            background-image: linear-gradient(to bottom right, #3c7388, #8c8c8f);
        }
        div.d-flex>hr {
            height: 4px;
            width: 100%;
            background-color: #d3d3d3;
            padding: 0;
            margin: 30px auto 0 auto;
        }
        .square {
            border-radius: 25px;
            background: #d3d3d3;
            width: 80px;
            height: 80px;
            border:3px #ffff00;
            text-align: center;
        }

        .isdir {
            transform: rotate(10deg);
        }

        .linea {
            border-top: 1px solid black;
            height: 2px;
            max-width: 200px;
            padding: 0;
            margin: 20px auto 0 auto;
        }
    </style-->

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="col-md-6">
                <img src="{{ URL::to('storage/logo-carrasco.jpg') }}" style="width: 100%" alt="Logo">
            </div>
            <div class="col-md-6 border border-primary rounded">
                <div class="bd-example p-2">
                    <H2>Buscar en nuestro stock</H2>
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
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCars" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vehiculos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCars">
                        <a class="dropdown-item" href={{ route('vehicles.create') }}>Nuevo vehiculo</a>
                        <a class="dropdown-item" href="#">Another action</a>
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
        <ul class="nav nav-tabs bg-custom">
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
                            <a class="nav-link" href="{{ url('locale/es') }}"><span class="caret"><img src="{{ asset('storage/flags/fr.png') }}" style="width: 25px; height:25px" alt="ES"></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </ul>
        <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-center">
            <div class="flex-lg-row clearfix">
                @foreach (\App\Models\Type::all() as $type)
                <a class="d-inline-block nav-link btn-nav" href="{{route('vehicles.index',$type->name)}}">
                    <h6>{{ __('custom.'.$type->name)}}</h6>
                    <div><img src="{{ asset('storage/'.$type->name.'.png') }}" alt="{{$type->name}}"></div>
                    @if ($type->vehicles()->count())
                    <div class="pt-2"><h6 class="card-text">{{ $type->vehicles()->count() }} {{ __('custom.qt.vehicles') }}</h6></div>
                    @else
                    <div class="pt-2"><h6 class="card-text">{{ __('custom.qt.empty') }}</h6></div>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        <main class="pb-4">
            @yield('content')
        </main>
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
                <span>Powered by
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="navbar-brand" src="{{ asset('storage/logo-carrasco.jpg') }}" style="width: 100%;" alt="Logo">
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
    </script>
</body>
</html>