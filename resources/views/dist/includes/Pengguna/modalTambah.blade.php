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
                <form action="{{ route('data-pengguna.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group mb-3">
                        <label class="form-label">Nama Pengguna</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="fa-solid fa-id-badge"></i>
                            </span>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Isi dengan nama lengkap">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="Isi dengan email yang valid">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input class="input100 form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" name="password" type="password"
                                placeholder="Tambahkan password">
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="fa-solid fa-angles-right"></i>
                            </span>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="Pembimbing" @if (old('status') == 'Pembimbing') selected @endif>
                                    Pembimbing
                                </option>
                                <option value="Petani" @if (old('status') == 'Petani') selected @endif>
                                    Petani
                                </option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
