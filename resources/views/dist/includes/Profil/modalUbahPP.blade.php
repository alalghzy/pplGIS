                                <!-- Modal Ubah PP-->
                                <div class="modal fade" id="modalUbahPP" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Foto Profil</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form
                                                        action="{{ route('update_foto_profil', ['id' => auth()->user()->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @if (auth()->user()->profil != null)
                                                            <center>
                                                                <img src="{{ asset(Auth::user()->profil) }}"
                                                                    alt="" class="rounded shadow-lg mb-2"
                                                                    style="object-fit: cover;max-width: 100%; max-height: auto">
                                                            </center>
                                                        @endif
                                                        <div class="form-group">
                                                            <label>Unggah foto profil</label>
                                                            <input class="form-control mt-1" id="formFile"
                                                                name="profil" type="file">
                                                            <small style="color: gray">Disarankan untuk gambar ukuran
                                                                3:4 | Maks. 2Mb | png, jpg,
                                                                jpeg</small>
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
