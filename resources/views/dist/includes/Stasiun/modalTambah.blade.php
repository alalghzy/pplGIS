<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stasiun.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                        <!-- error message untuk title -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Nama Stasiun</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" placeholder="Masukkan nama stasiun">

                        <!-- error message untuk nama -->
                        @error('nama')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Latitude</label>
                        <input type="number" class="form-control @error('latitude') is-invalid @enderror"
                            name="latitude" value="{{ old('latitude') }}" placeholder="Masukkan koordinat lintang">

                        <!-- error message untuk latitude -->
                        @error('latitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1">Longitude</label>
                        <input type="number" class="form-control @error('longitude') is-invalid @enderror"
                            name="longitude" value="{{ old('longitude') }}" placeholder="Masukkan koordinat bujur">

                        <!-- error message untuk longitude -->
                        @error('longitude')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-1">Kedalaman (meter)</label>
                        <input type="number" class="form-control @error('kedalaman') is-invalid @enderror"
                            name="kedalaman" value="{{ old('kedalaman') }}" placeholder="Masukkan kedalaman stasiun">

                        <!-- error message untuk kedalaman -->
                        @error('kedalaman')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger shadow-sm" data-bs-dismiss="modal"><i
                                class="fa-solid fa-angle-left"></i> Kembali</button>
                        <button type="submit" class="btn btn-success shadow-sm"><i
                                class="fa-regular fa-square-plus"></i> Tambah Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
