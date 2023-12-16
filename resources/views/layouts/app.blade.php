<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Auth::user()->status }} | SIG Pulau Tikus</title>
    <link rel="shortcut icon" href="{{ asset('admin/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
    <link rel="stylesheet" href="{{ asset('admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        /* @keyframes moveTitle {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(50px);
            }

            100% {
                transform: translateX(0);
            }
        }


        title {
            animation: moveTitle 3s ease infinite;
        } */

        /* .text-gray-600 {
            float: right;
            display: block;
        } */

        /* @media (max-width: 1200px) {
            .text-gray-600 {
                display: none;
            }
        } */

        #map {
            width: 100%;
            height: 450px;
            z-index: 1;
            position: relative;
        }

        #overlayElement {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 2;
        }
    </style>
    @stack('style')
</head>

<body>
    <script src=" {{ asset('admin/static/js/initTheme.js') }} "></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('admin/compiled/svg/logo.png') }}" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                    <div
                        class="theme-toggle gap-2  align-items-center mt-2 d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                            height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title" style="margin-bottom: -7px">Dashboard</li>
                        <hr>
                        <li class="sidebar-item {{ Route::is('dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-title" style="margin-bottom: -7px">Menu Navigasi</li>
                        <hr>

                        <li
                            class="sidebar-item has-sub {{ Route::is('stasiun.*', 'data-pengguna.*', 'karang.*') ? 'active' : '' }}">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>
                                    Manajemen Data
                                </span>
                            </a>

                            <ul class="submenu">
                                @if (auth()->user()->status == 'Administrator')
                                    <li class="submenu-item {{ Route::is('data-pengguna.index') ? 'active' : '' }}">
                                        <a href="{{ route('data-pengguna.index') }}" class="submenu-link">
                                            Pengguna
                                            @if ($hasNullStatus)
                                            <i class="fa-solid fa-triangle-exclamation" style="color: #ff5c5c;"></i>
                                            @endif
                                        </a>
                                    </li>

                                    <li class="submenu-item {{ Route::is('stasiun.index') ? 'active' : '' }}">
                                        <a href="{{ route('stasiun.index') }}" class="submenu-link">Stasiun</a>
                                    </li>

                                    <li class="submenu-item {{ Route::is('karang.index') ? 'active' : '' }}">
                                        <a href="{{ route('karang.index') }}" class="submenu-link">Terumbu Karang</a>
                                    </li>
                                @else
                                    <li class="submenu-item {{ Route::is('stasiun.index') ? 'active' : '' }}">
                                        <a href="{{ route('stasiun.index') }}" class="submenu-link">Stasiun</a>
                                    </li>

                                    <li class="submenu-item {{ Route::is('karang.index') ? 'active' : '' }}">
                                        <a href="{{ route('karang.index') }}" class="submenu-link">Terumbu Karang</a>
                                    </li>
                                @endif

                            </ul>
                        </li>

                        <li class="sidebar-item {{ Route::is('peta.index') ? 'active' : '' }}">
                            <a href="{{ route('peta.index') }}" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Peta Persebaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('laporan') }}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-break-fill"></i>
                                <span>Laporan Data Karang</span>
                            </a>
                        </li>

                        {{-- <hr>
                        <li class="sidebar-item {{ Route::is('logout') ? 'active' : '' }}">
                            <a id="logout-link" href="{{ route('logout') }}" class='sidebar-link'>
                                <i class="bi bi-door-closed-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class="layout-navbar navbar-fixed">
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid ">
                        <a href="#" class="burger-btn d-block me-auto">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="dropdown ms-auto">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="nav-item dropdown">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-4">
                                            <div class="text-gray-600" id="clock2"></div>
                                            <div class="text-gray-600" id="clock"></div>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md nav-link active">
                                                @if (Auth::user()->profil != null)
                                                    <img id="userImage" src="{{ asset(Auth::user()->profil) }}"
                                                        alt="" style="object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('admin/compiled/jpg/2.jpg') }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end p-1" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 8rem;">
                                    <li>
                                        <span class="dropdown-header badge bg-primary dropdown-item"
                                            style="font-size: 11px; color: white">{{ auth()->user()->status }}</span>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ route('profil', ['id' => auth()->user()->id]) }}"
                                            class="dropdown-item">
                                            <i class="icon-mid bi bi-person me-2"></i> {{ auth()->user()->name }}
                                        </a>
                                    </li>
                                    <li><a id="logout-link" class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i> Keluar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                @yield('nama')
                @yield('content')
            </div>

            <footer class="">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        {{-- <p>2023 &copy; SIG Pulau Tikus</p> --}}
                    </div>
                    <div class="float-end">
                        {{-- <a href="https://github.com/alalghzy" style="">
                            <i class="fa-brands fa-square-github fa-bounce fa-2xl"></i>&ensp;alalghzy
                        </a> --}}
                        <p>2023 &copy; SIG Pulau Tikus</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('admin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/compiled/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- PureCounter --}}
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script>
        new PureCounter();
    </script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tangkap elemen tautan "Logout"
            const logoutLink = document.getElementById("logout-link");

            // Tambahkan event listener untuk mengkonfirmasi logout saat tautan diklik
            logoutLink.addEventListener("click", function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Konfirmasi Logout",
                    text: "Apakah Anda yakin ingin logout?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Logout",
                    cancelButtonText: "Batal",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('logout') }}";
                    }
                });
            });
        });
    </script>

    <script>
        @if (Session::has('failed'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ Session::get('failed') }}",
                showConfirmButton: true,
            });
        @endif

        @if (Session::has('message'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ Session::get('message') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif
    </script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire(
                'Kamu berhasil login!',
                '',
                'success'
            )
        </script>
    @endif

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/f28fac3438.js" crossorigin="anonymous"></script>

    {{-- Clock --}}
    <script type="text/javascript">
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
            document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
        //-->
    </script>
    <script type='text/javascript'>
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        document.getElementById('clock2').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    </script>

    @stack('script')

</body>

</html>
