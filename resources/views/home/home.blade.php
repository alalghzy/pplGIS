@extends('layouts.landingPage')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <span style="color:aliceblue; margin-bottom: 30px;">Sistem Informasi Geografis & Inventarisasi</span>
            <h1>Pulau Tikus</h1>
            <p><span class="typed"
                    data-typed-items="Provinsi Bengkulu, Pulau Eksotis, Pulau Terumbu Karang, Pulau Wisata"></span></p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        @include('home.pages.tentang')
        <!-- End About Section -->

        <!-- ======= Statistik Section ======= -->
        @include('home.pages.statistik')
        <!-- End Statistik Section -->

        <!-- ======= Peta Section ======= -->
        @include('home.pages.peta')
        <!-- End Peta Section -->

        <!-- ======= Data Objek Section ======= -->
        @include('home.pages.dataobjek')
        <!-- End Data Objek Section -->

        <!-- ======= Tentang Section ======= -->
        @include('home.pages.tentangkami')
        <!-- End Tentang Section -->

        <!-- ======= Contact Section ======= -->
        @include('home.pages.kontak')
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
