                                <!-- Modal Ubah PP-->
                                <div class="modal fade" id="modalUbahPP" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                                                    alt="" class="rounded shadow-lg mb-3"
                                                                    style="object-fit: cover;max-width: 100%; max-height: auto">
                                                            </center>
                                                        @endif

                                                        @if (Auth::user()->profil != null)
                                                        <div class="row">
                                                            <div class="form-group col-11">
                                                                <label>Unggah foto profil</label>
                                                                <input class="form-control" id="formFile"
                                                                    name="profil" type="file">
                                                                <small style="color: gray">Disarankan untuk gambar ukuran
                                                                    1:1 | Maks. 2Mb | png, jpg,
                                                                    jpeg</small>
                                                            </div>
                                                            <div class="col-1">
                                                                <br>
                                                                <a href="{{ route('delete.image.profil', ['id'=>auth()->user()->id]) }}"
                                                                    onclick="return confirm('Apakah Anda ingin menghapus gambar?')">
                                                                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Hapus Gambar">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Unggah foto profil</label>
                                                                <input class="form-control" id="formFile"
                                                                    name="profil" type="file">
                                                                <small style="color: gray">Disarankan untuk gambar ukuran
                                                                    1:1 | Maks. 2Mb | Format png, jpg, dan
                                                                    jpeg</small>
                                                            </div>
                                                        </div>
                                                        @endif

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
