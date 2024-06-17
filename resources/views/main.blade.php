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
    <title>MB-TABLE</title>
</head>
<body>
    {{-- header --}}
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="/" class="logo"><span>MB</span>-TABLE</a>

        <nav class="navbar">
            <a href="/">Home</a>
            <a href="/aboutUs">About Us</a>
            @if (Auth::check())
            <a href="/history">History</a>
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
                <p>The first billiard table booking application in Indonesia for the Jabodetabek area. Easy, convenient, and fast, book your billiard table now!</p>
            </div>

            <div class="box">
                <h3>Branch locations</h3>
                <a href="#">Jakarta</a>
                <a href="#">Bogor</a>
                <a href="#">Depok</a>
                <a href="#">Tangerang</a>
                <a href="#">Bekasi</a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="https://www.instagram.com/blackpoolbilliard.grogol/">Instagram</a>
                <a href="https://www.tiktok.com/@blackpoolbilliard">TikTok</a>
                <a href="https://api.whatsapp.com/send/?phone=6287785908889&text&type=phone_number&app_absent=0">WhatsApp</a>
            </div>
        </div>

        <h1 class="credit"> created by <span> Blackpool Billiard & Cafe 2024 </span> | all rights reserved! </h1>
    </section>

    <script src="{{url('js/home.js')}}"></script>
</body>
</html>
