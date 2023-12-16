<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('home/icon/favicon.ico') }}" type="image/x-icon">

    <title>Data Karang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <div class="col-12">
            <div class="mt-1 mb-2 d-flex">

                <h3 class="me-auto">
                    Data Terumbu Karang
                </h3>

                @php
                    use Carbon\Carbon;
                @endphp

                @php
                    function translateDay($englishDay)
                    {
                        $translation = [
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu',
                            'Sunday' => 'Minggu',
                        ];

                        return $translation[$englishDay] ?? $englishDay;
                    }
                @endphp

                {{-- Tampilkan nama hari dalam bahasa Indonesia --}}
                <h7 class="ms-auto">

                    @if (Auth::check())
                        <span>
                            {{ Auth::user()->name }}
                        </span>
                    @else
                        <span>
                            SIG Pulau Tikus
                        </span>
                    @endif

                    <br>
                    <span>
                        {{ translateDay(Carbon::now()->format('l')) }}, {{ Carbon::now()->format('d-m-Y H:i:s') }}
                    </span>
                </h7>

            </div>
        </div>
        <div class="col-12">
            <center>
                <table class="table table-hover table-bordered" id="table-data">
                    <thead class="table-primary">
                        <tr>
                            <th rowspan="3">No</th>
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
            </center>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
