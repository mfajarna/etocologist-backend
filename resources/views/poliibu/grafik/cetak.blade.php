<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ url('assets/img/logoicon.png') }}">
        <title>{{ config('app.name', 'E-Tocologist') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            p#title {
                font-weight:600;
                font-size: 20px;
                margin-bottom: 0;
            }

            p#nama{
                font-weight:800;
                font-size: 23px;
                margin-bottom: 0;
            }

            p#desc{
                margin-bottom: 0;
                font-weight:600;
            }

            p#kartu{
                margin-top: 5px;
                font-size: 15px;
                font-weight:800
            }
        </style>

    </head>
    <body class="bg-light font-sans antialiased bg-light">
        <div class="container my-3">
            <p id="title" class="text-center">Praktek Mandiri Bidan</p>
            <p id="nama" class="text-center">Rohaeni S Budiman, Am.Keb., SST</p>
            <p id="desc" class="text-center">SIPB: 446.2/16/DINKES/Bdn/III/2020</p>
            <p id="desc" class="text-center">Jl. Encep kartawiria No. 39 A RT.02 RW 03 Citereup</p>
            <p id="desc" class="text-center">Admin Klinik WA: 0821 1514 7528 | WA/TELP: 0812 2461 2309</p>
            <p id="kartu"class="text-center">KARTU IBU</p>
        </div>
        <div class="container my-3">
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Nama&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->ibu->nama }}
                </div>
                <div class="col-sm-3">
                    Nama Suami&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->ibu->nama_suami }}
                </div>
                <div class="col-sm-3">
                    Keluhan&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->ibu->kelurahan }}
                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Umur&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->ibu->umur }} Tahun
                </div>
                <div class="col-sm-3">
                    Umur Suami&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->ibu->umur_suami }} Tahun
                </div>
                <div class="col-sm-3">
                    Posyandu&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->ibu->posyandu }}
                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Pekerjaan&nbsp;&nbsp; : {{ $model->ibu->pekerjaan }}
                </div>
                <div class="col-sm-3">
                    Pekerjaan Suami&nbsp;&nbsp; : {{ $model->ibu->pekerjaan_suami }}
                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    HPHT&nbsp;&nbsp; : {{ $model->ibu->htpt }}
                </div>
                <div class="col-sm-3">
                    Alamat&nbsp;&nbsp; : {{ $model->ibu->alamat }}
                </div>
                <div class="col-sm-3">
                    No Telp&nbsp;&nbsp; : {{ $model->ibu->no_telp }}
                </div>
            </div>
        </div>

        <div class="container my-3">
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    G.P.A&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->gpa }}
                </div>
                <div class="col-sm-3">
                    Jarak Kehamilan&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->jarak_kehamilan }}
                </div>
                <div class="col-sm-3">
                    Siklus Haid&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->siklus_haid }}
                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Tinggi Badan&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->tinggi_badan }} cm
                </div>
                <div class="col-sm-3">
                    KB Sebelum Hamil&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->kb_sebelum_hamil }}
                </div>
                <div class="col-sm-3">
                    Riwayat Penyakit&nbsp;&nbsp;&nbsp;&nbsp; : {{ $model->riwayat_penyakit }}
                </div>
            </div>
        </div>

        <div class="container my-3 justify-content-center ">
            <div class="justify-content-center">
            <table class="table table-responsive table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 16.66%">No</th>
                        <th style="width: 25%">Umur</th>
                        <th style="width: 25%">Partus o/</th>
                        <th style="width: 25%">Cara</th>
                        <th style="width:  50%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $riwayat as $item )
                     <tr>
                        <td>{{ $item->no }}</td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->partus }}</td>
                        <td>{{ $item->cara }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>

        <div class="container my-3 justify-content-center">
            <div class="justify-content-center">
            <table class="table table-responsive table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Umur Kehamilan</th>
                        <th>K</th>
                        <th>HB</th>
                        <th>LILA</th>
                        <th>BB</th>
                        <th>Tinggi FUT</th>
                        <th>Letak Janin</th>
                        <th>DDA</th>
                        <th style="width: 15%" class="text-center"> Keluhan</th>
                        <th>Tindakan</th>
                        <th style="width: 15%" class="text-center">Konseling</th>
                        <th>N/R</th>
                        <th style="width: 6%" class="text-center">Paraf</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item )
                        <tr>
                            <td>{{ $item->tanggal}}</td>
                            <td>{{ $item->umur_kehamilan}}</td>
                            <td>{{ $item->k}}</td>
                            <td>{{ $item->hb}}</td>
                            <td>{{ $item->lila}}</td>
                            <td>{{ $item->bb}}</td>
                            <td>{{ $item->tinggi_fut}}</td>
                            <td>{{ $item->letak_janin}}</td>
                            <td>{{ $item->dda}}</td>
                            <td  class="text-center">{{ $item->keluhan}}</td>
                            <td>{{ $item->tindakan}}</td>
                            <td  class="text-center">{{ $item->konseling}}</td>
                            <td>{{ $item->nr}}</td>
                            <td>{{ $item->paraf}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </body>
    <footer>
        <div class="d-flex justify-content-center mt-5">
            <img src="{{ url('assets/img/logoBidans.png') }}"/>
        </div>
    </footer>
    <script>
        window.print();
    </script>
</html>
