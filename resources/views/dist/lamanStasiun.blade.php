@extends('layouts.app')

@section('nama')
    <div class="page-title" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Stasiun</h3>
                <p class="text-subtitle text-muted">Laman manajemen data stasiun tutupan komunitas karang.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen Data / Data Stasiun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-content">
        <section class="row" >
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="card shadow-sm">
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
                                @include('dist.includes.Stasiun.modalTambah')
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-hover table-bordered" id="table-data" data-aos="fade-up" data-aos-delay="170">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 10px"><input type="checkbox" id="checkboxesMain"></th>
                                            {{-- <th style="width: 10px">No</th> --}}
                                            <th>Nama Stasiun</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Kedalaman (meter)</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    @if ($stasiun->count())
                                        @foreach ($stasiun as $post)
                                            <tr id="tr_{{ $post->id }}">
                                                <td style="width: 10px"><input type="checkbox" class="checkbox"
                                                        data-id="{{ $post->id }}">
                                                </td>
                                                {{-- <td style="width: 10px">{{ $loop->iteration }}</td> --}}
                                                <td>{{ $post->nama }}</td>
                                                <td>{{ $post->latitude }}</td>
                                                <td>{{ $post->longitude }}</td>
                                                <td>{{ $post->kedalaman }}</td>
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
                                                @include('dist.includes.Stasiun.modalLihat')
                                                @include('dist.includes.Stasiun.modalEdit')
                                                @include('dist.includes.Stasiun.modalHapus')
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="alert alert-danger">
                                            Data belum tersedia, silahkan &ensp;<button style="font-size: 10px;"
                                                type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#modalCreate" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit data"><i class="bi bi-plus-square "></i>
                                                Tambah Data</button> &ensp;!
                                        </div>
                                    @endif
                                </table>
                            </div>
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
                                url: "{{ url('laman/delete-all-stasiuns') }}",
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

    <script>
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^\d.-]/g, ''); // Menghapus karakter selain angka, titik, dan minus
        }
    </script>
@endpush
