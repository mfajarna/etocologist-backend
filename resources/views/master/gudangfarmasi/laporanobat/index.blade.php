<x-content>
    @push('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
     @endpush

    <x-slot name="header">
        <x-header.header-gudang-farmasi-component>
            {{ __('Laporan Obat') }}
        </x-header.header-gudang-farmasi-component>
    </x-slot>
     <div class="py-12 container mx-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="filter_jenis_obat" id="filter_jenis_obat" class="form-control" required>
                                <option value="">--Pilih Nama Obat--</option>
                                @foreach($obat as $item)

                                <option value="{{ $item->nama_obat }}">{{ $item->nama_obat }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class='input-group date' id='tanggal_periode'>
                            <input type='text' class="form-control" id='filter_tanggal_periode' name="filter_tanggal_periode" placeholder="-- Pilih Bulan Periode --"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                            <button type="button" name="filter" id="filter" class="btn btn-info">Cari</button>

                            <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </div>
                <br />

                <div class="table-responsive">
                <table id="customer_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Obat</th>
                            <th class="text-center">Harga Obat</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Sisa</th>
                            <th class="text-center">Tanggal Keluar Obat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        @push('additional')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
            <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>
            <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js" defer></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
            <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js" defer></script>
            <script>
                $(document).ready(function () {
                    $('#tanggal_periode').datepicker({
                        format: "MM-yyyy",
                        viewMode: "months",
                        minViewMode: "months",
                 });

                 fill_datatable();

                 function fill_datatable(filter_jenis_obat = '', filter_tanggal_periode = '')
                 {
                var dataTable = $('#customer_data').DataTable({
                        processing: true,
                        serverSide: true,
                        dom: 'Bfrtip',
                        buttons: [
                        {
                            extend : 'excel',
                            title: 'Laporan Obat Periode ' + filter_tanggal_periode
                        },
                        {
                            extend: 'pdf',
                            title : 'Laporan Obat Periode ' + filter_tanggal_periode
                        }
                    ],
                        "order": [
                            [0, "asc"],

                        ],
                        ajax:{
                            url: "{{ route('laporan-obat.index') }}",
                            data: {
                                filter_jenis_obat:filter_jenis_obat,
                                filter_tanggal_periode: filter_tanggal_periode
                                }
                        },

                        columns: [

                            {
                                "targets": 0,
                                data: 'nama_obat',
                                name: 'nama_obat'
                            },
                            {
                                "targets": 1,
                                data: 'harga',
                                name: 'harga'
                            },
                            {
                                "targets": 2,
                                data: 'jumlah_keluaran',
                                name: 'jumlah_keluaran'
                            },
                            {
                                "targets": 3,
                                data: 'sediaan',
                                name: 'sediaan'
                            },
                            {
                                "targets": 4,
                                data: 'tgl_keluar_obat',
                                name: 'tgl_keluar_obat'
                            },
                        ],
                    });
                 }

                $('#filter').click(function(){
                    var filter_tanggal_periode = $('#filter_tanggal_periode').val();
                    var filter_jenis_obat = $('#filter_jenis_obat').val();

                    if(filter_jenis_obat != '' && filter_tanggal_periode != '')
                    {
                        $('#customer_data').DataTable().destroy();
                        fill_datatable(filter_jenis_obat, filter_tanggal_periode);
                    }else{
                        alert('Select Both Filter')
                    }
                });

                $('#reset').click(function(){
                    //  $('#filter_nama_obat').val('');
                    $('#filter_jenis_obat').val('');
                    $('#filter_tanggal_periode').val('');
                    $('#customer_data').DataTable().destroy();
                    fill_datatable();
                })


                })
            </script>
        @endpush
</x-content>
