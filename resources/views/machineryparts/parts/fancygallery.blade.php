<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}">
</head>
<body>
    @if (!$photos->count())
    <img src="{{ URL::to('storage/logo-carrasco.jpg') }}" class="rounded-circle" style="max-width:100%; height: auto;"/>
    @else
    <img src="{{ url($photos->first()->url) }}" style="max-width:100%; height: auto;"/>
    @endif
    <hr class="my-2" />
    <div class="row">
        @forelse ($photos as $photo)
        <div class="col-sm-3">
            <a href="{{ url($photo->url) }}" data-fancybox="images" data-caption="Backpackers following a trail">
                <img src="{{ url($photo->url) }}" style="width: 80px; height: auto;"/>
            </a>
        </div>
        @empty
        <div class="col-sm-3">
            <h3>NO HAY FOTOS</h3>
        </div>
        @endforelse
        <div class="col-sm-3">
            <!--a href="{{ url('storage/videos/video camion.mp4') }}" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                <video src="{{ url('storage/videos/video camion.mp4') }}" style="width: auto; height: 60px;">
            </a-->
        </div>
    </div>
	<!-- JS -->
	<!--script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->
	<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
</body>
</html>
