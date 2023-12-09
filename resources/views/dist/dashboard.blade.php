@extends('layouts.app')

@section('nama')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="bi bi-house"></i></li>
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
                <div class="row justify-content-start">

                    @if (auth()->user()->status == 'Administrator')
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <a href="{{ route('data-pengguna.index') }}">
                                                <button class="btn btn-warning">
                                                    Data Pengguna
                                                </button>
                                            </a>
                                            <button class=" btn btn-primary font-semibold purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $users }}" data-purecounter-duration="1">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-11 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" id="Box"
                                                width="30" height="30">
                                                <switch>
                                                    <g fill="#fcfcfc" class="color000000 svgShape">
                                                        <path
                                                            d="M48 0 4 20v56l44 20 44-20V20L48 0zm0 8.79L77.5 22.2 48 35.609 18.49 22.2 48 8.79zM12 70.85V28.03l32 14.54v42.82L12 70.85zm72 0L52 85.391V42.57l32-14.541V70.85z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                    </g>
                                                </switch>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('stasiun.index') }}">
                                            <button class="btn btn-warning ">
                                                Data Stasiun
                                            </button>
                                        </a>
                                        <button class="btn btn-success font-semibold purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $posts }}" data-purecounter-duration="1"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" id="Coral"
                                                width="30" height="30">
                                                <path
                                                    d="M40.67,32.43c-3,2.54-7.13,2.62-9.93,2.27a23.17,23.17,0,0,1,7-4.9C47.93,25.28,47,11,46.94,10.84c-.09-2.53-4.18-2.42-4,.3,0,.1.61,9.34-4.69,13.69a11.87,11.87,0,0,0-3.34-8,23.93,23.93,0,0,0,5-9.33,2,2,0,1,0-3.88-1,19.94,19.94,0,0,1-4.09,7.68c-3-3.65-1.05-10.6-1-10.68a2,2,0,0,0-3.83-1.14c-.14.46-3.34,11.45,3.8,16.22,3.74,2.49,3.58,6.72,3.33,8.48a27.9,27.9,0,0,0-8.06,6.72,28.43,28.43,0,0,0-1-5.38,16.65,16.65,0,0,0,2.76-6A2,2,0,1,0,24,21.61a13.8,13.8,0,0,1-.82,2.32c-1.89-3.12-3-3.19-5.5-6.06A17.55,17.55,0,0,0,22,6a2,2,0,0,0-2.34-2c-3.18.53-.06,4.89-4.37,10.51A17.31,17.31,0,0,1,13,8.75,2,2,0,0,0,10.74,7c-4.14.49.25,8.69,2.6,11.85,2.14,4.28,8.76,4.51,8.89,17.53a44.78,44.78,0,0,0-10.08-6.61A7.91,7.91,0,0,0,14,25a2,2,0,1,0-4,.08,4.73,4.73,0,0,1-1.37,2.72C3.82,23.74,5,16,5,11A2,2,0,0,0,2.34,9.1C.73,9.61,1,11.36,1,13,1,18.15.17,27.64,7.85,32.1c1.2.8,4.51,1.78,9.28,5.31,2.57,1.91,1.33,4.62.61,7A2,2,0,0,0,19.66,47h8.62a2,2,0,0,0,1.92-2.57l-1.36-4.51a1,1,0,0,1,1.1-1.28c4.65.64,9.5,0,13.17-3A2,2,0,1,0,40.67,32.43Z"
                                                    data-name="30. Coral" fill="#fcfcfc" class="color000000 svgShape">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{ route('karang.index') }}">
                                            <button class="btn btn-warning ">
                                                Data Terumbu Karang
                                            </button>
                                        </a>

                                        <button class="btn btn-danger font-semibold purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $karangs }}" data-purecounter-duration="1"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div id="content">
                    <br>
                    <br>
                    <center><img src="" alt="Logo Pulau Tikus" width="150px"></center>
                    <br>
                    <h2>
                        <center><b>SISTEM INFORMASI GEOGRAFIS</b></center>
                    </h2>
                    <h2>
                        <center><b>PULAU TIKUS KOTA BENGKULU</b> </center>
                    </h2>
                    <h2>
                        <center><a href=""><button class="btn btn-primary" type="button" href="/">Lihat
                                    Web</button></a></center>
                    </h2>
                </div> --}}
            </div>
            <div class="col-11 col-lg-11">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Data</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
            <section>
    </div>
@endsection

@push('script')
    <!-- Need: Apexcharts -->
    <script src=" {{ asset('admin/extensions/apexcharts/apexcharts.min.js') }} "></script>
    <script src=" {{ asset('admin/static/js/pages/dashboard.js') }} "></script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('admin/compiled/css/iconly.css') }}">
@endpush
