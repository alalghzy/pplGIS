<section id="dataobjek" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-offset="500" style="margin-bottom: px">

        <div class="section-title">
            <h2>Data Iventarisasi</h2>
            <p></p>
        </div>
        <div class="card-body">
            <table id="tabel-data" class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    </tr>
                </thead>
                @if ($posts->count())
                    @foreach ($posts as $key => $post)
                        <tr id="tr_{{ $post->id_post }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $post->nama }}</td>
                            <td>{{ $post->deskripsi }}</td>
                            <td>{{ $post->latitude }}</td>
                            <td>{{ $post->longitude }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>

    </div>
</section>
