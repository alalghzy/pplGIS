<section id="peta" class="resume">
    <div class="container" data-aos="fade-up" data-aos-offset="350">
        <div class="section-title">
            <h2>Peta Inventarisasi</h2>
            <p>Sistem informasi geografis inventarisasi mengenai terumbu karang dan penyu yang ada di Pulau
                Tikus, Kota Bengkulu.</p>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                </div>
                <div class="rounded" id="map" style="height:450px;"></div>
                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
                <script>
                    function initialize() {
                        var map = L.map('map', {
                            center: [-3.838195020251307, 102.1797480229322],
                            zoom: 15,
                            scrollWheelZoom: false
                        });

                        var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; OpenStreetMap contributors'
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
        </div>
    </div>
</section>
