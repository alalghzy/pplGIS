@extends('layouts.admin')

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
                    <li class="breadcrumb-item"><a href="/laman/admin">Dashboard</a></li>
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
                            <div class="card">
                                <div id="map" style="width:100%;height:500px;">
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
                    </section>


            @endsection
