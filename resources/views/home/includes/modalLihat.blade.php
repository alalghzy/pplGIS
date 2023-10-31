<div class="modal fade" id="modalLihat-{{ $post->id_post }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Lihat Data {{$post->nama}}</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body" >
                <div class="container mt-5 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">
                                    <img src="{{ asset('storage/posts/' . $post->image) }}" class="w-100 rounded" alt="{{$post->image}}">
                                    <hr>
                                    <h4>{{ $post->nama }}</h4>
                                    <p class="tmt-3">
                                        {!! $post->deskripsi !!}
                                        {{ $post->latitude }}
                                                {{ $post->longitude }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
