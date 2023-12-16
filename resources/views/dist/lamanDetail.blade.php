@extends('layouts.app')

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>
                    <a href="javascript:void(0);" onclick="history.back();" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Kembali">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    Detail Data {{ $post->nama }}
                </h3>
                <p class="text-subtitle text-muted"></p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-content">
        <section class="row">

            {{-- <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Karang Hidup</h6>
                                        <h6 class="font-extrabold mb-0">112.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Karang Mati</h6>
                                        <h6 class="font-extrabold mb-0">183.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Algae</h6>
                                        <h6 class="font-extrabold mb-0">80.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Abiotik</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Biota Lain</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="mb-4">

            </div>
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-8">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Lokasi Tutupan Komunitas Karang {{ $post->nama }}</h4>
                            </div>
                            <div class="card-body">

                                <div class="rounded-4" id="map" style="max-width: auto; max-height: 375px"></div>
                                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                                <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var locations = [
                                            @foreach ($posts as $item)
                                                {
                                                    latitude: {{ $item->latitude }},
                                                    longitude: {{ $item->longitude }},
                                                    kedalaman: {{ $item->kedalaman }},
                                                    idPost: {{ $item->id }},
                                                    title: "<center><b>{{ $item->nama }}</b> ({{ $item->kedalaman }} meter) <br/> {{ $item->latitude }}, {{ $item->longitude }}</center>",
                                                },
                                            @endforeach
                                        ];

                                        // Ganti ID di bawah ini sesuai dengan ID yang diinginkan
                                        var targetLocationId = {{ $post->id }}; // Ganti dengan ID yang diinginkan

                                        var targetLocation = locations.find(function(location) {
                                            return location.idPost === targetLocationId;
                                        });

                                        if (targetLocation) {
                                            var myLatlng = L.latLng(targetLocation.latitude, targetLocation.longitude);
                                            var map = L.map('map').setView(myLatlng, 15);

                                            // Menggunakan layer peta satelit dari ArcGIS Imagery
                                            var arcgisLayer = L.tileLayer(
                                                'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                                    attribution: 'Tiles &copy; Esri &mdash; Source: Esri',
                                                    maxZoom: 18,
                                                });

                                            arcgisLayer.addTo(map);

                                            var contentString = '<div id="content">' +
                                                '<div id="siteNotice">' +
                                                '</div>' +
                                                '<h1 id="firstHeading" class="firstHeading">{{ $post->nama }}</h1>' +
                                                '<div id="bodyContent">' +
                                                '<p style="font-size:12px; color:gray" >{{ $post->latitude }}, {{ $post->longitude }} <br> {{ $post->kedalaman }} meter</p>' +
                                                '</div>' +
                                                '</div>';

                                            var marker = L.marker(myLatlng, {
                                                title: 'Maps Info',
                                                icon: getIcon(targetLocation.kedalaman)
                                            }).addTo(map);

                                            marker.bindPopup(contentString);

                                            // Tambahkan event listener untuk menampilkan modal saat marker diklik
                                            marker.on('click', createMarkerClickHandler(targetLocation));
                                        } else {
                                            console.error('Location with ID ' + targetLocationId + ' not found.');
                                        }
                                    });

                                    function createMarkerClickHandler(location) {
                                        return function(e) {
                                            var id = location.idPost;
                                            $('#locationTitle-' + id).text(e.target.getPopup().getContent());
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
                                </script>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">

                            <div class="col-12">
                                <div class="card shadow-sm">
                                    <div class="card-body py-4 px-4">
                                        <div class="d-flex align-items-center">
                                            {{-- <div class="avatar avatar-xl">
                                                @if ($karang->user->profil == null)
                                                    <img src="{{ asset('admin/compiled/jpg/2.jpg') }}">
                                                @else
                                                    <img id="userImage" src="{{ asset($karang->user->profil) }}"
                                                        style="object-fit: cover;">
                                                @endif

                                            </div> --}}
                                            <div class="name">
                                                <h6 style="font-size: 17px mb-0">
                                                    Diupdate oleh <b>{{ $post->pengguna }}</b>
                                                </h6>
                                                <p class="text-muted mb-0" style="font-size: 12px">
                                                    {{ $post->updated_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h4>Diagram Lingkarang</h4>
                                    </div>
                                    @if ($chartData != null)
                                        <center>
                                            <div class="card-body ">
                                                <div id="chart"></div>
                                            </div>
                                        </center>
                                    @else
                                        <div
                                            class="alert alert-light-danger color-danger alert-dismissible show fade m-4 p-3">
                                            <i class="fa-solid fa-triangle-exclamation"></i> <span
                                                style="font-size:13px">Data belum tersedia!</span><br>

                                            <a href="{{ route('karang.index') }}">
                                                <button style="font-size: 10px;" type="button"
                                                    class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#modalCreate" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit data"><i
                                                        class="bi bi-plus-square "></i>
                                                    Tambah Data
                                                </button>
                                            </a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 col-xl-8">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Data Stasiun {{ $post->nama }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-hover table-lg">
                                        <tr>
                                            <th>Informasi</th>
                                        </tr>
                                        <tr>
                                            <td>Nama Stasiun</td>
                                            <td>
                                                <b>{{ $post->nama }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td>
                                                <b>{{ $post->latitude }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude</td>
                                            <td>
                                                <b>{{ $post->longitude }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kedalaman</td>
                                            <td>
                                                <b>{{ $post->kedalaman }} meter</b>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Gambar {{ $post->nama }}</h4>
                            </div>
                            @if ($post->image != '')
                                <div class="card-body">
                                    <!-- Button trigger modal -->
                                    <a data-bs-toggle="modal" data-bs-target="#lihatGambar">

                                        <center>
                                            <img src="{{ asset('storage/posts/' . $post->image) }}"
                                                class="rounded shadow-lg mb-4 shadow" style="max-height: 500px; max-width: 90%"
                                                alt="{{ $post->image }}">
                                        </center>
                                    </a>
                                    @include('dist.includes.Detail.modalLihatGambar')
                                </div>
                            @else
                            <div
                            class="alert alert-light-danger color-danger alert-dismissible show fade m-3 p-3">
                            <i class="fa-solid fa-triangle-exclamation"></i> <span
                                style="font-size:12px">Gambar belum tersedia!</span><br>

                            <a href="{{ route('stasiun.index') }}">
                                <button class="btn btn-primary" style="font-size: 10px; width: 100px" type="button">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit Data
                                </button>
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                            @endif
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('script')
    <!-- Need: Apexcharts -->
    <script src=" {{ asset('admin/extensions/apexcharts/apexcharts.min.js') }} "></script>
    <script src=" {{ asset('admin/static/js/pages/dashboard.js') }} "></script>

    <script>
        @if ($chartData)
            var options = {
                series: [
                    {{ $chartData['karang_hidup'] }},
                    {{ $chartData['karang_mati'] }},
                    {{ $chartData['algae'] }},
                    {{ $chartData['abiotik'] }},
                    {{ $chartData['biota_lain'] }}
                ],
                chart: {
                    width: 290,
                    type: 'pie',
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 400
                        }
                    },
                    toolbar: {
                        show: true,
                        tools: {
                            download: '<i class="fa-solid fa-bars" style="color: #cfcfcf;"></i>'
                        }
                    },

                },
                grid: {
                    row: {
                        colors: ['#F44336', '#E91E63', '#9C27B0']
                    },
                    column: {
                        colors: ['#F44336', '#E91E63', '#9C27B0']
                    }
                },
                labels: ['Karang Hidup', 'Karang Mati', 'Algae', 'Abiotik', 'Biota Lain'],
                colors: ['#008FFB', '#FF4560', '#FFC300', '#A933FF', '#3eb650'],
                legend: {
                    position: 'bottom', // Set posisi legenda di bagian bawah
                },
                dataLabels: {
                    formatter: function(value, {
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        return value.toFixed(2) + '%';
                    }
                },

                responsive: [{
                    breakpoint: 400,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        @endif
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('admin/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
@endpush
