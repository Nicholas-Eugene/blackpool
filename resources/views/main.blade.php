<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/4dad1e0fea.js" crossorigin="anonymous"></script>
    @yield('css')
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
    <link rel="icon" href="{{ url('storage/img/blackpool.jpeg') }}" type="image/x-icon">
    <title>Blackpool Billiard & Cafe</title>
</head>
<body>
    {{-- header --}}
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="home" class="logo">
            <img src="{{ url('storage/img/logo.png') }}" alt="BLACKPOOL Logo">
        </a>

        <nav class="navbar">
            <a href="/home" class="{{ request()->is('/') || request()->is('home') ? 'active' : '' }}">Home</a>
            <a href="/aboutUs" class="{{ request()->is('aboutUs') ? 'active' : '' }}">About Us</a>
            <a href="/booking" class="{{ request()->is('booking') ? 'active' : '' }}">Booking</a>
            @if (Auth::check())
            <a href="/history" class="{{ request()->is('history') ? 'active' : '' }}">History</a>
            @endif
        </nav>

        <div class="icons">
            @if (Auth::check())
            <a href="/profile"><i class="fas fa-user" id="profile-btn"></i></a>
            @else
            <a class="btn2" href="/login">Login</a>
            @endif
        </div>
    </header>

    {{-- body --}}
    @yield('content')

    {{-- footer --}}

    <section class="footer">

        <div class="box-container">
            <div class="box">
                <h3>About Us</h3>
                <p>The premier billiard table booking app in Indonesia for the Jabodetabek region. Experience quick, easy, and convenient reservations—book your table today!</p>
            </div>

            <div class="box">
                <h3>Branch locations</h3>
                <ul class="branch-list">
                    <li><a href="https://maps.app.goo.gl/yNibpoCSiCBAxKCF8">Grogol</a></li>
                    <li><a href="https://g.co/kgs/Nknd1aN">Artha Gading</a></li>
                    <li><a href="https://maps.app.goo.gl/Z6EoniTG2nZbtvzK9">Tamini Square</a></li>
                </ul>
            </div>

            <div class="box">
                <h3>Find Us On</h3>
                <a href="https://www.instagram.com/blackpoolbilliard.grogol/">Instagram</a>
                <a href="https://www.tiktok.com/@blackpoolbilliard">TikTok</a>
                <a href="https://api.whatsapp.com/send/?phone=6287785908889&text&type=phone_number&app_absent=0">WhatsApp</a>
            </div>
        </div>

        <h1 class="credit"> created by <span> Blackpool Billiard & Cafe 2024 </span> | all rights reserved! </h1>
    </section>

    <script src="{{url('js/main.js')}}"></script>
</body>
</html>
