<!-- Modal Register -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Daftar Akun</h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('proses_register') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group mb-3">
                        <label class="form-label">Nama</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="bi bi-person-badge"></i>
                            </span>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Isi dengan nama lengkap">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Status Akun</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="bi bi-chevron-double-right"></i>
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
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="Isi dengan email yang valid">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="wrap-input100 validate-input input-group">
                            <span class="input-group-text bg-white text-muted">
                                <i class="bi bi-key"></i>
                            </span>
                            <input class="input100 form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" name="password" type="password"
                                placeholder="Tambahkan password">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>
