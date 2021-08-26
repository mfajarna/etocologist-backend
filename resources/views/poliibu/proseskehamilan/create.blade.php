<x-content>
    @push('head')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     @endpush

     <x-slot name="header">
        <x-header.header-poli-ibu-component>
            {{ __('Proses Kehamilan Pasien Ibu') }}
        </x-header.header-poli-ibu-component>
    </x-slot>
    <div class="py-12 container mx-auto">
       @if($errors->any())
        <div class="mb-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi kesalahan dalam pengimputan data pasien!</h4>
                <p>
                    <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </p>
        </div>
        </div>
        @endif
            @livewire('proseskehamilan',[
                'data' => $model
            ])
        <div class="card">
                <div class="card-header">
                    Table List Proses Persalinan Pasien
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="table_data" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th><input type="checkbox" id="head-cb"></th>
                            <th>Tanggal</th>
                            <th>Umur Kehamilan</th>
                            <th>K</th>
                            <th>HB</th>
                            <th>LILA</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Fut</th>
                            <th>Letak Janin</th>
                            <th>DDA</th>
                            <th>Keluhan</th>
                            <th>Tindakan</th>
                            <th>Konseling</th>
                            <th>N/R</th>
                            <th>Status Paraf</th>
                        </tr>
                    </thead>
                    </table>
                </div>
                </div>
        </div>
    </div>

     @push('additional')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>


        <script>
            let yangDiCheck = 0;
            $(document).ready(function (){
                    var t = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                            [4, "asc"],
                            [5, "asc"],
                            [6, "asc"],
                            [7, "asc"],
                            [8, "asc"],
                            [9, "asc"],
                            [10, "asc"],
                            [11, "asc"],
                            [12, "asc"],
                            [13, "asc"],
                            [14, "asc"]
                        ],
                        ajax:{
                            url: "{!! URL::to('poli-ibu/proseskehamilan-add/'.$id) !!}"
                        },

                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                "class": "text-center",
                                orderable: false,
                                "render": function(data, type, row, meta){
                                    return `<input type="checkbox" name="obat_checked[]"  class="cb-child" value="${row.id}">`;
                                }
                            },
                            {
                                "targets": 1,
                                data: 'tanggal',
                                name: 'tanggal'
                            },
                            {
                                "targets": 2,
                                data: 'umur_kehamilan',
                                name: 'umur_kehamilan'
                            },
                            {
                                "targets": 3,
                                data: 'k',
                                name: 'k'
                            },
                            {
                                "targets": 4,
                                data: 'hb',
                                name: 'hb'
                            },
                            {
                                "targets": 5,
                                data: 'lila',
                                name: 'lila'
                            },
                            {
                                "targets": 6,
                                data: 'bb',
                                name: 'bb'
                            },
                            {
                                "targets": 7,
                                data: 'tinggi_fut',
                                name: 'tinggi_fut'
                            },
                            {
                                "targets": 8,
                                data: 'letak_janin',
                                name: 'letak_janin'
                            },
                            {
                                "targets": 9,
                                data: 'dda',
                                name: 'dda'
                            },
                            {
                                "targets": 10,
                                data: 'keluhan',
                                name: 'keluhan'
                            },
                            {
                                "targets": 11,
                                data: 'tindakan',
                                name: 'tindakan'
                            },
                            {
                                "targets": 12,
                                data: 'konseling',
                                name: 'konseling'
                            },
                            {
                                "targets": 13,
                                data: 'n/r',
                                name: 'n/r'
                            },
                            {
                                "targets": 14,
                                data: 'paraf',
                                name: 'paraf'
                            },
                        ],
                    });
            });
        </script>
     @endpush
</x-content>
