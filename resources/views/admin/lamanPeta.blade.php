@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
@endpush

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peta Persebaran</h3>
                <p class="text-subtitle text-muted">Peta informasi geografis data objek.</p>
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
    {{-- <section>
        <div class="col-12 col-xl-12">
            <div class="card">
                <div id="map" style="width:100%;height:500px;">
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHjsOSG5_OHakhsKWBg9pwaG_EKZXZkfI&callback=initMap">
                    </script>
                    <script>
                        function initialize() {
                            var mapOptions = {
                                zoom: 18,
                                center: new google.maps.LatLng(-3.838195020251307, 102.1797480229322),
                                // -3.760280003973284, 102.27250601387755
                                disableDefaultUI: false,
                                mapTypeId: 'satellite'
                            };
                            var mapElement = document.getElementById('map');
                            var map = new google.maps.Map(mapElement, mapOptions);
                            var locations = [
                                @foreach ($posts as $item)
                                    {
                                        latitude: {{ $item->latitude }},
                                        longitude: {{ $item->longitude }},
                                        idPost: {{ $item->id_post }},
                                        title: "{{ $item->nama }}"
                                    },
                                @endforeach
                            ];
                            for (var i = 0; i < locations.length; i++) {
                                (function() {
                                    var location = locations[i];
                                    var marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(location.latitude, location.longitude),
                                        map: map,
                                        title: location.title,
                                        icon: '{{ asset('img/location.png') }}'
                                    });
                                    var infowindow = new google.maps.InfoWindow({
                                        content: location.title
                                    });
                                    // Tambahkan event listener untuk menampilkan modal saat marker diklik
                                    marker.addListener('click', function() {
                                        var id_post = location.idPost;
                                        $('#locationTitle-' + id_post).text(this.title);
                                        $('#locationModal-' + id_post).modal('show');
                                    });
                                })();
                            }
                        }
                        // Memanggil fungsi initialize setelah peta API Google Maps dimuat
                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                </div>
            </div>
        </div>
        @include('admin.includes.modalPeta')
    </section> --}}

    <section>
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="m-1">

                </div>
                <div class="rounded" id="map" style="height:550px;">

                    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                    <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
                    <script>
                        function initialize() {
                            var map = L.map('map').setView([-3.838195020251307, 102.1797480229322], 17);

                            var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; OpenStreetMap contributors'
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
                                        idPost: {{ $item->id_post }},
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
                                var id_post = location.idPost;
                                $('#locationTitle-' + id_post).text(e.target.getPopup().getContent());
                                $('#locationModal-' + id_post).modal('show');
                            };
                        }

                        function getIcon(kedalaman) {
                            // Menyesuaikan ikon berdasarkan kedalaman
                            // Gantilah dengan logika sesuai kebutuhan Anda
                            if (kedalaman <= 3) {
                                return L.icon({
                                    iconUrl: '{{ asset('img/location.png') }}',
                                    iconSize: [32, 32],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32]
                                });
                            } else if (kedalaman >= 4 && kedalaman <= 6) {
                                return L.icon({
                                    iconUrl: '{{ asset('img/pin.png') }}',
                                    iconSize: [32, 32],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32]
                                });
                            } else if (kedalaman >= 7 && kedalaman <= 9) {
                                return L.icon({
                                    iconUrl: '{{ asset('img/Lamp-icon.png') }}',
                                    iconSize: [32, 32],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32]
                                });
                            } else if (kedalaman >= 10 && kedalaman <= 12) {
                                return L.icon({
                                    iconUrl: '{{ asset('home/img/profile-img.jpg') }}',
                                    iconSize: [32, 32],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32]
                                });
                            } else {
                                return L.icon({
                                    iconUrl: '{{ asset('img/pin.png') }}',
                                    iconSize: [32, 32],
                                    iconAnchor: [16, 32],
                                    popupAnchor: [0, -32]
                                });
                            }
                        }

                        window.onload = initialize;
                    </script>


                </div>
                <div class="row">
                    <div class="m-2" id="tileLayerButtons">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="tileLayerSwitch" checked>
                            <label class="form-check-label" for="tileLayerSwitch">Satellite View</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($posts as $item)
            <div class="modal fade" id="locationModal-{{ $item->id_post }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg text-start"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->nama }}</h5>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x"></i></button>
                        </div>
                        <div class="modal-body">
                            @if ($item->image != '')
                                <center>
                                    <div class="card-body">
                                        <img src="{{ asset('storage/posts/' . $item->image) }}" class="rounded"
                                            style="">
                                    </div>
                                </center>
                            @endif
                            <table class="table table-sm">
                                <thead>
                                    <tr class="text-start">
                                        <th class="text-center" scope="col">Latitude</th>
                                        <th class="text-center" scope="col">Longitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{ $item->latitude }}</td>
                                        <td class="text-center">{{ $item->longitude }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
