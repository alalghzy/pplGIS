<div class="modal fade" id="modalEdit-{{ $post->id_post }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stasiun.update', $post->id_post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($post->image != '')
                        <center><img src="{{ asset('storage/posts/' . $post->image) }}" class="rounded shadow-lg mb-4"
                                style="max-width: 500px" alt="{{ $post->image }}">
                        </center>

                        <div class="container">
                            <div class="row">
                                <div class="form-group col-11">
                                    <label class="font-weight-bold">Gambar</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <a href="{{ route('delete.image', ['id' => $post->id_post]) }}"
                                        onclick="return confirm('Apakah Anda ingin menghapus gambar {{ $post->nama }}?')">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Hapus Gambar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="form-group col-12">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    @endif



                    <div class="form-group">
                        <label for="nama" class="font-weight-bold mb-1">Nama</label>
                        <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama', $post->nama) }}" placeholder="Masukkan Nama Mangrove">
                        @error('nama')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude" class="font-weight-bold mb-1">Latitude</label>
                        <input type="text" id="latitude"
                            class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                            value="{{ old('latitude', $post->latitude) }}" placeholder="Masukkan Latitude Mangrove">
                        @error('latitude')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="longitude" class="font-weight-bold mb-1">Longitude</label>
                        <input type="text" id="longitude"
                            class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                            value="{{ old('longitude', $post->longitude) }}" placeholder="Masukkan Longitude Mangrove">
                        @error('longitude')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kedalaman" class="font-weight-bold mb-1">Kedalaman</label>
                        <input type="text" id="kedalaman"
                            class="form-control @error('kedalaman') is-invalid @enderror" name="kedalaman"
                            value="{{ old('kedalaman', $post->kedalaman) }}" placeholder="Masukkan kedalaman Mangrove">
                        @error('kedalaman')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger shadow-sm" data-bs-dismiss="modal"><i
                                class="fa-solid fa-angle-left"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary shadow-sm"><i
                                class="fa-solid fa-pen-to-square"></i> Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
