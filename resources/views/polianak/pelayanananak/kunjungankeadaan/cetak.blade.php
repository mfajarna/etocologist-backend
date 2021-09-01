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
            <p id="kartu"class="text-center">KARTU ANAK</p>
        </div>
        <div class="container my-3">
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Nama Anak&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->nama }}
                </div>
                <div class="col-sm-3">
                    Nama Ibu&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->ibu->nama }}
                </div>
                <div class="col-sm-3">
                    Nama Ayah&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->ibu->nama_suami }}
                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Tanggal Lahir&nbsp; : {{ $anak->tanggal_lahir }}
                </div>
                <div class="col-sm-3">
                    Umur Ibu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : {{ $anak->ibu->umur }} Tahun
                </div>
                <div class="col-sm-3">
                    Umur Ayah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : {{ $anak->ibu->umur_suami }} Tahun
                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Jenis Kelamin&nbsp; : {{ $anak->jenis_kelamin }}
                </div>
                <div class="col-sm-3">
                    Pekerjaan Ibu  : {{ $anak->ibu->pekerjaan }}
                </div>
                <div class="col-sm-3">
                    Pekerjaan Ayah  : {{ $anak->ibu->pekerjaan_suami }}
                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; : {{ $anak->ibu->alamat }}
                </div>
                <div class="col-sm-3">
                    No Telp&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : {{ $anak->ibu->no_telp }}
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>

        <div class="container my-3 mt-2">
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                    Pem Saat Lahir
                </div>
                <div class="col-sm-3">

                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                     BB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  {{ $anak->bb }} Kg
                </div>
                <div class="col-sm-3">
                    BBLR +/-&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->bblr }}
                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                     Keadaan Lahir : {{ $anak->keadaan_lahir }}
                </div>
                <div class="col-sm-3">
                    Lahir Di&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->tempat_lahir }}
                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                     Proses Lahir&nbsp;&nbsp;&nbsp; : {{ $anak->proses_lahir }}
                </div>
                <div class="col-sm-3">
                    Ditolong Oleh&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->ditolong_oleh }}
                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                     Letak Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->letak_janin }}
                </div>
                <div class="col-sm-3">
                    Jenis Imunisasi&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->jenis_imunisasi }}
                </div>
                <div class="col-sm-3">

                </div>
            </div>
            <div class="justify-content-center row border">
                <div class="col-sm-3">
                     Cara Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $anak->cara_lahir }}
                </div>
                <div class="col-sm-3">

                </div>
                <div class="col-sm-3">

                </div>
            </div>
        </div>
        <div class="container my-3 mt-2">
            <div class="justify-content-center">
                 <table class="table table-responsive table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 15%" class="text-center">Tanggal</th>
                        <th >Minggu Ke</th>
                        <th style="width: 10%">Umur .. Hari</th>
                        <th>BB</th>
                        <th>PB</th>
                        <th>St Gizi</th>
                        <th>Makanan</th>
                        <th>Tali Pusat</th>
                        <th>Imunisasi</th>
                        <th>KK</th>
                        <th>Cacat</th>
                        <th>Gejala</th>
                        <th class="text-center" style="width: 15%">Tindakan Nasehat</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatKeadaan as $item)
                            <tr>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['minggu_ke'] }}</td>
                                <td>{{ $item['umur_hari'] }}</td>
                                <td>{{ $item['bb'] }}</td>
                                <td>{{ $item['pb'] }}</td>
                                <td>{{ $item['st_gizi'] }}</td>
                                <td>{{ $item['makanan'] }}</td>
                                <td>{{ $item['tali_pusat'] }}</td>
                                <td>{{ $item['imunisasi'] }}</td>
                                <td>{{ $item['kk'] }}</td>
                                <td>{{ $item['cacat'] }}</td>
                                <td>{{ $item['gejala'] }}</td>
                                <td>{{ $item['tindakan_nasehat'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
            </div>
        </div>

        <div class="container my-3 mt-2">
            <div class="justify-content-center">
                <table class="table table-responsive table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width: 10%" class="text-center">Bulan Ke</th>
                        <th style="width: 11%" >Tanggal</th>
                        <th style="width: 10%">Umur Mg/Bln</th>
                        <th>BB</th>
                        <th>PB</th>
                        <th>LK</th>
                        <th>ASI</th>
                        <th>PASI</th>
                        <th>MPA</th>
                        <th>Imunisasi</th>
                        <th>Perkembangan Kesehatan</th>
                        <th>Th</th>
                        <th class="text-center" style="width: 15%">Nasehat</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kunjunganKeadaan as $item)
                            <tr>
                                <td>{{ $item['bulan'] }}</td>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['umur'] }}</td>
                                <td>{{ $item['bb'] }}</td>
                                <td>{{ $item['pb'] }}</td>
                                <td>{{ $item['lk'] }}</td>
                                <td>{{ $item['asi'] }}</td>
                                <td>{{ $item['pasi'] }}</td>
                                <td>{{ $item['mpa'] }}</td>
                                <td>{{ $item['imunisasi'] }}</td>
                                <td>{{ $item['perkembangan_kesehatan'] }}</td>
                                <td>{{ $item['th'] }}</td>
                                <td>{{ $item['nasehat'] }}</td>
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
