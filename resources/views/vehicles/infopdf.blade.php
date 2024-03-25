<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            font-size: 12px;
            height: 100vh;
            margin: 20px;
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

        .img-custom {
            width: 300px; /* You can set the dimensions to whatever you want */
            height: 300px;
            object-fit: cover;
        }
        .btn-nav{
            width: 120px;
            height: 80px;
            padding: 8px;
            background-color: #ffffff;
            text-decoration:none !important;
            display: inline-block;
        }
        a h6{
            padding-top: 1px;
            text-align: center;
            font-weight: bolder;
            font-size: 10px;
        }
        a img{
            padding-top: 1px;
            height: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .bg-custom{
            background-image: linear-gradient(to bottom right, #00b7ff, #ffff00);
        }

        .bg-filter{
            background-image: linear-gradient(to bottom right, #3c7388, #8c8c8f);
        }

        .linea {
            border-top: 1px solid black;
            height: 2px;
            max-width: 200px;
            padding: 0;
            margin: 20px auto 0 auto;
        }
        .bg-custom{
            background-image: linear-gradient(to bottom right, #00b7ff, #ffff00);
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
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <img src="{{ public_path('storage/transler.jpg') }}" style="max-width: 100%" alt="Logo">
            </nav>
        </header>
        @include('vehicles.parts.showGeneral')
        @include('vehicles.parts.showChassis')
        @include('vehicles.parts.showAxlesTable')
        @include('vehicles.parts.showTank')
    </div>
</body>
</html>
