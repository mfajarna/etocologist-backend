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
            <p id="kartu"class="text-center">BUKTI PEMBAYARAN</p>
        </div>
        <div class="container my-3">

        </div>

        <div class="container my-3 justify-content-center ">
            <div class="justify-content-center">
                <h4 class="font-weight-bold">No Invoice: {{ $model[0]['invoice'] }}</h4>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <h5>Atas Nama Ny.  {{ $model[0]['ibu']['nama'] }}</h5>
                    <h5>Tn.  {{ $model[0]['ibu']['nama_suami'] }}</h5>
                    <h5>{{ $model[0]['tanggal'] }}</h5>
                    <h5>{{ $model[0]['rujukan']['status'] }}</h5>
                </div>
            </div>
            <div class="row">
            <table class="table mt-2 ">
                <thead>
                        <tr>
                            <th class="text-center">Nama Layanan</th>
                            <th class="text-center">Harga</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($layanan as $item )
                        <tr>
                            <td class="text-center">{{ $item->layanan->nama_layanan }}</td>
                            <td class="text-center">Rp. {{number_format($item->layanan->harga,2,',','.',)  }}</td>
                        </tr>
                    @endforeach
                       <tr>
                            <td class="text-center">Total Harga Layanan</td>
                            <td class="text-center">Rp. {{ number_format($sum, 2 ,',','.',) }}</td>
                        </tr>
                </tbody>
            </table>

            {{ dd($detail_obat) }}
            <table class="table mb-4" id="products_table">
                <thead>
                    <tr>
                        <th class="text-center">Nama Obat</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($detail_obat as $item )
                        <tr class="rowId">
                            <td class="text-center">{{ $item->informasiobat->nama_obat }}</td>
                            <td class="text-center" >Rp. {{ number_format($item->informasiobat->harga, 2 ,',','.',) }}</td>
                            <td class="text-center" >{{ $item->quantity }}</td>
                            <td class="text-center" id="total">Rp. {{ number_format($item->informasiobat->harga * $item->quantity, 2 ,',','.',) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-center" colspan=3>Total Harga Obat</td>
                        <td class="text-center">Rp. {{ number_format($sum2, 2 ,',','.',) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan=3><h5 class="font-weight-bold">Total Harga Keseluruhan</h5></td>
                        <td class="text-center"><h5 class="font-weight-bold">Rp. {{ number_format($total_bayar, 2 ,',','.',) }}</h5></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <div class="container my-3 justify-content-center">
            <div class="justify-content-center">

            </div>
        </div>
    </body>
    <footer>
        <div class="d-flex justify-content-center mt-5">
            <img src="{{ url('assets/img/logoBidans.png') }}"/>
        </div>
    </footer>
    <script>

    </script>
</html>
