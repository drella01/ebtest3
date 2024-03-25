@extends('layouts.app')
@section('content')
<div class="container">
    <h2 style="text-align:center">Lightbox</h2>

    <div class="row">
    <div class="column">
        <img src="storage/img1.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="storage/img2.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="storage/img3.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
    </div>
    <div class="column">
        <img src="storage/img4.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
    </div>
    </div>

    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <div class="mySlides">
                <div class="numbertext">1 / 4</div>
                <img src="storage/img1.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 4</div>
                <img src="storage/img2.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 4</div>
                <img src="storage/img3.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">4 / 4</div>
                <img src="storage/img4.jpg" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="row">
                <div class="column">
                    <img class="demo cursor" src="storage/img1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
                </div>
                <div class="column">
                    <img class="demo cursor" src="storage/img2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Snow">
                </div>
                <div class="column">
                    <img class="demo cursor" src="storage/img3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                </div>
                <div class="column">
                    <img class="demo cursor" src="storage/img4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
