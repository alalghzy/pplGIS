<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Data SIG Pulau Tikus</title>

    <!-- Favicons -->
    <link href="{{ asset('home/icon/favicon.ico') }}" rel="icon">
    <link href="{{ asset('home/icon/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{ asset('admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        #map {
            width: 100%;
            height: 450px;
            z-index: 1;
            position: relative;
        }

        #overlayElement {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 2;
        }
    </style>

</head>

<body>

    <main id="main">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="logo">
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                    <div
                        class="theme-toggle gap-2  align-items-center mt-2 d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                            height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="page-content">
            <section class="row">

                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-sm">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                    id="Coral" width="32px">
                                                    <path
                                                        d="M40.67,32.43c-3,2.54-7.13,2.62-9.93,2.27a23.17,23.17,0,0,1,7-4.9C47.93,25.28,47,11,46.94,10.84c-.09-2.53-4.18-2.42-4,.3,0,.1.61,9.34-4.69,13.69a11.87,11.87,0,0,0-3.34-8,23.93,23.93,0,0,0,5-9.33,2,2,0,1,0-3.88-1,19.94,19.94,0,0,1-4.09,7.68c-3-3.65-1.05-10.6-1-10.68a2,2,0,0,0-3.83-1.14c-.14.46-3.34,11.45,3.8,16.22,3.74,2.49,3.58,6.72,3.33,8.48a27.9,27.9,0,0,0-8.06,6.72,28.43,28.43,0,0,0-1-5.38,16.65,16.65,0,0,0,2.76-6A2,2,0,1,0,24,21.61a13.8,13.8,0,0,1-.82,2.32c-1.89-3.12-3-3.19-5.5-6.06A17.55,17.55,0,0,0,22,6a2,2,0,0,0-2.34-2c-3.18.53-.06,4.89-4.37,10.51A17.31,17.31,0,0,1,13,8.75,2,2,0,0,0,10.74,7c-4.14.49.25,8.69,2.6,11.85,2.14,4.28,8.76,4.51,8.89,17.53a44.78,44.78,0,0,0-10.08-6.61A7.91,7.91,0,0,0,14,25a2,2,0,1,0-4,.08,4.73,4.73,0,0,1-1.37,2.72C3.82,23.74,5,16,5,11A2,2,0,0,0,2.34,9.1C.73,9.61,1,11.36,1,13,1,18.15.17,27.64,7.85,32.1c1.2.8,4.51,1.78,9.28,5.31,2.57,1.91,1.33,4.62.61,7A2,2,0,0,0,19.66,47h8.62a2,2,0,0,0,1.92-2.57l-1.36-4.51a1,1,0,0,1,1.1-1.28c4.65.64,9.5,0,13.17-3A2,2,0,1,0,40.67,32.43Z"
                                                        data-name="30. Coral" fill="#fcfcfc"
                                                        class="color000000 svgShape">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Karang Hidup</h6>
                                            <h6 class="font-extrabold mb-0">{{ $karangsData->karang_hidup }}%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="card shadow-sm">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                    id="Coral" width="32px">
                                                    <g data-name="Layer 3" fill="#fcfcfc" class="color000000 svgShape">
                                                        <path
                                                            d="M11.67 31H8.56a1 1 0 0 1-.92-.6A63.48 63.48 0 0 1 4 19.76a63.88 63.88 0 0 1-1.6-10 1 1 0 0 1 .74-1l.32 1 .24 1-.24-1 .94-.07A61.33 61.33 0 0 0 6 19.29 61.81 61.81 0 0 0 9.21 29h2.46a1 1 0 1 1 0 2zM11.69 15.06a1 1 0 0 1-.95-.7c-.62-1.9-1.34-3.79-2.14-5.61a1 1 0 0 1 .55-1.54h0a1 1 0 0 1 1.16.56c.86 1.94 1.63 4 2.3 6A1 1 0 0 1 12 15 1.06 1.06 0 0 1 11.69 15.06z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M6.33 11.91A4.8 4.8 0 0 1 4 11.24 3.23 3.23 0 0 1 2.24 9.05C2 7.13 4.37 5.71 6.12 5.45c1.2-.17 3.39 0 4.05 1.57h0a2.94 2.94 0 0 1-.12 2.24 4.54 4.54 0 0 1-2.33 2.39A3.77 3.77 0 0 1 6.33 11.91zM7 7.39a3.6 3.6 0 0 0-.56 0C5.19 7.61 4.19 8.5 4.23 8.78c0 .1.21.43.73.73a2.43 2.43 0 0 0 2 .28A2.49 2.49 0 0 0 8.21 8.48a1.14 1.14 0 0 0 .11-.71h0C8.23 7.57 7.65 7.39 7 7.39zM4.82 19.06a1 1 0 0 1-1-.92 1 1 0 0 1 .92-1.08l.19 0a1.19 1.19 0 0 0 .3-2.16 1.14 1.14 0 0 0-.88-.13A1 1 0 0 1 3.13 14a1 1 0 0 1 .73-1.21 3.11 3.11 0 0 1 2.4.36A3.18 3.18 0 0 1 5.42 19a3.34 3.34 0 0 1-.52.09zM11.86 24.88a1 1 0 0 1-.35-.06 3.53 3.53 0 0 1-2.24-2.45 3.59 3.59 0 0 1 1.84-4.1A1 1 0 1 1 12 20.05a1.63 1.63 0 0 0-.82 1.83 1.54 1.54 0 0 0 1 1.07 1 1 0 0 1-.35 1.93zM11 30.93h-.15A1 1 0 0 1 10 29.77l.1-.6a1.29 1.29 0 0 0-.14-.5 1.27 1.27 0 0 0-1-.63 1.14 1.14 0 0 0-.7.24A1 1 0 0 1 7 26.68 3.21 3.21 0 0 1 8.83 26a3.15 3.15 0 0 1 2.89 1.73 3.32 3.32 0 0 1 .35 1.48c0 .05 0 .1 0 .15l-.11.68A1 1 0 0 1 11 30.93z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path d="M29.7,31H2.18a1,1,0,1,1,0-2H29.7a1,1,0,1,1,0,2Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M20.14,31H12.73a1,1,0,0,1-1-.83,75.5,75.5,0,0,1-1.07-13.36,76.5,76.5,0,0,1,1.07-12,1,1,0,0,1,1-.83,1,1,0,0,1,1,1,1.14,1.14,0,0,1-.1.45A73.14,73.14,0,0,0,13.58,29h5.71a73.77,73.77,0,0,0,.91-12.17,74.81,74.81,0,0,0-1-11.5A1,1,0,0,1,19.11,5a1,1,0,0,1,1-1h.06a1,1,0,0,1,1,.83,75.33,75.33,0,0,1,1.08,12,75.51,75.51,0,0,1-1.08,13.36A1,1,0,0,1,20.14,31Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M16.56 8.32A5.2 5.2 0 0 1 13 6.77a3.67 3.67 0 0 1-1.29-2.88C12 1.72 15 .82 17.06 1c1.38.14 3.79.9 4.07 2.83h0a3.35 3.35 0 0 1-.76 2.42 5.21 5.21 0 0 1-3.27 2A4.89 4.89 0 0 1 16.56 8.32zM16.44 3c-1.36 0-2.67.65-2.72 1.12a1.93 1.93 0 0 0 .7 1.22 3.11 3.11 0 0 0 2.41 1 3.27 3.27 0 0 0 2-1.23 1.5 1.5 0 0 0 .37-.94h0c-.08-.51-1.27-1-2.29-1.12zM12.31 16.1a3.9 3.9 0 0 1-.59 0 1 1 0 0 1 .33-2 1.63 1.63 0 0 0 1.86-1.59 1.61 1.61 0 0 0-1.6-1.61 1 1 0 0 1 0-2 3.61 3.61 0 0 1 0 7.22zM20.16 25.5h-.11A4.29 4.29 0 0 1 16 21.37a4.12 4.12 0 0 1 4.11-4.13 3.5 3.5 0 0 1 1.14.16 1 1 0 1 1-.59 1.91 1.48 1.48 0 0 0-.52-.07A2.13 2.13 0 0 0 18 21.37a2.3 2.3 0 0 0 2.15 2.13 1.26 1.26 0 0 0 .29 0 1 1 0 0 1 1.18.79 1 1 0 0 1-.79 1.18A3.57 3.57 0 0 1 20.16 25.5zM15.86 30.86a.77.77 0 0 1-.25 0 1 1 0 0 1-.72-1.21 1.44 1.44 0 0 0 0-.41 1.6 1.6 0 0 0-1.59-1.61 1.67 1.67 0 0 0-.62.12 1 1 0 0 1-1.31-.52A1 1 0 0 1 12 25.87a3.54 3.54 0 0 1 1.4-.28 3.6 3.6 0 0 1 3.59 3.61 3.89 3.89 0 0 1-.11.9A1 1 0 0 1 15.86 30.86z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M21.25 20.39a.68.68 0 0 1-.2 0 1 1 0 0 1-.78-1.17l.15-.75a59.55 59.55 0 0 1 2.67-9A1 1 0 0 1 24.2 8.8l-.12 1 .88.34a56.78 56.78 0 0 0-2.59 8.72l-.14.71A1 1 0 0 1 21.25 20.39zM25.82 31h-.74a1 1 0 0 1 0-2h.05a57.52 57.52 0 0 0 2.54-9.07 56.15 56.15 0 0 0 1-8.85.88.88 0 0 1 0-.36 1 1 0 0 1 1.16-.78h0a1 1 0 0 1 .8 1 57.79 57.79 0 0 1-1 9.35 58.92 58.92 0 0 1-2.88 10.05A1 1 0 0 1 25.82 31z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M27 13.23h-.2a4.12 4.12 0 0 1-3-1.88 3.08 3.08 0 0 1-.56-2.59c.56-1.75 3.18-2 4.78-1.5 1.09.34 2.91 1.36 2.81 3h0a2.81 2.81 0 0 1-1 1.88A4.33 4.33 0 0 1 27 13.23zM26.45 9a2 2 0 0 0-1.33.35 1.47 1.47 0 0 0 .34.88 2.17 2.17 0 0 0 1.49 1 2.3 2.3 0 0 0 1.51-.58 1 1 0 0 0 .36-.5h0c0-.21-.62-.73-1.42-1A3.22 3.22 0 0 0 26.45 9zm3.36 1.18h0zM22.55 18.49a3.05 3.05 0 0 1-.6-.06 2.64 2.64 0 0 1-.48-.14 1 1 0 0 1 .72-1.86l.16 0a1 1 0 0 0 .76-.15 1 1 0 0 0-.36-1.86 1 1 0 1 1 .4-2A3 3 0 0 1 24.22 18 3 3 0 0 1 22.55 18.49zM27 26.85h0a2.7 2.7 0 0 1-.63-.07 3.57 3.57 0 0 1-2.64-4 3.43 3.43 0 0 1 4-2.69 3 3 0 0 1 .91.33 1 1 0 0 1-1 1.75.91.91 0 0 0-.32-.11 1.38 1.38 0 0 0-1.09.21 1.42 1.42 0 0 0-.61.91 1.55 1.55 0 0 0 1.14 1.69.53.53 0 0 0 .18 0 1 1 0 0 1 0 2zM22.58 30.23a1 1 0 0 1-.43-.1 1 1 0 0 1-.47-1.33 1.25 1.25 0 0 0 .09-.25 1.07 1.07 0 0 0-.15-.78 1 1 0 0 0-.65-.43l-.17 0a1 1 0 0 1-1-1 1 1 0 0 1 1-1 2.31 2.31 0 0 1 .52.06 3 3 0 0 1 2.36 3.56 3.15 3.15 0 0 1-.25.73A1 1 0 0 1 22.58 30.23z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Karang Mati</h6>
                                            <h6 class="font-extrabold mb-0">{{ $karangsData->karang_mati }}%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="card shadow-sm">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon yellow mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                    id="Seaweed" width="32px">
                                                    <g data-name="Layer 5" fill="#fcfcfc"
                                                        class="color000000 svgShape">
                                                        <path
                                                            d="M15.34,24.34a1,1,0,0,1-.91-.58l-.07-.15a5.91,5.91,0,0,1,.57-6.14,3.87,3.87,0,0,0,.78-2.33,4,4,0,0,0-.29-1.46L15,12.51a5.9,5.9,0,0,1,.21-4.83l.41-.84a3.89,3.89,0,0,0,.22-3l-.51-1.54a1,1,0,0,1,.34-1.11,1,1,0,0,1,1.16,0L18.06,2a5.91,5.91,0,0,1,2.63,4.91v2a4,4,0,0,0,.4,1.74l.6,1.18a5.88,5.88,0,0,1-.22,5.68l-.92,1.54a3.89,3.89,0,0,0-.36,3.24l.1.29a1,1,0,1,1-1.89.65l-.1-.3A5.84,5.84,0,0,1,18.84,18l.92-1.54a3.88,3.88,0,0,0,.14-3.75l-.59-1.18a5.86,5.86,0,0,1-.62-2.64v-2A3.88,3.88,0,0,0,18,4.68a5.89,5.89,0,0,1-.62,3L17,8.57a3.9,3.9,0,0,0-.14,3.19l.47,1.18a6.14,6.14,0,0,1,.43,2.2,5.9,5.9,0,0,1-1.18,3.53,3.91,3.91,0,0,0-.37,4.07l.08.18a1,1,0,0,1-.49,1.33A1,1,0,0,1,15.34,24.34Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M24.5 28.06h0a1 1 0 0 1-1-1L23.56 25a5 5 0 0 1 1.79-4.16l1.29-1.08a3.09 3.09 0 0 0 1-3.07l-.27-1.2a5 5 0 0 1 .08-2.55L28 11.18a3.17 3.17 0 0 0-.13-2.1 5 5 0 0 1-1.38 2.49l-.61.61A3.09 3.09 0 0 0 25 14.79L25.11 16a5.16 5.16 0 0 1-2.23 4.92 3.09 3.09 0 0 0-1.38 2.3 1 1 0 0 1-2-.17 5.09 5.09 0 0 1 2.25-3.78 3.1 3.1 0 0 0 1.37-3L23 15.05a5 5 0 0 1 1.45-4.28l.61-.61A3.09 3.09 0 0 0 26 7.74l-.12-1.47a1 1 0 0 1 1.73-.76l1 1.1a5.31 5.31 0 0 1 1.29 5.12l-.49 1.74A3 3 0 0 0 29.34 15l.27 1.21a5 5 0 0 1-1.68 5l-1.28 1.09a3.06 3.06 0 0 0-1.1 2.58l-.05 2.17A1 1 0 0 1 24.5 28.06zM12.1 27.05h0a1 1 0 0 1-.61-.21l-.57-.44a5.92 5.92 0 0 1-2.24-5.77A4.7 4.7 0 0 0 8.73 20 3.87 3.87 0 0 0 7.42 17l-1-.85a5.94 5.94 0 0 1-2-4.41v-.95A3.87 3.87 0 0 0 3.36 8.09L2.21 6.93A1 1 0 0 1 2 5.78a1 1 0 0 1 1-.55l1.54.2A5.88 5.88 0 0 1 9.12 8.64L10 10.43a3.88 3.88 0 0 0 1.16 1.38l1.05.78a6 6 0 0 1 2.34 5.18l-.15 1.8a3.94 3.94 0 0 0 1.13 3.05l.11.1a1 1 0 0 1-1.41 1.41l-.11-.1a5.91 5.91 0 0 1-1.71-4.62l.15-1.8A4 4 0 0 0 11 14.19l-1-.77a6 6 0 0 1-1.74-2.09l-.9-1.8A3.83 3.83 0 0 0 5.68 7.84a6 6 0 0 1 .81 3v.95A3.94 3.94 0 0 0 7.8 14.7l1 .84a5.88 5.88 0 0 1 2 4.41 6.83 6.83 0 0 1-.09 1 3.94 3.94 0 0 0 1.48 3.84l.54.42a1 1 0 0 1-.56 1.82z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M25,31H11.1a1,1,0,0,1-1-1A7.93,7.93,0,0,1,26,30,1,1,0,0,1,25,31ZM12.18,29h11.7a5.94,5.94,0,0,0-11.7,0Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Algae</h6>
                                            <h6 class="font-extrabold mb-0">{{ $karangsData->algae }}%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="card shadow-sm">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                                    id="Coral" width="32px">
                                                    <g data-name="Layer 4" fill="#fcfcfc"
                                                        class="color000000 svgShape">
                                                        <path
                                                            d="M11.63,25.63a1,1,0,0,1-1-1V19.37a1,1,0,0,1,.49-.86l3.81-2.29V9.06a1,1,0,0,1,.29-.71l3.43-3.44a1,1,0,0,1,1.16-.18l1.72.86a1,1,0,0,1,.55.89V9.92a1,1,0,1,1-2,0V7.1l-.52-.26L16.93,9.47v7.32a1,1,0,0,1-.49.86l-3.81,2.29v4.69A1,1,0,0,1,11.63,25.63Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M25.27 20a1 1 0 0 1-.78-.38L22 16.55a1 1 0 0 1-.22-.62V11.55l-2.68-.67A1 1 0 1 1 19.61 9L23 9.8a1 1 0 0 1 .76 1v4.81l2.25 2.81A1 1 0 0 1 25.27 20zM3.9 26.11a1 1 0 0 1-1-1V20.23a1.05 1.05 0 0 1 .29-.71L4.62 18.1V13.35a1 1 0 0 1 .55-.89l1.72-.86a1 1 0 0 1 .83 0 1 1 0 0 1 .57.6l.84 2.52L10 16.35a1.09 1.09 0 0 1 .1.44v7.38a1 1 0 0 1-2 0V17L7.3 15.51l0-.12L6.76 13.9 6.62 14v4.54a1.05 1.05 0 0 1-.29.71L4.9 20.64v4.47A1 1 0 0 1 3.9 26.11z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M28.3,26.38a1,1,0,0,1-1-1V17.75l-.58-1.17a.84.84,0,0,1-.06-.14l-.11-.33v2.77a1,1,0,0,1-.29.7l-1.08,1.09v3.74a1,1,0,1,1-2,0V20.26a1,1,0,0,1,.29-.71l1.08-1.08V14.76a1,1,0,0,1,.55-.89l1.38-.69a.93.93,0,0,1,.83,0,1,1,0,0,1,.57.61l.66,2,.65,1.31a1,1,0,0,1,.11.45v7.87A1,1,0,0,1,28.3,26.38Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                        <path
                                                            d="M16.38,26.87a9.6,9.6,0,0,1-3.13-.52l-1.52-.52a8.47,8.47,0,0,0-2.1-.45,8.75,8.75,0,0,0-3.26.31l-4,1.14a1,1,0,0,1-.54-1.93l4-1.14a11,11,0,0,1,4-.37,10.34,10.34,0,0,1,2.57.55l1.52.52a7.64,7.64,0,0,0,5.31-.13l.59-.23a9.63,9.63,0,0,1,6.61-.18l1.67.55a1.27,1.27,0,0,0,1.31-.31,1,1,0,0,1,1.42,0,1,1,0,0,1,0,1.41,3.29,3.29,0,0,1-3.37.8l-1.66-.56a7.65,7.65,0,0,0-5.25.15l-.58.23A9.8,9.8,0,0,1,16.38,26.87Z"
                                                            fill="#fcfcfc" class="color000000 svgShape"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Abiotik</h6>
                                            <h6 class="font-extrabold mb-0">{{ $karangsData->abiotik }}%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="card shadow-sm">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    id="Fish" width="32px">
                                                    <path
                                                        d="M7.86 12s0 4.526-5.167 4.966a.505.505 0 0 1-.507-.709C2.833 14.864 4.346 12 5.86 12c-1.514 0-3.027-2.864-3.674-4.257a.505.505 0 0 1 .507-.709C7.86 7.474 7.86 12 7.86 12Zm14 0c0 .999-3.134 5-7 5s-7-4-7-5 3.134-5 7-5 7 3.999 7 5Zm-4-1a1 1 0 1 0-1 1 1 1 0 0 0 1-1Z"
                                                        fill="#fcfcfc" class="color000000 svgShape"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Biota Lain</h6>
                                            <h6 class="font-extrabold mb-0">{{ $karangsData->biota_lain }}%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="javascript:void(0);" onclick="history.back();" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Kembali" class='sidebar-link'>
                        <button class="badge text-bg-primary shadow-sm"> <i class="bi bi-arrow-90deg-left"></i> &nbsp; Kembali</button>
                    </a>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="card shadow-sm" data-aos="fade-up" data-aos-delay="100">
                                <div class="card-header" >
                                    <h4>Lokasi Tutupan Komunitas Karang {{ $post->nama }}</h4>
                                </div>
                                <div class="card-body rounded-4">

                                    <div class="rounded-3" id="map" style="max-width: auto; max-height: 375px" data-aos="fade-up" data-aos-delay="200">
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var locations = [
                                                @foreach ($posts as $item)
                                                    {
                                                        latitude: {{ $item->latitude }},
                                                        longitude: {{ $item->longitude }},
                                                        kedalaman: {{ $item->kedalaman }},
                                                        idPost: {{ $item->id }},
                                                        title: "<center><b>{{ $item->nama }}</b> ({{ $item->kedalaman }} meter) <br/> {{ $item->latitude }}, {{ $item->longitude }}</center>",
                                                    },
                                                @endforeach
                                            ];

                                            // Ganti ID di bawah ini sesuai dengan ID yang diinginkan
                                            var targetLocationId = {{ $post->id }}; // Ganti dengan ID yang diinginkan

                                            var targetLocation = locations.find(function(location) {
                                                return location.idPost === targetLocationId;
                                            });

                                            if (targetLocation) {
                                                var myLatlng = L.latLng(targetLocation.latitude, targetLocation.longitude);
                                                var map = L.map('map', {
                                                    center: myLatlng,
                                                    zoom: 15,
                                                    scrollWheelZoom: false // Menonaktifkan zoom menggunakan roda mouse
                                                });

                                                // Menggunakan layer peta satelit dari ArcGIS Imagery
                                                var arcgisLayer = L.tileLayer(
                                                    'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                                        attribution: 'Tiles &copy; Esri &mdash; Source: Esri',
                                                        maxZoom: 18,
                                                    });

                                                arcgisLayer.addTo(map);

                                                var contentString = '<div id="content">' +
                                                    '<div id="siteNotice">' +
                                                    '</div>' +
                                                    '<h1 id="firstHeading" class="firstHeading">{{ $post->nama }}</h1>' +
                                                    '<div id="bodyContent">' +
                                                    '<p style="font-size:12px; color:gray" >{{ $post->latitude }}, {{ $post->longitude }} <br> {{ $post->kedalaman }} meter</p>' +
                                                    '</div>' +
                                                    '</div>';

                                                var marker = L.marker(myLatlng, {
                                                    title: 'Maps Info',
                                                    icon: getIcon(targetLocation.kedalaman)
                                                }).addTo(map);

                                                marker.bindPopup(contentString);

                                                // Tambahkan event listener untuk menampilkan modal saat marker diklik
                                                marker.on('click', createMarkerClickHandler(targetLocation));
                                            } else {
                                                console.error('Location with ID ' + targetLocationId + ' not found.');
                                            }
                                        });

                                        function createMarkerClickHandler(location) {
                                            return function(e) {
                                                var id = location.idPost;
                                                $('#locationTitle-' + id).text(e.target.getPopup().getContent());
                                                $('#locationModal-' + id).modal('show');
                                            };
                                        }

                                        function getIcon(kedalaman) {
                                            if (kedalaman <= 3) {
                                                return L.icon({
                                                    iconUrl: '{{ asset('img/3.png') }}',
                                                    iconSize: [20, 27],
                                                    iconAnchor: [16, 32],
                                                    popupAnchor: [-6, -32]
                                                });
                                            } else if (kedalaman >= 4 && kedalaman <= 6) {
                                                return L.icon({
                                                    iconUrl: '{{ asset('img/6.png') }}',
                                                    iconSize: [20, 27],
                                                    iconAnchor: [16, 32],
                                                    popupAnchor: [-6, -32]
                                                });
                                            } else if (kedalaman >= 7 && kedalaman <= 9) {
                                                return L.icon({
                                                    iconUrl: '{{ asset('img/9.png') }}',
                                                    iconSize: [20, 27],
                                                    iconAnchor: [16, 32],
                                                    popupAnchor: [-6, -32]
                                                });
                                            } else if (kedalaman >= 10 && kedalaman <= 12) {
                                                return L.icon({
                                                    iconUrl: '{{ asset('img/12.png') }}',
                                                    iconSize: [20, 27],
                                                    iconAnchor: [16, 32],
                                                    popupAnchor: [-6, -32]
                                                });
                                            } else {
                                                return L.icon({
                                                    iconUrl: '{{ asset('img/location.png') }}',
                                                    iconSize: [20, 27],
                                                    iconAnchor: [16, 32],
                                                    popupAnchor: [-6, -32]
                                                });
                                            }
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">

                                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card shadow-sm">
                                        <div class="card-body py-4 px-4">
                                            <div class="d-flex align-items-center">
                                                <div class="name">
                                                    <h6 style="font-size: 17px mb-0">
                                                        Diupdate oleh <b>{{ $post->pengguna }}</b>
                                                    </h6>
                                                    <p class="text-muted mb-0" style="font-size: 12px">
                                                        {{ $post->updated_at }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 " data-aos="fade-up" data-aos-delay="400">
                                    <div class="card shadow-sm">
                                        <div class="card-header">
                                            <h4>Diagram Lingkarang</h4>
                                        </div>
                                        @if ($chartData != null)
                                            <center>
                                                <div class="card-body ">
                                                    <div id="chart"></div>
                                                </div>
                                            </center>
                                        @else
                                            <div
                                                class="alert alert-light-danger color-danger alert-dismissible show fade m-4 p-3">
                                                <i class="fa-solid fa-triangle-exclamation"></i> <span
                                                    style="font-size:13px">Data belum tersedia!</span><br>

                                                <a href="{{ route('karang.index') }}">
                                                    <button style="font-size: 10px;" type="button"
                                                        class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#modalCreate" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit data"><i
                                                            class="bi bi-plus-square "></i>
                                                        Tambah Data
                                                    </button>
                                                </a>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 col-xl-8" data-aos="fade-up" data-aos-delay="300" data-aos-offset="-200">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4>Data Stasiun {{ $post->nama }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-hover table-lg">
                                            <tr>
                                                <th>Informasi</th>
                                            </tr>
                                            <tr>
                                                <td>Nama Stasiun</td>
                                                <td>
                                                    <b>{{ $post->nama }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Latitude</td>
                                                <td>
                                                    <b>{{ $post->latitude }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Longitude</td>
                                                <td>
                                                    <b>{{ $post->longitude }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kedalaman</td>
                                                <td>
                                                    <b>{{ $post->kedalaman }} meter</b>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-xl-4" data-aos="fade-up" data-aos-delay="400" data-aos-offset="-200">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4>Gambar {{ $post->nama }}</h4>
                                </div>
                                @if ($post->image != '')
                                    <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <a data-bs-toggle="modal" data-bs-target="#lihatGambar">

                                            <center>
                                                <img src="{{ asset('storage/posts/' . $post->image) }}"
                                                    class="rounded shadow-lg mb-4 shadow"
                                                    style="max-height: 500px; max-width: 90%"
                                                    alt="{{ $post->image }}">
                                            </center>
                                        </a>
                                        @include('dist.includes.Detail.modalLihatGambar')
                                    </div>
                                @else
                                    <div
                                        class="alert alert-light-danger color-danger alert-dismissible show fade m-3 p-3">
                                        <i class="fa-solid fa-triangle-exclamation"></i> <span
                                            style="font-size:12px">Gambar
                                            belum tersedia!</span><br>

                                        <a href="{{ route('stasiun.index') }}">
                                            <button class="btn btn-primary" style="font-size: 10px; width: 120px"
                                                type="button">
                                                <i class="bi bi-pencil-square"></i>
                                                Tambah Gambar
                                            </button>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </section>
        </div>

    </main><!-- End #main -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="{{ asset('admin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/compiled/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- PureCounter --}}
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script>
        new PureCounter();
    </script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/f28fac3438.js" crossorigin="anonymous"></script>

    <!-- Need: Apexcharts -->
    <script src=" {{ asset('admin/extensions/apexcharts/apexcharts.min.js') }} "></script>
    <script src=" {{ asset('admin/static/js/pages/dashboard.js') }} "></script>

    <script>
        @if ($chartData)
            var options = {
                series: [
                    {{ $chartData['karang_hidup'] }},
                    {{ $chartData['karang_mati'] }},
                    {{ $chartData['algae'] }},
                    {{ $chartData['abiotik'] }},
                    {{ $chartData['biota_lain'] }}
                ],
                chart: {
                    width: 290,
                    type: 'pie',
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 400
                        }
                    },
                    toolbar: {
                        show: true,
                        tools: {
                            download: '<i class="fa-solid fa-bars" style="color: #cfcfcf;"></i>'
                        }
                    },

                },
                grid: {
                    row: {
                        colors: ['#F44336', '#E91E63', '#9C27B0']
                    },
                    column: {
                        colors: ['#F44336', '#E91E63', '#9C27B0']
                    }
                },
                labels: ['Karang Hidup', 'Karang Mati', 'Algae', 'Abiotik', 'Biota Lain'],
                colors: ['#008FFB', '#FF4560', '#FFC300', '#A933FF', '#3eb650'],
                legend: {
                    position: 'bottom', // Set posisi legenda di bagian bawah
                },
                dataLabels: {
                    formatter: function(value, {
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        return value.toFixed(2) + '%';
                    }
                },

                responsive: [{
                    breakpoint: 400,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        @endif
    </script>


</body>

</html>
