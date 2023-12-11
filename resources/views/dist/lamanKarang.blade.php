@extends('layouts.app')

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Terumbu Karang</h3>
                <p class="text-subtitle text-muted">Laman manajemen data terumbu karang.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/laman/admin"><i class="bi bi-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen Data / Data Terumbu Karang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modalCreate" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Tambah data">
                                    <i class="bi bi-plus-square fs-5"></i> Tambah Data
                                </button>

                                <button class="btn btn-danger btn-sm removeAll ms-3" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Hapus semua data yang dipilih">
                                    <i class="bi bi-trash fs-5"></i> Hapus Banyak Data
                                </button>
                                {{-- @include('dist.includes.Karang.modalTambah') --}}

                                <div class="modal fade" id="modalCreate" aria-hidden="true"
                                    aria-labelledby="modalCreateLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalCreateLabel">Pilih Stasiun</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('karang.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="font-weight-bold mb-1">Pilih Stasiun</label>
                                                        <select name="stasiun"
                                                            class="form-control @error('stasiun') is-invalid @enderror">
                                                            <option value="">Pilih Stasiun</option>
                                                            @foreach ($posts as $item)
                                                                <option value="{{ $item->id }}"> {{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('stasiun')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                                    data-bs-toggle="modal">Input data terumbu karang</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Input data
                                                    terumbu karang</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('stasiun.store') }}" method="POST"
                                                    enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="form-group">
                                                        <label class="font-weight-bold mb-1">Nama Terumbu Karang</label>
                                                        <input type="text"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            name="nama" value="{{ old('nama') }}"
                                                            placeholder="Masukkan nama terumbu karang">

                                                        <!-- error message untuk nama -->
                                                        @error('nama')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold mb-1">Status</label>
                                                        <select name="status"
                                                            class="form-control @error('status') is-invalid @enderror">
                                                            <option value="">Pilih Status</option>
                                                            <option value="Karang Hidup">
                                                                Karang Hidup
                                                            </option>
                                                            <option value="Karang Mati">
                                                                Karang Mati
                                                            </option>
                                                        </select>

                                                        <!-- error message untuk latitude -->
                                                        @error('latitude')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold mb-1">Jumlah</label>
                                                        <input type="number"
                                                            class="form-control @error('jumlah') is-invalid @enderror"
                                                            name="jumlah" value="{{ old('jumlah') }}"
                                                            placeholder="Masukkan jumlah">
                                                        <!-- error message untuk jumlah -->
                                                        @error('jumlah')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger shadow-sm"
                                                    data-bs-target="#modalCreate" data-bs-toggle="modal">
                                                    <i class="fa-solid fa-angle-left"></i> Kembali
                                                </button>
                                                <button type="submit" class="btn btn-success shadow-sm"><i
                                                        class="fa-regular fa-square-plus"></i> Tambah Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover table-bordered" id="table-data">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 10px"><input type="checkbox" id="checkboxesMain"></th>
                                            <th style="width: 10px">No</th>
                                            <th>Nama Terumbu Karang</th>
                                            <th>Nama Stasiun</th>
                                            <th>Status</th>
                                            <th>Jenis Marga</th>
                                            <th>Waktu</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    @if ($karangs->count())
                                        @foreach ($karangs as $key => $post)
                                            <tr id="tr_{{ $post->id }}">
                                                <td style="width: 10px"><input type="checkbox" class="checkbox"
                                                        data-id="{{ $post->id }}">
                                                </td>
                                                <td style="width: 10px">{{ $loop->iteration }}</td>
                                                <td>{{ $post->nama }}</td>
                                                <td>{{ $post->post->nama }}</td>
                                                <td>{{ $post->status }}</td>
                                                <td>{{ $post->jenis_marga }}</td>
                                                <td>{{ $post->updated_at }}</td>
                                                <td class="text-center" style="width: 140px">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="btn-group fs-5">
                                                            <button type="button" class="btn btn btn-dark"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalLihat-{{ $post->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Lihat Data">
                                                                <i class="bi bi-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalEdit-{{ $post->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Edit Data">
                                                                <i class="bi bi-pencil-square fs-6"></i>
                                                            </button>
                                                            <button type="button" class="btn btn btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#hapusdata-{{ $post->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Hapus Data">
                                                                <i class="bi bi-trash fs-6"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- @include('admin.includes.Stasiun.modalLihat')
                                                @include('admin.includes.Stasiun.modalEdit')
                                                @include('admin.includes.Stasiun.modalHapus') --}}
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="alert alert-danger">
                                            Data belum tersedia, silahkan &ensp;<button style="font-size: 10px;"
                                                type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#modalCreate" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit data"><i
                                                    class="bi bi-plus-square "></i>
                                                Tambah Data</button> &ensp;!
                                        </div>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @push('style')
            <!-- Page specific javascripts-->
            <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
        @endpush

        @push('script')
            <!-- Data table plugin-->
            <script type="text/javascript" src=" {{ asset('admin/vali/js/plugins/jquery.dataTables.min.js') }} "></script>
            <script type="text/javascript">
                $('#table-data').DataTable({
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 5
                });
            </script>

            {{-- Sweeet Alert --}}
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#checkboxesMain').on('click', function(e) {
                        if ($(this).is(':checked', true)) {
                            $(".checkbox").prop('checked', true);
                        } else {
                            $(".checkbox").prop('checked', false);
                        }
                    });
                    $('.checkbox').on('click', function() {
                        if ($('.checkbox:checked').length == $('.checkbox').length) {
                            $('#checkboxesMain').prop('checked', true);
                        } else {
                            $('#checkboxesMain').prop('checked', false);
                        }
                    });
                    $('.removeAll').on('click', function(e) {
                        var studentIdArr = [];
                        $(".checkbox:checked").each(function() {
                            studentIdArr.push($(this).attr('data-id'));
                        });
                        if (studentIdArr.length <= 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Anda belum memilih data!'
                            });
                        } else {
                            Swal.fire({
                                icon: 'question',
                                title: 'Konfirmasi',
                                text: 'Apakah Anda yakin ingin menghapus data terpilih?',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var stuId = studentIdArr.join(",");
                                    $.ajax({
                                        url: "{{ url('laman/delete-all') }}",
                                        type: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                                'content')
                                        },
                                        data: 'ids=' + stuId,
                                        success: function(data) {
                                            if (data['status'] == true) {
                                                $(".checkbox:checked").each(function() {
                                                    $(this).parents("tr").remove();
                                                });
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Sukses!',
                                                    text: data['message']
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        location
                                                            .reload(); // Merefresh halaman
                                                    }
                                                });
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Error occurred.'
                                                });
                                            }
                                        },
                                        error: function(data) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: data.responseText
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    });
                });
            </script>
        @endpush
