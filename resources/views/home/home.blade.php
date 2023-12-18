@extends('layouts.home')

@section('content')
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active">
                        <i class="bx bx-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li><a href="#about" class="nav-link scrollto">
                        <i class="bi bi-signpost-split"></i>
                        <span>Pulau Tikus</span></a></li>
                <li><a href="#resume" class="nav-link scrollto">
                        <i class="bi bi-map"></i>
                        <span>Peta Persebaran</span>
                    </a>
                </li>
                <li><a href="#services" class="nav-link scrollto">
                        <i class="bi bi-journals"></i>
                        <span>Data Terumbu Karang</span>
                    </a>
                </li>
                <li><a href="#contact" class="nav-link scrollto">
                        <i class="bx bx-envelope"></i>
                        <span>Kontak Kami</span>
                    </a>
                </li>
                @if (Auth::check())
                    <li><a href="{{ route('dashboard.index') }}" class="nav-link scrollto">
                            <i class="bi bi-house-gear"></i>
                            <span>Dashboard SIG</span>
                        </a>
                    </li>
                @else
                    <li><a href="{{ route('login.index') }}" class="nav-link scrollto">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Login</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center shadow-lg">
        <div class="container" data-aos="fade-up-left" data-aos-delay="100">
            <h6 style="color:aliceblue;">Sistem Informasi Geografis & Inventarisasi</h6>
            <h1>Pulau Tikus</h1>
            <p>
                <span class="typed"
                    data-typed-items="Provinsi Bengkulu, Pulau Eksotis, Pulau Terumbu Karang, Pulau Wisata">

                </span>
            </p>
            <div class="social-links">
                <a href="http://www.youtube.com/@latunmovie7435" class="instagram">
                    <i class="bi bi-youtube fs-5"></i></a>
                <a href="https://www.latun.or.id/kontak" class="twitter">
                    <i class="bi bi-twitter-x fs-5"></i>
                </a>
                <a href="https://web.facebook.com/latun.or.id" class="facebook">
                    <i class="bi bi-facebook fs-5"></i>
                </a>
                <a href="https://instagram.com/latun_id" class="instagram">
                    <i class="bi bi-instagram fs-5"></i>
                </a>


            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title mb-3" data-aos="fade-up" data-aos-offset="300">
                    <h2>Sekilas Pulau Tikus</h2>
                    <p>
                        Pulau Tikus adalah pulau kecil yang terletak di perairan Pantai Bengkulu. Pulau Tikus ini
                        merupakan bagian dari wilayah pemerintah Kota Bengkulu, provinsi Bengkulu. Pulau ini berada di
                        sebelah barat dari kota Bengkulu dan dari pantai-pantai di Kota Bengkulu dapat terlihat.
                    </p>
                </div>

                <div class="row ">

                    <div class="col-lg-5 mb-3" data-aos="fade-right" data-aos-offset="250">
                        <center>
                            <div class="card rounded-3 shadow-sm">
                                <img src="{{ asset('img/landing/pulau1.jpg') }}" class=" rounded-3" style="width: 100%"
                                    alt="">
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-7 pt-4 pt-lg-0 content mb-3" data-aos="fade-right" data-aos-offset="300">
                        <h3>
                            Pulau Wisata di Provinsi Bengkulu
                        </h3>
                        <p class="" style="text-align: justify">
                            Pulau Tikus berjarak 10 km dari pusat Kota Bengkulu dan terhubung langsung dengan
                            Samudra Hindia, secara geografis Pulau Tikus terletak pada titik koordinat Lintang
                            <b>-3.8383997116134454</b> dan Bujur <b>102.17966130414317</b>.
                        </p>

                        <div class="row">
                            <div class="col-lg-12">
                                <p class="" style="text-align: justify">
                                    Ada beberapa pilihan wisata yang dapat dinikmati oleh wisatawan diantaranya:
                                </p>
                            </div>
                            <div class="col-lg-5 ms-4">
                                <br>
                                <ul>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Wisata Pantai
                                    </li>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Beach Camp
                                    </li>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Snorkling
                                    </li>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Scuba Diving
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <br>
                                <ul>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Sea Turtle Learning
                                    </li>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Surfing
                                    </li>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Garden Seafan
                                    </li>
                                    <li>
                                        <i class="bi bi-chevron-right"></i> Arkeolog Diving
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 pt-4 pt-lg-0 content mt-5" data-aos="fade-left" data-aos-offset="200">
                        <h3>Pulau Terumbu Karang</h3>
                        <p style="text-align: justify">
                            Untuk nama pulau ini konon diambil dari bentuknya yang mungil dan menyerupai tikus.
                            Dikelilingi oleh batu karang yang melindungi pulau dari abrasi dan gelombang laut yang
                            besar. Dahulu, pulau ini menjadi tempat berlabuh kapal-kapal sekaligus menjadi rumah bagi
                            kawanan penyu.
                        </p>
                        <p class="" style="text-align: justify">
                            Pulau Tikus memiliki banyak terumbu karang yang tersebar di kawasannya, tetapi sayangnya
                            sekarang terumbu karang Pulau Tikus banyak dirusak oleh orang yang tidak bertanggung jawab.
                        </p>
                        <div class="row" style="text-align: justify">
                            <div class="col-lg-12">
                                <p>
                                    Di perairan Pulau Tikus, terdapat beberapa jenis karang seperti poriter,
                                    pocillopora, sarcophito, acroporase, fungia, dan montipora. Terumbu karang tersebut
                                    menjadi rumah bagi ikan-ikan kecil beraneka warna seperti clownfish hingga lobster,
                                    udang, dan kepiting.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-5" data-aos="fade-left" data-aos-offset="300">
                        <center>
                            <div class="card rounded-3 shadow-sm">
                                <img src="{{ asset('img/landing/pulau2.jpg') }}" class=" rounded-3" style="width: 100%"
                                    alt="">
                            </div>
                        </center>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Facts Section ======= -->
        <section id="facts" class="facts">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="section-title">
                    <h2></h2>
                </div>
                <center>
                    <div class="row">

                        <div class="col-lg-12 ">
                            <div id="carouselExampleAutoplaying" class="carousel slide carousel-dark slide"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/landing/karang3.jpg') }}" class="rounded-3 shadow-sm"
                                            style="max-height: 450px;"
                                            alt="{{ asset('home/img/portfolio/portfolio-1.jpg') }}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/landing/karang1.jpg') }}" class="rounded-3 shadow-sm"
                                            style="max-height: 450px;"
                                            alt="{{ asset('home/img/portfolio/portfolio-2.jpg') }}">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/landing/karang2.jpg') }}" class="rounded-3 shadow-sm"
                                            style="max-height: 450px;"
                                            alt="{{ asset('home/img/portfolio/portfolio-3.jpg') }}">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </center>


            </div>
        </section><!-- End Facts Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Peta Persebaran Stasiun Komunitas Karang</h2>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card rounded-3 shadow-sm">
                            <div class="rounded-3" id="map" style="height:450px;"></div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
                            <script>
                                function initialize() {
                                    var map = L.map('map', {
                                        center: [-3.838195020251307, 102.1797480229322],
                                        zoom: 15,
                                        scrollWheelZoom: false // Aktifkan zoom dengan kombinasi Ctrl + scroll
                                    });

                                    var arcgisLayer = L.tileLayer(
                                        'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                            attribution: '&copy; SIG Pulau Tikus Kota Bengkulu',
                                            maxZoom: 18,
                                        });

                                    var isCtrlPressed = false;

                                    document.addEventListener('keydown', function(event) {
                                        if (event.key === 'Control') {
                                            isCtrlPressed = true;
                                            map.scrollWheelZoom.enable(); // Aktifkan zoom dengan scroll
                                        }
                                    });

                                    document.addEventListener('keyup', function(event) {
                                        if (event.key === 'Control') {
                                            isCtrlPressed = false;
                                            map.scrollWheelZoom.disable(); // Nonaktifkan zoom dengan scroll
                                        }
                                    });

                                    arcgisLayer.addTo(map);

                                    var locations = [
                                        @foreach ($posts as $item)
                                            {
                                                image: "{{ $item->image }}",
                                                latitude: {{ $item->latitude }},
                                                longitude: {{ $item->longitude }},
                                                kedalaman: {{ $item->kedalaman }},
                                                idPost: {{ $item->id }},
                                                title: "<center>@if ($item->image) <img src=\"{{ asset('storage/posts/' . $item->image) }}\" style=\"max-height: 500px; max-width: 90%\"> @endif</center>" +
                                                    "<center><b>{{ $item->nama }}</b> ({{ $item->kedalaman }} meter) <br/> {{ $item->latitude }}, {{ $item->longitude }}</center>",
                                            },
                                        @endforeach
                                    ];

                                    for (var i = 0; i < locations.length; i++) {
                                        var location = locations[i];

                                        // Menyesuaikan ikon berdasarkan kedalaman
                                        var icon = getIcon(location.kedalaman);
                                        var marker = L.marker([location.latitude, location.longitude], {
                                            title: location.title,
                                            icon: icon
                                        }).addTo(map);

                                        var popupContent = '<b>' + (location.title || 'No Title') + '</b>';
                                        marker.bindPopup(popupContent);

                                        // Tambahkan event listener untuk menampilkan modal saat marker diklik
                                        marker.on('click', createMarkerClickHandler(location));
                                    }

                                    function createMarkerClickHandler(location) {
                                        return function(e) {
                                            var id = location.idPost;
                                            $('#locationTitle-' + id).html(e.target.getPopup().getContent());
                                            $('#locationModal-' + id).modal('show');
                                        };
                                    }

                                    function getIcon(kedalaman) {
                                        if (kedalaman <= 3) {
                                            return L.icon({
                                                iconUrl: '{{ asset('img/3.png') }}',
                                                iconSize: [20, 27],
                                                iconAnchor: [16, 32],
                                                popupAnchor: [-6, -32]
                                            });
                                        } else if (kedalaman >= 4 && kedalaman <= 6) {
                                            return L.icon({
                                                iconUrl: '{{ asset('img/6.png') }}',
                                                iconSize: [20, 27],
                                                iconAnchor: [16, 32],
                                                popupAnchor: [-6, -32]
                                            });
                                        } else if (kedalaman >= 7 && kedalaman <= 9) {
                                            return L.icon({
                                                iconUrl: '{{ asset('img/9.png') }}',
                                                iconSize: [20, 27],
                                                iconAnchor: [16, 32],
                                                popupAnchor: [-6, -32]
                                            });
                                        } else if (kedalaman >= 10 && kedalaman <= 12) {
                                            return L.icon({
                                                iconUrl: '{{ asset('img/12.png') }}',
                                                iconSize: [20, 27],
                                                iconAnchor: [16, 32],
                                                popupAnchor: [-6, -32]
                                            });
                                        } else {
                                            return L.icon({
                                                iconUrl: '{{ asset('img/location.png') }}',
                                                iconSize: [20, 27],
                                                iconAnchor: [16, 32],
                                                popupAnchor: [-6, -32]
                                            });
                                        }
                                    }
                                }

                                window.onload = initialize;
                            </script>
                            @include('home.includes.modalLihat')
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Resume Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Statistik Data Terumbu Karang</h2>
                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-6 mb-2" data-aos="zoom-in">
                        <div class="card shadow-sm">
                            @if ($karangsCount == 0)
                                <div class="alert alert-light-danger color-danger alert-dismissible show fade mx-4">
                                    <p>
                                        <i class="fa-solid fa-triangle-exclamation"></i> Data terumbu karang belum
                                        tersedia!
                                    </p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" style="margin-bottom: 100px">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak Kami</h2>
                </div>

                <div class="row mt-1">

                    <div class="col-lg-5">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                <p>Jl. Bencoolen Kebun Keling, Kecamatan Teluk Segara, Kota Bengkulu, Bengkulu</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>latun@latun.or.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telepon:</h4>
                                <p>+62 813-7785-6280</p>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-1">

                    </div>

                    <div class="col-lg-6  mt-lg-0">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.118835139614!2d102.24959697592081!3d-3.784310743461069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b17b6e24583d%3A0xec5038018fd0f369!2sLATUN!5e0!3m2!1sid!2sid!4v1702820532328!5m2!1sid!2sid"
                            width="600" height="300" style="border:1;" class="rounded-3 shadow-sm" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container" style="margin-top: 50px; ">
            <div data-aos="fade-up">
                <h4 class="mt-2">Sistem Informasi Geografis Pulau Tikus </br>Kota Bengkulu</h4>
                <p>
                    "Mari jaga kelestarian alam kita!"
                </p>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://web.facebook.com/latun.or.id" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="https://instagram.com/latun_id" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UC9SsvfkUYElADnMMLY_3F5A" class="instagram"><i
                            class="bi bi-youtube"></i></a>
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>SIG Pulau Tikus</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
@endsection
