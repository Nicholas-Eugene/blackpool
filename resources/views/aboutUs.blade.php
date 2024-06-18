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
                        <img src = "{{url('storage/img/own.jpg')}}" alt="" class="about-img">
                </div>

                <div class="about-details">
                        <div class="about-text">
                                <h4 class="content-subtitle"><i>Blackpool Billiard & Cafe</i></h4>
                                <h2 class="content-title">Rack 'em Up and <br>Book Your Shot Online!</h2>
                                <p class="content-description">Hadir untuk mengantarkan Anda pada pengalaman bermain billiard terbaik dengan sistem booking online yang revolusioner! Didirikan pada tahun 2023, kami mengubah cara Anda bermain dan memesan meja billiard dengan mudah dan tanpa kerumitan. Web-App canggih kami menggabungkan kenyamanan, efisiensi, dan inovasi untuk menghadirkan pengalaman bermain billiard yang tak terlupakan.</p>

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
                    <h2 class="section-title">Kata Pengunjung</h2>
            </div>

            <div class="tesitmonial swiper mySwiper">
                    <div class="swiper-wrapper">
                            <div class="testi-content swiper-slide flex">
                                    <img src = "{{url('storage/img/profile/wijay.jpg')}}" alt="" class="review-img">
                                    <p class="review-quote">Saya sangat senang bermain billiard di blackpool karena selain lokasinya yang dekat sehingga ketika saya bolos kelas bisa langsung menuju kesini juga disini disediakan ruangan khusus untuk merokok.</p>
                                    <i class='bx bxs-quote-alt-left quote-icon'></i>

                                    <div class="testi-personDetails flex">
                                            <span class="name">Mr. Vincent Wijaya Sumargo</span>
                                            <span class="job">5 / 5</span>
                                    </div>
                            </div>
                            <div class="testi-content swiper-slide flex">
                                    <img src = "{{url('storage/img/profile/nat.jpg')}}" alt="" class="review-img">
                                    <p class="review-quote">Saya sudah cukup sering bermain billiard di tempat ini, sehingga bisa saya katakan ini merupakan salah satu tempat billiard favorit saya. Apalagi dengan peraturan baru yang melarang untuk merokok batangan serta penggantian meja dan stick baru membuat pengalaman bermain meningkat.</p>
                                    <i class='bx bxs-quote-alt-left quote-icon'></i>

                                    <div class="testi-personDetails flex">
                                            <span class="name">Mr. Nathanael Kenneth Lay</span>
                                            <span class="job">4.8 / 5</span>
                                    </div>
                            </div>
                            <div class="testi-content swiper-slide flex">
                                    <img src = "{{url('storage/img/profile/nico.jpg')}}" alt="" class="review-img">
                                    <p class="review-quote">Hampir tiap kali saya bermain disini selalu masuk ke waiting list, yang berarti cukup banyak yang suka bermain billiard disini. Namun untuk saya pribadi tempat ini masih memilki beberapa kekurangan seperti asap dari vape atau pod yang mengganggu karena walaupun sudah tidak diizinkan rokok batangan dan dipasang air purifier namun entah kenapa asap tersebut masih mengganggu.</p>
                                    <i class='bx bxs-quote-alt-left quote-icon'></i>

                                    <div class="testi-personDetails flex">
                                            <span class="name">Mr. Nicholas Eugene Supardi</span>
                                            <span class="job">3 / 5</span>
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
