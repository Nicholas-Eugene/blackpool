@extends('main')

@section('css')
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{url('css/aboutUs.css')}}" />
    <link rel="stylesheet" href="{{url('css/swiper-bundle.min.css')}}" />
@stop

@section('content')
    <!-- About Section -->
    <section class="section about" id="about">
        <div class="about-content container">
                <div class="about-imageContent">
                        <img src = "{{url('storage/img/aboutUs.jpg')}}" alt="" class="about-img">
                </div>

                <div class="about-details">
                        <div class="about-text">
                                <h4 class="content-subtitle"><i>MB-TABLE</i></h4>
                                <h2 class="content-title">Rack 'em Up and <br>Book Your Shot Online!</h2>
                                <p class="content-description">Welcome to MB-TABLE, your ultimate online billiard booking solution! Established in 2023, we revolutionize the way you play and reserve billiard tables effortlessly. Our cutting-edge web-app combines convenience, efficiency, and innovation to bring you the best billiard experience</p>

                                <ul class="about-lists flex">
                                        <li class="about-list">Convenience</li>
                                        <li class="about-list dot">.</li>
                                        <li class="about-list">Efficiency</li>
                                        <li class="about-list dot">.</li>
                                        <li class="about-list">Accessibility</li>
                                </ul>
                        </div>
                </div>

        </div>
</section>

<!-- Reviews Section -->
<section class="section review" id="review">
    <div class="review-container container">
            <div class="review-text">
                    <h4 class="section-subtitle"><i>Reviews</i></h4>
                    <h2 class="section-title">What Our Clients Says</h2>
            </div>

            <div class="tesitmonial swiper mySwiper">
                    <div class="swiper-wrapper">
                            <div class="testi-content swiper-slide flex">
                                    <img src = "{{url('storage/img/profile/profileImg1.jpg')}}" alt="" class="review-img">
                                    <p class="review-quote">MB-TABLE has completely transformed the way I book billiard tables. The convenience and efficiency of their web-app are outstanding. I can now reserve my preferred time slots and even choose specific tables with just a few clicks. No more waiting in line or wasting time searching for an available table. It's a game-changer!</p>
                                    <i class='bx bxs-quote-alt-left quote-icon'></i>

                                    <div class="testi-personDetails flex">
                                            <span class="name">Marnie Rotter</span>
                                            <span class="job">5 / 5</span>
                                    </div>
                            </div>
                            <div class="testi-content swiper-slide flex">
                                    <img src = "{{url('storage/img/profile/profileImg2.jpg')}}" alt="" class="review-img">
                                    <p class="review-quote">I'm thoroughly impressed with MB-TABLE's accessibility. Being able to book billiard tables from my phone or computer, no matter where I am, is fantastic. The mobile-friendly platform ensures that I can manage my bookings on the go, receiving real-time updates and notifications. It has made playing billiards so much more convenient and enjoyable for me.</p>
                                    <i class='bx bxs-quote-alt-left quote-icon'></i>

                                    <div class="testi-personDetails flex">
                                            <span class="name">Hailee Stainfield</span>
                                            <span class="job">4.8 / 5</span>
                                    </div>
                            </div>
                            <div class="testi-content swiper-slide flex">
                                    <img src = "{{url('storage/img/profile/profileImg3.jpg')}}" alt="" class="review-img">
                                    <p class="review-quote">The customer support provided by MB-TABLE is exceptional. I had a few questions about the platform, and their team was quick to respond and assist me. Their friendly and knowledgeable staff made the entire experience seamless. It's reassuring to know that I can rely on their support whenever I need it. I highly recommend MB-TABLE for their top-notch customer service.</p>
                                    <i class='bx bxs-quote-alt-left quote-icon'></i>

                                    <div class="testi-personDetails flex">
                                            <span class="name">Manny Rooker</span>
                                            <span class="job">5 / 5</span>
                                    </div>
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-navBtn"></div>
                        <div class="swiper-button-prev swiper-navBtn"></div>
                        <div class="swiper-pagination"></div>
            </div>
    </div>
</section>

    <script src="{{url('js/swiper-bundle.min.js')}}"></script>
    <script src="{{url('js/script.js')}}"></script>
@stop
