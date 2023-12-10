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
                <div class="card">
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update_profil', ['id' => auth()->user()->id]) }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <h3>Edit Profil Akun</h3>
                                <hr>
                                <label class="form-label">Nama</label>
                                <div class="wrap-input100 validate-input input-group">
                                    <span class="input-group-text text-muted ">
                                        <i class="fa-solid fa-address-card"></i>
                                    </span>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}"
                                        placeholder="Isi dengan nama lengkap">
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
                                <div class="me-auto p-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-check"></i> Simpan
                                    </button>
                                </div>
                                <div class="p-2">
                                    <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                        data-bs-target="#modalUbahPassword">
                                        Ubah Password
                                    </button>
                                </div>
                                <div class="p-2">
                                    <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                        data-bs-target="#modalUbahPP">
                                        Ubah Foto Profil
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('dist.includes.Profil.modalUbahPassword')
            @include('dist.includes.Profil.modalUbahPP')
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
