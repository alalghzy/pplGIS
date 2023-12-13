<div class="modal fade" id="modalLihat-{{ $post->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Informasi Data</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">

                                    @if ($post->image != '')
                                        <center><img src="{{ asset('storage/posts/' . $post->image) }}"
                                                class="rounded shadow-lg mb-4" style="max-width: 500px"
                                                alt="{{ $post->image }}">
                                        </center>
                                    @endif

                                    <h4>
                                        {{ $post->post->nama }}
                                        <br><span style="font-size: 13px; color: darkgray;"> Diupdate oleh
                                            {{ $post->user->name }} pada {{ $post->updated_at }}</span>
                                    </h4>
                                    <hr>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-primary">Karang Hidup</button>
                                        <button type="button"
                                            class="btn btn-primary">{{ $post->karang_hidup }}</button>
                                        <button type="button" class="btn btn-danger">Karang Mati</button>
                                        <button type="button" class="btn btn-danger">{{ $post->karang_mati }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <a style="color: white" href="{{ route('detail.stasiun', ['id' => $post->post->id]) }}">
                    <button type="button" class="btn btn-warning shadow-xl" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Lihat Selengkapnya">
                        <i class="fa-solid fa-angles-right" style="color: black;"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
