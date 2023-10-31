<div class="modal fade" id="modalLihat-{{ $post->id_post }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Informasi Data</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body" >
                <div class="container mt-5 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">
                                    <center><img src="{{ asset('storage/posts/' . $post->image) }}" class="rounded " style="" alt="{{$post->image}}"></center>
                                    <hr>
                                    <h4>{{ $post->nama }}<hr></h4>
                                    <p>
                                        {!! $post->deskripsi !!}
                                    </p>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-danger">Latitude</button>
                                        <button type="button" class="btn btn-primary">{{ $post->latitude }}</button>
                                      </div>
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-danger">Longitude</button>
                                        <button type="button" class="btn btn-primary">{{ $post->longitude }}</button>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" class="btn btn-warning shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Selengkapnya">
                    <a style="color: white" href="">
                        <i class="fa-solid fa-angles-right" style="color: black;"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>
