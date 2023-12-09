                                <!-- Modal Ubah Password-->
                                <div class="modal fade" id="modalUbahPassword" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form
                                                        action="{{ route('ubah_password', ['id' => auth()->user()->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="form-label">Password Sekarang</label>
                                                            <div class="wrap-input100 validate-input input-group">
                                                                <span class="input-group-text bg-white text-muted">
                                                                    <i class="fa-solid fa-lock"></i>
                                                                </span>
                                                                <input
                                                                    class="input100 form-control @error('old_password') is-invalid @enderror"
                                                                    id="old_password" name="old_password"
                                                                    type="password"
                                                                    placeholder="Masukkan password sekarang" required>
                                                                @error('old_password')
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Password Baru</label>
                                                            <div class="wrap-input100 validate-input input-group">
                                                                <span class="input-group-text bg-white text-muted">
                                                                    <i class="fa-solid fa-lock"></i>
                                                                </span>
                                                                <input
                                                                    class="input100 form-control @error('new_password') is-invalid @enderror"
                                                                    id="new_password" name="new_password"
                                                                    type="password" placeholder="Masukkan password baru"
                                                                    required>
                                                                @error('new_password')
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Konfirmasi Password</label>
                                                            <div class="wrap-input100 validate-input input-group">
                                                                <span class="input-group-text bg-white text-muted">
                                                                    <i class="fa-solid fa-lock"></i>
                                                                </span>
                                                                <input
                                                                    class="input100 form-control @error('confirm_password') is-invalid @enderror"
                                                                    id="confirm_password" type="password"
                                                                    name="confirm_password"
                                                                    placeholder="Konfirmasi password baru" required>
                                                                @error('confirm_password')
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Kembali</button>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
