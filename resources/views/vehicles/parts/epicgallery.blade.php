<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"-->
    <link href="{{ asset('css/epicstyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>

<body>
    <div class="photo-gallery">
        <div class="container">
            <div class="row photos">
                @foreach ($vehicle->photos->pluck('url') as $photo)
                    <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ url($photo) }}" data-lightbox="photos" data-max-width="1216"><img class="img-fluid" src="{{ url($photo) }}"></a></div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
