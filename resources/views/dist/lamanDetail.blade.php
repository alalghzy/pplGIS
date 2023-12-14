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
                    Detail data {{ $post->nama }}
                </h3>
                <p class="text-subtitle text-muted"></p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="row">
        <div class="page-content">
            <ul>
                <li>
                    {{ $post->nama }}
                </li>
                <li>
                    {{ $post->latitude }}
                </li>
                <li>
                    {{ $post->longitude }}
                </li>
                <li>
                    {{ $post->kedalaman }}
                </li>
                @foreach ($post->karangs as $item)
                    <li>
                        {{ $item->algae }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card col-8" id="map"></div>
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
                            '<p>{{ $post->kedalaman }}</p>' +
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

        <div class="card">
            <div class="card-header">
                <h4>Diagram Tutupan Komunitas Karang {{ $post->nama }}</h4>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>


    </section>
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
                    width: 300,
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
                    breakpoint: 500,
                    options: {
                        chart: {
                            width: 300
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
