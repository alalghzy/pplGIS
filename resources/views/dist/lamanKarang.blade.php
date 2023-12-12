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
                                @include('dist.includes.Karang.modalTambah')
                            </div>

                            {{-- <div class="card-body table-responsive-sm p-3">
                                <table class="table table-hover table-bordered" id="table-data">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 10px"><input type="checkbox" id="checkboxesMain"></th>
                                            <th style="width: 10px">No</th>
                                            <th>Nama Stasiun</th>
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
                                                @include('admin.includes.Stasiun.modalLihat')
                                                @include('admin.includes.Stasiun.modalEdit')
                                                @include('admin.includes.Stasiun.modalHapus')
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
                            </div> --}}

                            <div class="table-responsive table-responsive-sm m-1 p-1">
                                <table class="table table-hover table-bordered" id="table-data">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style="width: 10px"><input type="checkbox"
                                                    id="checkboxesMain"></th>
                                            <th rowspan="3">Nama Stasiun</th>
                                            <th rowspan="3">Algae</th>
                                            <th rowspan="3">Abiotik</th>
                                            <th rowspan="3">Biota Lain</th>
                                            <th colspan="15" style="text-align: center; justify-content: center">
                                                Terumbu Karang
                                            </th>
                                            <th rowspan="3" class="text-center" style="width: 140px">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th colspan="13" style="text-align: center; justify-content: center">Karang
                                                Hidup</th>
                                            <th colspan="2" style="text-align: center; justify-content: center">Karang
                                                Mati</th>
                                        </tr>
                                        <tr>
                                            <th>ACB</th>
                                            <th>ACD</th>
                                            <th>ACE</th>
                                            <th>ACS</th>
                                            <th>ACT</th>
                                            <th>CB</th>
                                            <th>CF</th>
                                            <th>CE</th>
                                            <th>CM</th>
                                            <th>CS</th>
                                            <th>CMR</th>
                                            <th>CHL</th>
                                            <th>CME</th>
                                            <th>DC</th>
                                            <th>DCA</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @if ($karangs->count())
                                            @foreach ($karangs as $key => $post)
                                                <tr id="tr_{{ $post->id }}">
                                                    <td style="width: 10px"><input type="checkbox" class="checkbox">
                                                    </td>
                                                    <td>{{ $post->post->nama }}</td>
                                                    <td>{{ $post->algae }}%</td>
                                                    <td>{{ $post->abiotik }}%</td>
                                                    <td>{{ $post->biota_lain }}%</td>
                                                    <td>{{ $post->acb }}%</td>
                                                    <td>{{ $post->acd }}%</td>
                                                    <td>{{ $post->ace }}%</td>
                                                    <td>{{ $post->acs }}%</td>
                                                    <td>{{ $post->act }}%</td>
                                                    <td>{{ $post->cb }}%</td>
                                                    <td>{{ $post->cf }}%</td>
                                                    <td>{{ $post->ce }}%</td>
                                                    <td>{{ $post->cm }}%</td>
                                                    <td>{{ $post->cs }}%</td>
                                                    <td>{{ $post->cmr }}%</td>
                                                    <td>{{ $post->chl }}%</td>
                                                    <td>{{ $post->cme }}%</td>
                                                    <td>{{ $post->dc }}%</td>
                                                    <td>{{ $post->dca }}%</td>
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
                                                Data belum tersedia, silahkan &ensp;
                                                <button style="font-size: 10px;" type="button"
                                                    class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#modalCreate" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit data">
                                                    <i class="bi bi-plus-square "></i>
                                                    Tambah Data
                                                </button> &ensp;!
                                            </div>
                                        @endif
                                    </tbody>
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

            {{-- Input Angka --}}
            <script>
                function validateNumberInput(input) {
                    // Hapus karakter selain digit, titik, dan tanda minus
                    input.value = input.value.replace(/[^0-9.-]/g, '');

                    // Hapus tanda minus jika lebih dari satu, dan pastikan hanya satu di awal
                    input.value = input.value.replace(/^-+/, '-');

                    // Hapus titik jika lebih dari satu
                    input.value = input.value.replace(/(\..*\.)/g, '$1');
                }

                function hitungKarangMati() {
                    const dcValue = parseFloat(document.getElementById('dc').value) || 0;
                    const dcaValue = parseFloat(document.getElementById('dca').value) || 0;

                    const total = dcValue + dcaValue;

                    document.getElementById('KarangMati').innerText = total.toFixed(2);

                    // Mengupdate nilai input pada HTML
                    document.getElementsByName('karang_mati')[0].value = total.toFixed(2);
                }

                function hitungKarangHidup() {
                    const elementIds = ['acb', 'acd', 'ace', 'acs', 'act', 'cb', 'cf', 'ce', 'cm', 'cs', 'cmr', 'chl', 'cme'];
                    const total = elementIds.reduce((accumulator, elementId) => {
                        const value = parseFloat(document.getElementById(elementId).value) || 0;
                        return accumulator + (isNaN(value) ? 0 : value);
                    }, 0);

                    document.getElementById('KarangHidup').innerText = total.toFixed(2);

                    // Mengupdate nilai input pada HTML
                    document.getElementsByName('karang_hidup')[0].value = total.toFixed(2);
                }


                function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode;

                    // Memperbolehkan angka, tanda desimal, tanda minus, dan tombol backspace
                    if (
                        (charCode >= 48 && charCode <= 57) || // Angka
                        charCode === 46 || // Tanda desimal
                        charCode === 45 || // Tanda minus
                        charCode === 8 // Tombol backspace
                    ) {
                        // Memastikan hanya satu tanda minus yang diperbolehkan pada posisi awal
                        if (charCode === 45 && evt.target.selectionStart !== 0) {
                            return false;
                        }
                        return true;
                    }

                    return true;
                }
            </script>
        @endpush
