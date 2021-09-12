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
                    Nama&nbsp;&nbsp;&nbsp;&nbsp; : {{ $nama }}
                </div>
                <div class="col-sm-3">
                    Umur&nbsp;&nbsp;&nbsp;&nbsp; : {{ $umur }} Tahun
                </div>
                <div class="col-sm-3">
                    Alamat&nbsp;&nbsp;&nbsp;&nbsp; : {{ $alamat }}
                </div>
                <div class="col-sm-3">
                    No Telp&nbsp;&nbsp;&nbsp;&nbsp; : {{ $no_telp }}
                </div>
            </div>
        </div>

        <div class="container my-3 justify-content-center ">
            <div class="justify-content-center">
            <table class="table table-responsive table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 16.66%">Tanggal</th>
                        <th style="width: 16.66%">Keluhan</th>
                        <th style="width: 16.66%">Tensi</th>
                        <th style="width: 16.66%">BB</th>
                        <th style="width:  16.66%">Lab</th>
                        <th style="width:  16.66%">Pemeriksaan</th>
                        <th style="width:  16.66%">Theraphi</th>
                        <th style="width:  16.66%">Ket</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $model as $item )
                     <tr>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->keluhan }}</td>
                        <td>{{ $item->tensi }}</td>
                        <td>{{ $item->bb }}</td>
                        <td>{{ $item->lab }}</td>
                        <td>{{ $item->pemeriksaan }}</td>
                        <td>{{ $item->theraphi }}</td>
                        <td>{{ $item->ket }}</td>
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
