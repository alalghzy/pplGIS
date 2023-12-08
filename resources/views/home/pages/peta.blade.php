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
                <div id="map" style="width:100%;height:440px;">
                    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
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
                                        idPost: {{ $item->id }},
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
                                        var id = location.idPost;
                                        $('#locationTitle-' + id).text(this.title);
                                        $('#locationModal-' + id).modal('show');
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
        @foreach ($posts as $item)
            <div class="modal fade" id="locationModal-{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg text-start"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->nama }}</h5>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x"></i></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr class="text-start">
                                        <th scope="col">Deskripsi</th>
                                        <th class="text-center" scope="col">Latitude</th>
                                        <th class="text-center" scope="col">Longitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $item->deskripsi }}</td>
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
    </div>
</section>
