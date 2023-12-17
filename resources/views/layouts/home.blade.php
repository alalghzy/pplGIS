<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIG Pulau Tikus Kota Bengkulu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('home/icon/favicon.ico') }}" rel="icon">
    <link href="{{ asset('home/icon/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="{{ asset('home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('home/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('home/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    {{-- Maptiler --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

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

        #map {
            position: relative;
        }
    </style>
</head>

<body>

    @yield('content')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/f28fac3438.js" crossorigin="anonymous"></script>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Vendor JS Files -->
    {{-- <script src="{{ asset('home/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('home/vendor/aos/aos.js') }}"></script> --}}
    <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('home/vendor/glightbox/js/glightbox.min.js') }}"></script> --}}
    <script src="{{ asset('home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('home/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('home/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('home/vendor/waypoints/noframework.waypoints.js') }}"></script>
    {{-- <script src="{{ asset('home/vendor/php-email-form/validate.js') }}"></script> --}}

    <!-- Template Main JS File -->
    <script src="{{ asset('home/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- Leaflet --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Need: Apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src=" {{ asset('admin/static/js/pages/dashboard.js') }} "></script>
    <script>
        // Ambil data dari controller
        var seriesData = @json($seriesData);
        var labels = @json($labels);

        var options = {
            series: [{
                    name: 'Karang Hidup',
                    data: seriesData.karang_hidup
                },
                {
                    name: 'Karang Mati',
                    data: seriesData.karang_mati
                },
                {
                    name: 'Algae',
                    data: seriesData.algae
                },
                {
                    name: 'Biota Lain',
                    data: seriesData.biota_lain
                },
                {
                    name: 'Abiotik',
                    data: seriesData.abiotik
                }
            ],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: true // Menyembunyikan toolbar
                }
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'string',
                categories: labels.nama
            },
            yaxis: {
                max: 100,
                labels: {
                    formatter: function(val) {
                        return val.toFixed(2) + "%"; // Mengubah ke format persentase dengan dua desimal
                    }
                }
            },
            colors: ['#008FFB', '#FF4560', '#FFC300', '#3eb650', '#A933FF'], // Ganti dengan warna yang diinginkan
            tooltip: {
                enabled: true,
                formatter: function(val, opts) {
                    return val.toFixed(2) + "%"; // Mengubah ke format persentase dengan dua desimal
                },
                offsetY: 0,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</body>

</html>
