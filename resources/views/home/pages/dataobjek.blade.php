<section id="dataobjek" class="portfolio section-bg">
    <div class="container" data-aos="fade-up" data-aos-offset="500" style="margin-bottom: px">

        <div class="section-title">
            <h2>Data Iventarisasi</h2>
            <p></p>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th style="text-align: center">Lihat Gambar</th>
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
                            <td class="text-center" style="width: 200px">
                                <button type="button" class="btn btn btn-dark"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalLihat-{{ $post->id_post }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Data">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                            @include('home.includes.modalLihat')
                        </tr>
                    @endforeach
                @else
                    <div class="alert alert-danger">
                        Data belum tersedia!
                    </div>
                @endif
            </table>
        </div>

    </div>
</section>
