@extends('main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@stop

@section('content')
<div class="slider">
    <div class="list">
        <div class="item active">
            <img src="{{ asset('storage/img/bp2.jpg') }}" alt="1 Image">
            <div class="content">
                <p>blackpool billiard & cafe</p>
                <h2>Break the Balls</h2>
                <p>
                    <button class="slider-button" onclick="window.location.href='/booking'">BOOK NOW</button>
                </p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/bp3.jpg') }}" alt="Slider 02 Image">
            <div class="content">
                <p>blackpool billiard & cafe</p>
                <h2>Strike It !!</h2>
                <p>
                    <button class="slider-button" onclick="window.location.href='/booking'">BOOK NOW</button>
                </p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/bp1.jpg') }}" alt="Slider 03 Image">
            <div class="content">
                <p>blackpool billiard & cafe</p>
                <h2>Game On</h2>
                <p>
                    <button class="slider-button" onclick="window.location.href='/booking'">BOOK NOW</button>
                </p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/bp4.jpg') }}" alt="Slider 04 Image">
            <div class="content">
                <p>blackpool billiard & cafe</p>
                <h2>Born to Pool</h2>
                <p>
                    <button class="slider-button" onclick="window.location.href='/booking'">BOOK NOW</button>
                </p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/blackpool.jpeg') }}" alt="Slider 05 Image">
            <div class="content">
                <p>blackpool billiard & cafe</p>
                <h2>Cue into Fun</h2>
                <p>
                    <button class="slider-button" onclick="window.location.href='/booking'">BOOK NOW</button>
                </p>
            </div>
        </div>
    </div>

    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>

    <div class="thumbnail">
        <div class="item active">
            <img src="{{ asset('storage/img/bp2.jpg') }}" alt="Thumbnail 01">
            <div class="content">
                B
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/bp3.jpg') }}" alt="Thumbnail 02">
            <div class="content">
                L
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/bp1.jpg') }}" alt="Thumbnail 03">
            <div class="content">
                A
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/bp4.jpg') }}" alt="Thumbnail 04">
            <div class="content">
                C
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('storage/img/blackpool.jpeg') }}" alt="Thumbnail 05">
            <div class="content">
                K
            </div>
        </div>
    </div>
</div>

<div class="why-must-blackpool">
    <h2>WHY <span class="highlight">MUST</span> BLACKPOOL</h2>
    <div class="features">
        <div class="feature" data-aos="fade-left">
            <img src="{{ asset('storage/img/promo.jpg') }}" alt="feature 1">
            <p>Billiard Murah Harga Pelajar</p>
        </div>
        <div class="feature" data-aos="fade-left" data-aos-delay="150">
            <img src="{{ asset('storage/img/aramith.png') }}" alt="feature 2">
            <p>Stick dan Bola terbaru</p>
        </div>
        <div class="feature" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('storage/img/mrsung.jpg') }}" alt="feature 3">
            <p>Meja terbaik</p>
        </div>
    </div>
</div>

<div class="location" data-aos="fade-up" data-aos-delay="100">
    <h2>Location</h2>
    <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7254215393928!2d106.78976787498986!3d-6.167511843819753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f784f1baaad3%3A0x97c7ca96d48ae730!2sBlackpool%20Billiard%20%26%20Cafe!5e0!3m2!1sen!2sid!4v1718696586989!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<script src="{{url('js/home.js')}}"></script>

@stop
