<x-administrasi>
@section('content')
    @include('layouts.headers.cards',[
        'model' => $model,
        'sum' => $sum
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Rekap Data Pembayaran Pasien</h6>
                                <h2 class="mb-0">Data Rekap</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="mb-10">
                        <button class="btn btn-success" id="buttoncetak_nonaktif_all" onClick="cetakOnClick()" disabled>
                            <svg id="i-edit" class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 32 32" fill="none" stroke="#FFFF" stroke-linecap="round" stroke-linejoin="round" width="15px" stroke-width="2">
                                <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" /></svg>
                                Cetak Invoice Pembayaran
                         </button>
                     </div>

                    <div class="table-responsive mt-4">
                         <table id="table_data" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th width="5%"><input type="checkbox" id="head-cb"></th>
                            <th>No Invoice</th>
                            <th>Nama Pasien Ibu</th>
                            <th>Tanggal Berkunjung</th>
                        </tr>
                    </thead>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>

    <script>
        let yangDiCheck = 0;

        function cetakOnClick()
        {
            let checkbox_terpilih = $("#table_data tbody .cb-child:checked");
            let id_check = []
            $.each(checkbox_terpilih, function(index, elm){
                id_check.push(elm.value);
            })

            window.open('cetak-invoice/'+id_check,'_blank');
        }

        $(document).ready(function(){
             var t = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                        ],
                        ajax:{
                            url: "{{ route('administrasi.index') }}",
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
                                data: 'invoice',
                                name: 'invoice'
                            },
                            {
                                "targets": 2,
                                data: 'ibu.nama',
                                name: 'ibu.nama'
                            },
                            {
                                "targets": 3,
                                data: 'tanggal',
                                name: 'tanggal'
                            },
                        ],
                    });

                    $("#table_data tbody").on('click', '.cb-child', function(){
                         $('input.cb-child').not(this).prop('checked', false);
                         let yangDiCheck = $("#table_data tbody .cb-child:checked");
                         let button_non_aktif_status = (yangDiCheck.length>0);

                         $("#buttoncetak_nonaktif_all").prop('disabled', !button_non_aktif_status);

                    });
        });
    </script>
@endpush
</x-administrasi>
