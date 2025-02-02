<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="{{ asset('css/epicstyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>

<body>
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Lightbox Gallery</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <div class="row photos">
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('storage/desk.jpg') }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/desk.jpg') }}"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('storage/img1.jpg') }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/img1.jpg') }}"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('storage/loft.jpg') }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/loft.jpg') }}"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('storage/img2.jpg') }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/img2.jpg') }}"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('storage/building.jpg') }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/building.jpg') }}"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{ asset('storage/img4.jpg') }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/img4.jpg') }}"></a></div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>
