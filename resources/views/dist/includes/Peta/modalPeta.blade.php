@foreach ($karangs as $item)
    <div class="modal fade" id="locationModal-{{ $item->post->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg text-start"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data {{ $item->post->nama }}</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">

                                        @if ($item->post->image != '')
                                            <center>
                                                <img src="{{ asset('storage/posts/' . $item->post->image) }}"
                                                    class="rounded shadow-lg mb-4"
                                                    style="max-height: 500px; max-width: 90%" alt="{{ $item->image }}">
                                            </center>
                                        @endif

                                        <h4>
                                            {{ $item->post->nama }}
                                            <br><span style="font-size: 13px; color: darkgray;"> Diupdate oleh
                                                {{ $item->post->pengguna }} pada {{ $item->post->updated_at }}</span>
                                        </h4>
                                        <hr>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-primary">Latitude</button>
                                            <button type="button"
                                                class="btn btn-primary">{{ $item->post->latitude }}</button>
                                            <button type="button" class="btn btn-danger">Longitude</button>
                                            <button type="button"
                                                class="btn btn-danger">{{ $item->post->longitude }}</button>
                                            <button type="button" class="btn btn-success">Kedalaman</button>
                                            <button type="button"
                                                class="btn btn-success">{{ $item->post->kedalaman }}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <a style="color: white" href="{{ route('detail.stasiun', ['id' => $item->post->id]) }}">
                        <button class="btn btn-primary">Lihat Detail Data</button>
                    </a>
                    <button type="submit" class="btn btn-warning shadow-sm"
                        data-bs-target="#terumbuData-{{ $item->id }}" data-bs-toggle="modal"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat data terumbu karang">
                        <i class="fa-solid fa-angles-right" style="color: black;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="terumbuData-{{ $item->id }}" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Data Terumbu Karang {{ $item->post->nama }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <hr>
                    <center>
                        <div class="btn-group shadow-sm" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-primary">Karang Hidup</button>
                            <button type="button" class="btn btn-primary">{{ $item->karang_hidup }}%</button>
                            <button type="button" class="btn btn-danger">Karang Mati</button>
                            <button type="button" class="btn btn-danger">{{ $item->karang_mati }}%</button>
                            <button type="button" class="btn btn-warning">Algae</button>
                            <button type="button" class="btn btn-warning">{{ $item->algae }}%</button>
                            <button type="button" class="btn btn-success">Biota Lain</button>
                            <button type="button" class="btn btn-success">{{ $item->biota_lain }}%</button>
                            <button type="button" class="btn btn-dark">Abiotik</button>
                            <button type="button" class="btn btn-dark">{{ $item->abiotik }}%</button>
                        </div>
                    </center>

                </div>
                <div class="modal-footer">
                    <a style="color: white" href="{{ route('detail.stasiun', ['id' => $item->post->id]) }}">
                        <button class="btn btn-primary">Lihat Detail Data</button>
                    </a>
                    <button class="btn btn-warning" data-bs-target="#locationModal-{{ $item->post->id }}"
                        data-bs-toggle="modal"data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Lihat data terumbu karang">
                        <i class="fa-solid fa-angles-left" style="color: black;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
