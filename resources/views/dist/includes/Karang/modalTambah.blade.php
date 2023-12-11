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
                <form action="{{ route('karang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold mb-1">Nama Stasiun</label>
                        <select name="stasiun" class="form-control @error('stasiun') is-invalid @enderror">
                            <option value="">Pilih Stasiun</option>
                            @foreach ($posts as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                            @endforeach
                        </select>
                        @error('stasiun')
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
