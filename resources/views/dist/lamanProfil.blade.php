@extends('layouts.app')

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil Akun</h3>
                <p class="text-subtitle text-muted">Laman manajemen data akun.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="row">

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="avatar avatar-2xl">
                                @if (Auth::user()->profil != null)
                                    <img id="userImage" src="{{ asset(Auth::user()->profil) }}" alt=""
                                        style="object-fit: cover;">
                                @else
                                    <img src="{{ asset('admin/compiled/jpg/2.jpg') }}">
                                @endif
                            </div>
                            <h5 class="mt-3">{{ $data->name }}</h5>
                            <p class="text-small">{{ $data->status }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title"></h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">{{ $data->name }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Password</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Foto Profil</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="card-body">
                                    <form action="{{ route('update_profil', ['id' => auth()->user()->id]) }}"
                                        method="POST">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <h3>Edit Data Akun</h3>
                                            <hr>
                                            <label class="form-label">Nama</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <span class="input-group-text text-muted ">
                                                    <i class="fa-solid fa-address-card"></i>
                                                </span>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $data->name }}" placeholder="Isi dengan nama lengkap">
                                                @error('name')
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label">Email</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <span class="input-group-text  text-muted">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ $data->email }}" placeholder="Isi dengan email yang valid">
                                                <br />
                                                @error('email')
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Status Akun</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <span class="input-group-text  text-muted">
                                                    <i class="fa-solid fa-user-gear"></i>
                                                </span>
                                                <input type="text" name="status" readonly disabled
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    value="{{ $data->status }}">
                                                <input type="text" name="status" hidden
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    value="{{ $data->status }}">
                                                @error('status')
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex mb-3">
                                            <div class="ms-auto">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-check"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card-body">
                                    <form action="{{ route('ubah_password', ['id' => auth()->user()->id]) }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <h3>Ubah Password</h3>
                                            <hr>
                                            <label class="form-label">Password Sekarang</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <span class="input-group-text text-muted">
                                                    <i class="fa-solid fa-lock"></i>
                                                </span>
                                                <input
                                                    class="input100 form-control @error('old_password') is-invalid @enderror"
                                                    id="old_password" name="old_password" type="password"
                                                    placeholder="Masukkan password sekarang" required>
                                                @error('old_password')
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Password Baru</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <span class="input-group-text text-muted">
                                                    <i class="fa-solid fa-lock"></i>
                                                </span>
                                                <input
                                                    class="input100 form-control @error('new_password') is-invalid @enderror"
                                                    id="new_password" name="new_password" type="password"
                                                    placeholder="Masukkan password baru" required>
                                                @error('new_password')
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Konfirmasi Password</label>
                                            <div class="wrap-input100 validate-input input-group">
                                                <span class="input-group-text text-muted">
                                                    <i class="fa-solid fa-lock"></i>
                                                </span>
                                                <input
                                                    class="input100 form-control @error('confirm_password') is-invalid @enderror"
                                                    id="confirm_password" type="password" name="confirm_password"
                                                    placeholder="Konfirmasi password baru" required>
                                                @error('confirm_password')
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex mb-3">
                                            <div class="ms-auto">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-check"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="card-body">
                                    <h3>Ganti Foto Profil</h3>
                                    <hr>
                                    <form action="{{ route('update_foto_profil', ['id' => auth()->user()->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf

                                        @if (auth()->user()->profil != null)
                                            <center>
                                                <img src="{{ asset(Auth::user()->profil) }}" alt=""
                                                    class="rounded shadow-sm mb-3"
                                                    style="object-fit: cover;max-width: 100%; max-height: auto">
                                            </center>
                                        @endif

                                        @if (Auth::user()->profil != null)
                                            <div class="row">
                                                <div class="form-group col-11">
                                                    <label>Unggah foto profil</label>
                                                    <input class="form-control" id="formFile" name="profil"
                                                        type="file">
                                                    <small style="color: gray">Disarankan untuk gambar ukuran
                                                        1:1 | Maks. 2Mb | png, jpg,
                                                        jpeg</small>
                                                </div>
                                                <div class="col-1">
                                                    <br>
                                                    <a href="{{ route('delete.image.profil', ['id' => auth()->user()->id]) }}"
                                                        onclick="return confirm('Apakah Anda ingin menghapus gambar?')">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Hapus Gambar">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label class="mb-1">Unggah foto profil</label>
                                                    <input class="form-control" id="formFile" name="profil"
                                                        type="file">
                                                    <small style="color: gray">Disarankan untuk gambar ukuran
                                                        1:1 | Maks. 2Mb | Format png, jpg, dan
                                                        jpeg</small>
                                                </div>
                                            </div>
                                        @endif
                                        <hr>
                                        <div class="d-flex mb-3">
                                            <div class="ms-auto">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-check"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('style')
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var avatar = $(".avatar");
            var userImage = $("#userImage");

            var avatarWidth = avatar.width();
            var avatarHeight = avatar.height();

            userImage.on("load", function() {
                var imageWidth = userImage.width();
                var imageHeight = userImage.height();

                if (imageWidth < avatarWidth || imageHeight < avatarHeight) {
                    userImage.css("width", "100%");
                    userImage.css("height", "auto");
                }
            });
        });
    </script>
@endpush
