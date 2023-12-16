@extends('layouts.app')

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Data Terumbu Karang</h3>
                <p class="text-subtitle text-muted">
                    Laman lihat atau cetak data terumbu karang.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/laman/admin"><i class="bi bi-house"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Data Karang</li>
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
                <div class="card shadow-sm">
                    <div class="card-header">
                        <a href="{{ route('export') }}">
                            <button type="button" class="btn btn-sm btn-success p-2 me-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Unduh excel">
                                <span style="font-size: 15px">
                                    <i class="fa-solid fa-file-arrow-down"></i> <b>Cetak Excel</b>
                                </span>
                            </button>
                        </a>

                        <button type="button" id="printButton" class="btn btn-sm btn-danger p-2" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Cetak PDF">
                            <span style="font-size: 15px">
                                <i class="fa-solid fa-file-arrow-down"></i> <b>Cetak PDF</b>
                            </span>
                        </button>

                    </div>

                    <div class="card-body table-responsive m-1 p-1">
                        <table class="table table-hover table-bordered" id="table-data">
                            <thead>
                                <tr>
                                    <th rowspan="3" style="width: 10px">
                                        No
                                    </th>
                                    <th rowspan="3">Nama Stasiun</th>
                                    <th rowspan="3">Algae</th>
                                    <th rowspan="3">Abiotik</th>
                                    <th rowspan="3">Biota Lain</th>
                                    <th colspan="15" style="text-align: center; justify-content: center">
                                        Terumbu Karang
                                    </th>
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
                                            <td>{{ $loop->iteration }}</td>
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
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
            <script type="text/javascript" src="{{ asset('admin/vali/js/plugins/jquery.dataTables.min.js') }}"></script>
            <script type="text/javascript">
                $('#table-data').DataTable({
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 5
                });

                $(document).ready(function() {
                    // Menambahkan event listener untuk tombol
                    $("#printButton").click(function() {
                        // Membuka halaman baru dalam tab
                        var newTab = window.open('/download-pdf', '_blank');

                        // Menunggu halaman baru selesai dimuat
                        newTab.onload = function() {
                            // Menjalankan fungsi cetak PDF pada halaman baru
                            printPDF(newTab);
                        };
                    });

                    // Fungsi untuk mencetak PDF pada laman yang baru
                    function printPDF(newTab) {
                        // Isi dengan logika pencetakan PDF sesuai kebutuhan
                        // ...

                        // Menambahkan event listener untuk event selesai mencetak atau membatalkan pencetakan
                        newTab.addEventListener('afterprint', function() {
                            // Menutup halaman baru setelah pencetakan selesai
                            newTab.close();
                        });

                        // Contoh sederhana menggunakan window.print() untuk pencetakan
                        newTab.print();
                    }
                });


                // $(document).ready(function() {
                //     // Menambahkan event listener untuk tombol
                //     $("#printButton").click(function() {
                //         // Membuka halaman baru dalam tab
                //         var newTab = window.open('/download-pdf', '_blank');

                //         // Menunggu halaman baru selesai dimuat
                //         newTab.onload = function() {
                //             // Menjalankan fungsi cetak PDF pada halaman baru
                //             printPDF(newTab);
                //         };
                //     });

                //     // Fungsi untuk mencetak PDF pada laman yang baru
                //     function printPDF(newTab) {
                //         // Isi dengan logika pencetakan PDF sesuai kebutuhan
                //         // ...

                //         // Contoh sederhana menggunakan window.print() untuk pencetakan
                //         newTab.print();

                //         // Menutup halaman baru setelah pencetakan selesai atau dibatalkan
                //         setTimeout(function() {
                //             newTab.close();
                //         }, 200); // Tunggu 1 detik (sesuaikan sesuai kebutuhan)
                //     }
                // });
            </script>
        @endpush
