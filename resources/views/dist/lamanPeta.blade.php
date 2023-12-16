@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
@endpush

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peta Persebaran</h3>
                <p class="text-subtitle text-muted">Peta informasi geografis data stasiun terumbu karang.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/laman/admin"><i class="bi bi-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Peta Persebaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <div class="col-12 col-xl-12">
            <div class="card shadow-sm">
                <div class="m-1">
                </div>

                <div class="rounded" id="map" style="height:450px;">

                    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                    <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
                    <script>
                        function initialize() {
                            var map = L.map('map', {
                                center: [-3.838195020251307, 102.1797480229322],
                                zoom: 15,
                                scrollWheelZoom: true // Aktifkan zoom dengan kombinasi Ctrl + scroll
                            });

                            var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; OpenStreetMap contributors'
                            });

                            // Tambahkan event listener untuk menangani zoom hanya ketika tombol Ctrl ditekan
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

                            mapLink = '<a href="https://github.com/alalghzy">alalghzy</a>';
                            wholink = 'Sistem Informasi Geografis Pulau Tikus';

                            var arcgisLayer = L.tileLayer(
                                'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                    attribution: '&copy; ' + mapLink + ', ' + wholink,
                                    maxZoom: 18,
                                });

                            // Tambahkan event listener untuk switch
                            document.getElementById('tileLayerSwitch').addEventListener('change', function() {
                                if (this.checked) {
                                    // Jika switch dinonaktifkan (off), tampilkan layer ArcGIS Imagery
                                    map.eachLayer(function(layer) {
                                        if (layer instanceof L.TileLayer) {
                                            map.removeLayer(layer);
                                        }
                                    });
                                    arcgisLayer.addTo(map);
                                } else {
                                    // Jika switch diaktifkan (on), tampilkan layer OpenStreetMap
                                    map.eachLayer(function(layer) {
                                        if (layer instanceof L.TileLayer) {
                                            map.removeLayer(layer);
                                        }
                                    });
                                    osmLayer.addTo(map);
                                }
                            });

                            // Tambahkan tombol fullscreen
                            var fullscreenControl = new L.Control.Fullscreen();
                            map.addControl(fullscreenControl);

                            // Secara default, tampilkan layer OpenStreetMap
                            arcgisLayer.addTo(map);

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

                            for (var i = 0; i < locations.length; i++) {
                                var location = locations[i];

                                // Menyesuaikan ikon berdasarkan kedalaman
                                var icon = getIcon(location.kedalaman);
                                var marker = L.marker([location.latitude, location.longitude], {
                                    title: location.title,
                                    icon: icon
                                }).addTo(map);

                                var popupContent = '<b>' + location.title + '</b>';
                                marker.bindPopup(popupContent);

                                // Tambahkan event listener untuk menampilkan modal saat marker diklik
                                marker.on('click', createMarkerClickHandler(location));
                            }
                        }

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

                        window.onload = initialize;
                    </script>
                </div>
                <div class="row">
                    <div class="mt-1 ms-1 mb-1 col-md-3" id="tileLayerButtons">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="tileLayerSwitch" checked>
                            <label class="form-check-label" for="tileLayerSwitch">Satellite View</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dist.includes.Peta.modalPeta')
    </section>
@endsection

@section('script')

@endsection
