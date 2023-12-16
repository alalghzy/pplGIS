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
                                @include('dist.includes.Karang.modalTambah')
                            </div>

                            <div class="card-body table-responsive m-1 p-1">
                                <table class="table table-hover table-bordered" id="table-data">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style="width: 10px">
                                                <input type="checkbox" id="checkboxesMain">
                                            </th>
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
                                            <th colspan="13" style="text-align: center; justify-content: center">
                                                Karang Hidup
                                            </th>
                                            <th colspan="2" style="text-align: center; justify-content: center">
                                                Karang Mati
                                            </th>
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
                                    <tbody class="table-group-divider">
                                        @if ($karangs->count())
                                            @foreach ($karangs as $post)
                                                <tr id="tr_{{ $post->id }}">
                                                    <td style="width: 10px">
                                                        <input type="checkbox" class="checkbox">
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
                                                </tr>
                                                @include('dist.includes.Karang.modalLihat')
                                                @include('dist.includes.Karang.modalEdit')
                                                @include('dist.includes.Karang.modalHapus')
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
                        $(".checkbox").prop('checked', $(this).prop('checked'));
                    });

                    $('.checkbox').on('click', function() {
                        if ($('.checkbox:checked').length === $('.checkbox').length) {
                            $('#checkboxesMain').prop('checked', true);
                        } else {
                            $('#checkboxesMain').prop('checked', false);
                        }
                    });

                    $('.removeAll').on('click', function(e) {
                        var ids = $(".checkbox:checked").map(function() {
                            return $(this).closest('tr').attr('id').replace('tr_', '');
                        }).get();

                        if (ids.length <= 0) {
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
                                    $.ajax({
                                        url: "{{ url('/laman/delete-all-karangs') }}",
                                        type: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                                'content')
                                        },
                                        data: {
                                            ids: ids
                                        },
                                        success: function(data) {
                                            if (data['status']) {
                                                $(".checkbox:checked").closest("tr").remove();
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
                                                text: data.responseJSON.message
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
                function validateInputAndCalculate() {
                    // Mendapatkan nilai input dari algae, abiotik, dan biota_lain
                    const algaeValue = parseFloat(document.getElementsByName('algae')[0].value) || 0;
                    const abiotikValue = parseFloat(document.getElementsByName('abiotik')[0].value) || 0;
                    const biotaLainValue = parseFloat(document.getElementsByName('biota_lain')[0].value) || 0;
                    const acbValue = parseFloat(document.getElementsByName('acb')[0].value) || 0;
                    const acdValue = parseFloat(document.getElementsByName('acd')[0].value) || 0;
                    const aceValue = parseFloat(document.getElementsByName('ace')[0].value) || 0;
                    const acsValue = parseFloat(document.getElementsByName('acs')[0].value) || 0;
                    const actValue = parseFloat(document.getElementsByName('acb')[0].value) || 0;
                    const cbValue = parseFloat(document.getElementsByName('cb')[0].value) || 0;
                    const ceValue = parseFloat(document.getElementsByName('ce')[0].value) || 0;
                    const cfValue = parseFloat(document.getElementsByName('cf')[0].value) || 0;
                    const cmValue = parseFloat(document.getElementsByName('cm')[0].value) || 0;
                    const csValue = parseFloat(document.getElementsByName('cs')[0].value) || 0;
                    const cmrValue = parseFloat(document.getElementsByName('cmr')[0].value) || 0;
                    const chlValue = parseFloat(document.getElementsByName('chl')[0].value) || 0;
                    const cmeValue = parseFloat(document.getElementsByName('cme')[0].value) || 0;
                    const dcValue = parseFloat(document.getElementsByName('dc')[0].value) || 0;
                    const dcaValue = parseFloat(document.getElementsByName('dca')[0].value) || 0;

                    // Menghitung total persentase
                    const totalPercentage = algaeValue + abiotikValue + biotaLainValue + acbValue + acdValue + aceValue + acsValue +
                        actValue + cbValue + ceValue + cfValue + cmValue + csValue + cmrValue + chlValue + cmeValue + dcValue +
                        dcaValue;

                    // Validasi total persentase tidak boleh lebih dari 100
                    if (totalPercentage > 100) {
                        alert('Data salah! Total persentase melebihi 100%.');
                        return false;
                    }

                    return true;
                }

                function validateNumberInput(input) {
                    // Hapus karakter selain digit dan titik
                    input.value = input.value.replace(/[^0-9.]/g, '');

                    // Hapus titik jika lebih dari satu
                    input.value = input.value.replace(/(\..*\.)/g, '$1');

                    // Batasi panjang input menjadi 4 karakter termasuk 2 angka di belakang koma
                    if (input.value.length > 5) {
                        input.value = input.value.substring(0, 5);
                    }

                    // Pastikan format angka di belakang koma
                    var parts = input.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].substring(0, 2); // Batasi 2 angka di belakang koma
                        input.value = parts.join('.');
                    }

                    // Pastikan nilai tidak negatif
                    if (parseFloat(input.value) < 0) {
                        input.value = '';
                    }

                    // Validasi total persentase saat ini
                    if (!validateInputAndCalculate()) {
                        // Hapus nilai input yang tidak valid
                        input.value = '';
                    }
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

            <script>

                function hitungKarangHidups(postId) {
                    var acbInput = document.getElementById('edit_acb_' + postId );
                    var acdInput = document.getElementById('edit_acd_' + postId );
                    var aceInput = document.getElementById('edit_ace_' + postId );
                    var acsInput = document.getElementById('edit_acs_' + postId );
                    var actInput = document.getElementById('edit_act_' + postId );
                    var cbInput = document.getElementById('edit_cb_' + postId );
                    var ceInput = document.getElementById('edit_ce_' + postId );
                    var cfInput = document.getElementById('edit_cf_' + postId );
                    var cmInput = document.getElementById('edit_cm_' + postId );
                    var csInput = document.getElementById('edit_cs_' + postId );
                    var cmrInput = document.getElementById('edit_cmr_' + postId );
                    var chlInput = document.getElementById('edit_chl_' + postId );
                    var cmeInput = document.getElementById('edit_cme_' + postId );
                    var karangHidupInput = document.getElementById('edit_karang_hidup_' + postId );
                    var karangHidupSpan = document.getElementById('edit_KarangHidup_' + postId );

                    var acbValue = parseFloat(acbInput.value) || 0;
                    var acdValue = parseFloat(acdInput.value) || 0;
                    var aceValue = parseFloat(aceInput.value) || 0;
                    var acsValue = parseFloat(acsInput.value) || 0;
                    var actValue = parseFloat(actInput.value) || 0;
                    var cbValue = parseFloat(cbInput.value) || 0;
                    var ceValue = parseFloat(ceInput.value) || 0;
                    var cfValue = parseFloat(cfInput.value) || 0;
                    var cmValue = parseFloat(cmInput.value) || 0;
                    var csValue = parseFloat(csInput.value) || 0;
                    var cmrValue = parseFloat(cmrInput.value) || 0;
                    var chlValue = parseFloat(chlInput.value) || 0;
                    var cmeValue = parseFloat(cmeInput.value) || 0;

                    // Menghitung total
                    var total = acbValue + acdValue + aceValue + acsValue + actValue + cbValue + ceValue + cfValue + cmValue +
                        csValue + cmrValue + chlValue + cmeValue;

                    // Memasukkan hasil ke dalam elemen input karang_mati
                    karangHidupInput.value = total.toFixed(2);

                    // Memasukkan hasil ke dalam elemen span dengan id "KarangMati"
                    karangHidupSpan.innerText = total.toFixed(2);
                }

                function hitungKarangMatis(postId) {
                    // Mengambil nilai dari input dc dan dca
                    var dcInput = document.getElementById('edit_dc_' + postId );
                    var dcaInput = document.getElementById('edit_dca_' + postId );
                    var karangMatiInput = document.getElementById('edit_karang_mati_' + postId );
                    var karangMatiSpan = document.getElementById('edit_KarangMati_' + postId );

                    var dcValue = parseFloat(dcInput.value) || 0;
                    var dcaValue = parseFloat(dcaInput.value) || 0;

                    // Menghitung total
                    var total = dcValue + dcaValue;

                    // Memasukkan hasil ke dalam elemen input karang_mati
                    karangMatiInput.value = total.toFixed(2);

                    // Memasukkan hasil ke dalam elemen span dengan id "KarangMati"
                    karangMatiSpan.innerText = total.toFixed(2);
                }
            </script>
        @endpush
