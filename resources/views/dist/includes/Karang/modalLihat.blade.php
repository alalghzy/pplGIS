<div class="modal fade" id="modalLihat-{{ $post->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                                <div class="card-body ">

                                    @if ($post->post->image != '')
                                        <center><img src="{{ asset('storage/posts/' . $post->post->image) }}"
                                                class="rounded shadow-lg mb-4" style="max-width: 500px">
                                        </center>
                                    @endif

                                    <h4>
                                        {{ $post->post->nama }}
                                        <br><span style="font-size: 13px; color: darkgray;"> Diupdate oleh
                                            {{ $post->user->name }} pada {{ $post->updated_at }}</span>
                                    </h4>
                                    <hr>
                                    <center>
                                        <div class="btn-group shadow-sm" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-primary">Karang Hidup</button>
                                            <button type="button"
                                                class="btn btn-primary">{{ $post->karang_hidup }}</button>
                                            <button type="button" class="btn btn-danger">Karang Mati</button>
                                            <button type="button" class="btn btn-danger">{{ $post->karang_mati }}</button>
                                            <button type="button" class="btn btn-warning">Algae</button>
                                            <button type="button" class="btn btn-warning">{{ $post->algae }}</button>
                                            <button type="button" class="btn btn-success">Biota Lain</button>
                                            <button type="button" class="btn btn-success">{{ $post->biota_lain }}</button>
                                            <button type="button" class="btn btn-dark">Abiotik</button>
                                            <button type="button" class="btn btn-dark">{{ $post->abiotik }}</button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <a style="color: white" href="{{ route('detail.stasiun', ['id' => $post->post->id]) }}">
                    <button class="btn btn-primary">Lihat Detail Data</button>
                </a>
            </div>
        </div>
    </div>
</div>
