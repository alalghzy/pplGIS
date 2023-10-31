<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>SIG Pulau Tikus</title>
    <!-- Favicons -->
    <link href="{{ asset('home/icon/favicon.ico') }}" rel="icon">
    <link href="{{ asset('home/icon/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Datatables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">

    <style>
        #hero {
            background: url('https://ksmtour.com/media/images/articles7/pulau-tikus-bengkulu.jpg');
            width: 100%;
            background-size: cover;
            height: 100vh;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }


        #hero:before {
            content: "";
            background: rgba(255, 255, 255, 0);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #hero h1 {
            margin: 0;
            font-size: 64px;
            font-weight: 700;
            line-height: 56px;
            color: #ffffff;
        }

        #hero p {
            color: #ffffff;
            margin: 15px 0 0 0;
            font-size: 26px;
            font-family: "Poppins", sans-serif;
        }

        #hero p span {
            color: #ffffff;
            letter-spacing: 1px;
        }

        #hero .social-links {
            margin-top: 10px;
        }

        #hero .social-links a {
            font-size: 24px;
            display: inline-block;
            color: #ffffff;
            line-height: 1;
            margin-right: 10px;
            transition: 0.3s;
        }

        #hero .social-links a:hover {
            color: #000000;
        }

        #footer {
            background-color: rgb(2, 18, 34);
            color: white;
            margin: 0px;
            padding: 10px;
            /* Mengatur jarak antara teks dan batas footer */
            min-height: 70px;
            /* Mengatur tinggi minimal footer */

        }

        .hover-div .alalghzy {
            color: #0563bb;
            /* Warna teks asli */
        }

        .hover-div .fa-square-github {
            color: #ffffff;
            /* Warna ikon asli */
        }

        /* Gaya saat elemen div dihover */
        .hover-div:hover .alalghzy {
            color: #c88eff;
            /* Ganti dengan warna yang Anda inginkan saat dihover */
        }

        .hover-div:hover .fa-square-github {
            color: #ffee00;
            /* Ganti dengan warna yang Anda inginkan saat dihover */
        }
    </style>
</head>

<body>
    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li>
                    <a href="#hero" class="nav-link scrollto active">
                        <i class="bx bx-home"></i><span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="#tentang" class="nav-link scrollto">
                        <i class="bi bi-signpost-split"></i><span>Tentang</span>
                    </a>
                </li>
                <li>
                    <a href="#peta" class="nav-link scrollto">
                        <i class="bi bi-map"></i><span>Peta Inventarisasi</span>
                    </a>
                </li>
                <li>
                    <a href="#dataobjek" class="nav-link scrollto">
                        <i class="bi bi-journals"></i> <span>Data Iventarisasi</span>
                    </a>
                </li>
                <li>
                    <a href="#tentangkami" class="nav-link scrollto">
                        <i class="bi bi-code-slash"></i> <span>Tentang Kami</span>
                        </a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}" class="nav-link scrollto">
                        <i class="bi bi-person-gear"></i> <span>Login Admin</span></a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            {{-- <h3>Sistem Informasi Geografis</h3>
            <p>Yoe yoe yoe</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> --}}

            <div class="copyright">
                &copy; Copyright <strong><span>saya</span></strong>. All Rights Reserved
            </div>
            <div class="hover-div">
                <div class="credits" style="font-size: 13px">
                    Dibuat oleh <a class="alalghzy" href="https://github.com/alalghzy"><i
                            class="fa-brands fa-square-github fa-bounce"></i>
                        alalghzy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('home/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('home/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('home/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('home/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('home/js/main.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- PureCounter --}}
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script>
        new PureCounter();
    </script>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/f28fac3438.js" crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <script type="text/javascript" src=" {{ asset('admin/vali/js/plugins/jquery.dataTables.min.js') }} "></script>
    <script type="text/javascript">
        $('#table-data').DataTable({
    "lengthMenu": [5, 10, 20, 30, 50],
    "pageLength": 5
});
    </script>

</body>

</html>
